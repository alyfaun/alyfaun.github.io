console.log("connected");
console.log("Bonus code is UUDDLRLRBA");

let bonusCode = document.querySelectorAll("#bonusCode")[0];
let code = document.querySelectorAll("#code")[0];
let bonus = document.querySelectorAll("#bonus")[0];

if(bonusCode){
    bonusCode.addEventListener("submit", formSubmit);
}

function formSubmit (event){
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
            bonus.innerHTML = "Congrats! Here's 1000 points to use for a free Gacha roll.";
            bonusCode.remove();
        }
       } 
};
xhr.open("POST","process-bonus.php",true); 
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
xhr.send("code=" + code.value);
}