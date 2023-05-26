fetch('https://rawg-video-games-database.p.rapidapi.com/games?key=36f8f672f1414f5fbc93852f7e01544a', {
    method: 'GET',
    headers: {
 		'X-RapidAPI-Host': 'rawg-video-games-database.p.rapidapi.com',
 		'X-RapidAPI-Key': 'a96bc5a25cmsha4c2c0a5bb23608p1da467jsn834ca2edec4d'
 	}
})
.then(response => response.json())
.then(data => {
    console.log(data);
    console.log(data.results);
    getGame(data);

})
.catch(err => {
    console.log(err);
});

function showDiv(){
    document.getElementById("gameDiv").style.display = "block";
}

function getGame(data) {

    fetch('https://rawg-video-games-database.p.rapidapi.com/games?key=36f8f672f1414f5fbc93852f7e01544a', {
        method: 'GET',
        headers: {
             'X-RapidAPI-Host': 'rawg-video-games-database.p.rapidapi.com',
             'X-RapidAPI-Key': 'a96bc5a25cmsha4c2c0a5bb23608p1da467jsn834ca2edec4d'
         }
    });

    const game = data.results[Math.floor(Math.random() * 20)];

    const gameName = game.name;

    document.getElementById("gameTitle").innerHTML = gameName;

    const gameRate = game.rating;
    document.getElementById("gameRate").innerHTML = gameRate;

    document.getElementById('gamePlay').innerHTML = game.playtime;

    document.getElementById('gameImg').src = game.background_image;
};