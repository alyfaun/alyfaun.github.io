console.log("main connected");

// show password function on sign up page

function showPass() {
    var x = document.getElementById("pWord");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

//swap between tabs on profile

let invTab = document.querySelectorAll("#invTab")[0];
let accTab = document.querySelectorAll("#accTab")[0];

if(accTab){
accTab.addEventListener("click", openTab)
}

function openTab (event) {
  document.getElementById("inventory").style.display="none";
  document.getElementById("account").style.display="block";
}

if(accTab){
invTab.addEventListener("click", openInv)
}

function openInv (event) {
  document.getElementById("inventory").style.display="flex";
  document.getElementById("account").style.display="none";
}

