//crowgame.js

let replayGame = document.querySelectorAll("#replayGame")[0];
let getPrizes = document.querySelectorAll("#getPrizes")[0];
let toSave = document.querySelectorAll("#toSave")[0];

let scoreInput1 = document.querySelectorAll("#score1")[0];
let scoreInput2 = document.querySelectorAll("#score2")[0];
let score = 0;

const assets = ["crow-logo.png","game-bg.jpg","bush.png","trash.png", "picnic.png", "chip100.png", "cap250.png", "coin750.png","nail150.png", "acorn.png", "crow.json", "crow.png", "acorn.mp3", "bgm.mp3", "trash.mp3", "cap.mp3", "chip.mp3", "coin.mp3", "nail.mp3", "peck.mp3", "score.mp3", "score2.mp3", "score3.mp3", "tree.png", "bush1.png", "bush2.png", "bench.png", {font:"PressStart2P", src:"PressStart2P-Regular.ttf"},{font:"Nunito", src:"Nunito-Light.ttf"}];
const path = "assets/";

//CHANGE SCALING BACK TO "holder" WHEN YOURE DONE OR ELSE IT WONT WORK
const frame = new Frame({scaling:"holder", width:750, height:750, color:light, assets:assets, path:path});
frame.on("ready", () => {
    const stage = frame.stage;
    let stageW = frame.width;
    let stageH = frame.height;
    asset("game-bg.jpg").center().alp(0).animate({alpha:1},.8);

    //foreground assets
    asset("bush2.png").centerReg().loc(650,575);
    asset("bench.png").centerReg().loc(620,330);

    const locations = new Container(stageW, stageH).addTo().alp(0).animate({alpha:1},.8);

    //locations
    const bush = asset("bush.png").centerReg().sca(.5).loc(600, 600, locations).cur();
    const trash = asset("trash.png").centerReg().sca(.5).loc(500, 330, locations).cur();
    const picnic = asset("picnic.png").centerReg().sca(.5).loc(200, 650, locations).cur();

    asset("bush1.png").centerReg().loc(625,650);

    //acorns
    const acorns = new Container(stageW,stageH).addTo().alp(0).animate({alpha:1},.8);

    //point items
    const chip = asset("chip100.png");
    const cap = asset("cap250.png");
    const coin = asset("coin750.png");
    const nail = asset("nail150.png");
    const reward = new Emitter({obj: new Poly(15, 5, .6, yellow),width:50, height:50, force: 4, angle:{min:-90-40, max:-90+40}, startPaused:true});
    const pain = new Emitter({obj: new Circle([3,7,10], "#8a0707"),width:50, height:50, force: 4, angle:{min:-90-40, max:-90+40}, startPaused:true});

    //sounds
    const bgm = asset("bgm.mp3");
    const acornHitS = asset("acorn.mp3");
    const capS = asset("cap.mp3");
    const chipS = asset("chip.mp3");
    const coinS = asset("coin.mp3");
    const nailS = asset("nail.mp3");
    const peckS = asset("peck.mp3");
    const trashS = asset("trash.mp3");
    const end1 = asset("score.mp3");
    const end2 = asset("score2.mp3");
    const end3 = asset("score3.mp3");

    //Text STYLE
    STYLE = {font:"PressStart2P", color:darker, size:20};

    //intro

    const intro = new Pane({
      label:new Label({
        text:"You will have one minute to dig in various places to earn points! But watch out, sharp objects will reduce your score.",
        size:20,
        font:"Nunito",
        bold:true,
        color:"#233d4d",
        labelWidth:450,
        align:MIDDLE,
        shiftVertical:-25,
      }),
      width:500,
      height:180,
      backdropColor:"rgba(0,0,0,.5)",
      fadeTime:.3,
      displayClose:false,
      backdropClose:false,
    }).show().alp(0).animate({alpha:1},.8);

    const logo = asset("crow-logo.png").sca(.1).centerReg().loc(375, 200)
      .animate({scale:.7},2,"elasticOut");

    var play = new Button(160, 50, "Play", "#fcca46", "#fe7f2d").center(intro).mov(0,50);
    play.on("click", startGame);

    function startGame() {
        intro.hide();
        logo.dispose();
        bgm.play(.2);

        // TIMER
        let time = 60;

        const timer = new Label({
          text:time,
          size: 50,
          labelWidth: 200,
          align: CENTER,
          valign: 4,
          backgroundColor: white,
          backgroundBorderColor: darker,
          backgroundBorderWidth: 3,
        }).addTo().pos(0,30, MIDDLE, TOP);

        const timeInterval = interval(1, ()=>{
            time -= 1;
            timer.text = time;
            stage.update();
        },time);

        //when timer ends
        timeout(60, () => {

          endGame();

          document.getElementById("replayGame").style.display="inline";
          if(getPrizes){
            document.getElementById("getPrizes").style.display="inline";
            document.getElementById("toSave").style.display="block";
          }
          
          if(scoreInput1){
            //scoreInput.getAttribute("value");
            scoreInput1.setAttribute("value", score);
            console.log(score);
          }
          if(scoreInput2){
            //scoreInput.getAttribute("value");
            scoreInput2.setAttribute("value", score);
            console.log(score);
          }

        }); //end of timeout

        //score label
        const scoreLabel = new Label({
          text:score,
          labelWidth: 120,
          backgroundColor:"#fcca46",
          align: CENTER,
          valign: 4,
        })
          .centerReg()
          .pos(0,120, MIDDLE, TOP);

        //Crow
        var crow = new Sprite({json:frame.asset("crow.json")})
          .centerReg()
          .sca(.5)
          .center()
          .run({loop:true, label:"stand"})
          .noMouse();

        const controls = new MotionController({
          target:crow,
          type:"keydown",
          boundary:stage,
          flip:HORIZONTAL,
          speed:5
        });

        frame.on("keydown", () => {
          crow.run({
            label:"fly",
            loop:true,
            time:.4,
            call:() => {
              crow.run({
                loop:true,
                label:"stand"
              }); //end of run
            } //end of call
          }); //end of fly
        }); // end of keydown


        //digging for score
        locations.on("mousedown", () => {
          crow.run({
            label:"peck",
            time:.2,
            call:() => {
              crow.run({
                loop:true,
                label:"stand"
              });
            } // end of call
          }); // end of peck


          //hitTests for digging

          //bush
          if (crow.hitTestBounds(bush)) {
              //zog("hit bush!");
              //score+=15;
              peckS.play(.2);
              bush.animate({props:{x:603}, time:.05, rewind:true});

              let chance = rand(1,5);

              if (chance == 1 || chance == 2) {
                zog(250);
                score+=250;

                capS.play(.25);

                reward.loc(bush).spurt(5);

                cap.centerReg()
                  .sca(.5)
                  .loc(bush)
                  .animate({
                    props:{y:560},
                    time:.5,
                    ease:"linear",
                    call: (target) => {
                    target.dispose();}
                  });

              } else if (chance == 5) {
                zog(-150);
                score-=150;

                nailS.play(.25);

                pain.loc(bush).spurt(5);

                nail.centerReg()
                  .sca(.5)
                  .loc(bush)
                  .animate({
                    props:{y:560},
                    time:.5,
                    ease:"linear",
                    call: (target) => {
                    target.dispose();}
                  });

              }
              scoreLabel.text = score;
          }

          //trash
          if (crow.hitTestBounds(trash)) {
              // zog("hit trash!");
              // score+=10;

              trashS.play(.3);
              trash.animate({props:{rotation:7}, time:.05, rewind:true});

              let chance = rand(1,7);

              if (chance == 1) {
                zog(750);
                score+=750;

                coinS.play(.25);

                reward.loc(trash).spurt(15);

                coin.centerReg()
                  .sca(.5)
                  .loc(trash)
                  .animate({
                    props:{y:290},
                    time:.5,
                    ease:"linear",
                    call: (target) => {
                    target.dispose();}
                  });

              } else if (chance == 5 || chance == 6 || chance == 7) {
                  zog(-150);
                  zog(chance);
                  score-=150;

                  nailS.play(.25);

                  pain.loc(trash).spurt(5);

                  nail.centerReg()
                    .sca(.5)
                    .loc(trash)
                    .animate({
                      props:{y:290},
                      time:.5,
                      ease:"linear",
                      call: (target) => {
                      target.dispose();}
                    });
              }

              scoreLabel.text = score;
          }

          //picnic
          if (crow.hitTestBounds(picnic)) {
              // zog("hit picnic!");
              // score+=30;

              peckS.play(.2);
              picnic.animate({props:{x:198}, time:.05, rewind:true});

              let chance = rand(1,5);

              if (chance == 1) {
                zog(100);
                score+=100;

                chipS.play(.25);

                reward.loc(picnic).spurt(3);

                chip.centerReg()
                  .sca(.5)
                  .loc(picnic)
                  .animate({
                    props:{y:610},
                    time:.5,
                    ease:"linear",
                    call: (target) => {
                    target.dispose();}
                  });

              } else if (chance == 2) {
                  zog(250);
                  score+=250;

                  capS.play(.25);

                  reward.loc(picnic).spurt(5);

                  cap.centerReg()
                    .sca(.5)
                    .loc(picnic)
                    .animate({
                      props:{y:610},
                      time:.5,
                      ease:"linear",
                      call: (target) => {
                      target.dispose();}
                    });
              }
              scoreLabel.text = score;
          }
        }); // end of mousedown


        // ACORN HITTEST
        const acornInterval = interval({min: 3, max: 8},()=>{

          const acorn = asset("acorn.png")
            .sca(.2)
            .clone()
            .loc(200, 350, acorns)
            .animate({
              props:{y:620},
              time:.5,
              ease:"linear",
              // wait:7,
              call: (target) => {
                target.dispose();
              }
            });
        },null, true)

        asset("tree.png").centerReg().sca(1.25).loc(90,470);

        Ticker.add(()=>{
            acorns.loop((acorn)=>{
                if(acorn.hitTestCircleRect(crow)){
                    acorn.removeFrom();
                    score -= 400;
                    scoreLabel.text = score;
                    acornHitS.play(.25);
                }
            },true)
        })


        //end of Game
        function endGame() {

          controls.dispose();
          acorns.dispose();

          var outro = new Pane({
            width:350,
            height:200,
            label: new Label({text:score, size: 40, align:MIDDLE, shiftVertical: 15}),
            backgroundColor:"rgba(255,255,255,1)",
            backdropColor:"rgba(0,0,0,.4)",
            titleBar:"  Total points:",
            titleBarHeight: 40,
            corner:0,
            shadowColor: -1,
            displayClose:false,
            backdropClose:false,
          }).center();

          if (score < 5000) {

            new Label({
              text:"..You're not very good at this",
              size:20,
              font:"Nunito",
              bold:true,
              labelWidth:350,
              align:MIDDLE,
              shiftVertical:70,
            }).center(outro);

          } else if (score >= 5000 && score < 10000) {

            end1.play(.2);

            new Label({
              text:"Is that the best you can do?",
              size:20,
              font:"Nunito",
              bold:true,
              labelWidth:350,
              align:MIDDLE,
              shiftVertical:70,
            }).center(outro).alp(0).animate({alpha:1},1.2);

          } else if (score >= 10000 && score < 15000) {

            end2.play(.2);

            new Label({
              text:"Good job! Now aim for higher.",
              size:20,
              font:"Nunito",
              bold:true,
              labelWidth:350,
              align:MIDDLE,
              shiftVertical:70,
            }).center(outro).sca(.1).animate({scale:1},1,"elasticOut");

          } else if (score >= 15000) {

            end3.play(.2);

            new Label({
              text:"AMAZING! You should frame this.",
              size:20,
              font:"Nunito",
              bold:true,
              labelWidth:350,
              align:MIDDLE,
              shiftVertical:70,
            }).center(outro).sca(.1).animate({scale:1},1,"elasticOut");

            new Emitter({obj: new Poly([10,20,30], 5, .6, yellow), force: 6, angle:{min:-90-60, max:-90+60}}).loc(0, -110, outro);
          }

          // var replay = new Button(250, 50, "Play Again", "#fcca46", "#fe7f2d")
          //   .pos(0,210, MIDDLE, BOTTOM)
          //   .tap(() => {
          //     zgo("crowgame.html");
          // });

          const loader = new Loader();
          new Button(270, 50, "Share Score", "#a1c181", "#619b8a")
            .sca(.7)
            .pos(0,200, MIDDLE, BOTTOM)
            .tap(() => {
              loader.save()
            });

          stage.update();
        }
    }
    stage.update(); // needed to view changes
});