console.log("gacha connected");

let rollGacha = document.querySelectorAll("#rollGacha")[0];
let userId = document.querySelectorAll("#userId")[0];

if(rollGacha){
    rollGacha.addEventListener("submit", getPrize);
}

function getPrize (event){
    event.preventDefault();
    var xhr = new XMLHttpRequest(); 
xhr.onreadystatechange = function(e){     
	console.log(xhr.readyState);     
	if(xhr.readyState === 4){        
		console.log(xhr.responseText);// modify or populate html elements based on response.
	    //receive {"success":"true"} from PHP file
        var response = JSON.parse(xhr.responseText);
        //DOM Manipulation
        console.log(response)
        if(response.success){
        
            console.log(response.success);
            document.getElementById("prizeWon").style.display="block";
            document.getElementById("submit").disabled = true;

        }
       } 
};
xhr.open("POST","process-gacha.php",true); 
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
xhr.send("userId=" + userId.value);
}