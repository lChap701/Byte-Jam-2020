var cookies = 0;
var upgrades = 0;
var cursors = 0;
var training = 0;

function cookieClick(number){
    cookies = cookies + number+(number*upgrades)+(number*training);
    document.getElementById("cookies").innerHTML = cookies;
};



function buyCursor(){
    var cursorCost = Math.floor(10 * Math.pow(1.02,cursors));     //works out the cost of this cursor
    if(cookies >= cursorCost){                                   //checks that the player can afford the cursor
        cursors = cursors + 1;                                   //increases number of cursors
    	cookies = cookies - cursorCost;                          //removes the cookies spent
        document.getElementById('cursors').innerHTML = cursors;  //updates the number of cursors for the user
        document.getElementById('cookies').innerHTML = cookies;  //updates the number of cookies for the user
    };
    var nextCost = Math.floor(10 * Math.pow(1.02,cursors));       //works out the cost of the next cursor
    document.getElementById('cursorCost').innerHTML = nextCost;  //updates the cursor cost for the user
};

function buyUpgrades(){
    var upgradeCost = Math.floor(1000 * Math.pow(1.5,upgrades));     //works out the cost of this cursor
    if(cookies >= upgradeCost){                                   //checks that the player can afford the cursor
        upgrades = upgrades + 1;                                   //increases number of cursors
    	cookies = cookies - upgradeCost;                          //removes the cookies spent
        document.getElementById('upgrades').innerHTML = upgrades;  //updates the number of cursors for the user
        document.getElementById('cookies').innerHTML = cookies;  //updates the number of cookies for the user
    };
    var nextCost = Math.floor(1000 * Math.pow(1.5,upgrades));       //works out the cost of the next cursor
    document.getElementById('upgradeCost').innerHTML = nextCost;  //updates the cursor cost for the user
};

function buyTraining(){
    var trainingCost = Math.floor(1000 * Math.pow(1.7,training));     //works out the cost of this cursor
    if(cookies >= trainingCost){                                   //checks that the player can afford the cursor
        training = training + 1;                                   //increases number of cursors
    	cookies = cookies - trainingCost;                          //removes the cookies spent
        document.getElementById('training').innerHTML = training;  //updates the number of cursors for the user
        document.getElementById('cookies').innerHTML = cookies;  //updates the number of cookies for the user
    };
    var nextCost = Math.floor(1000 * Math.pow(1.7,training));       //works out the cost of the next cursor
    document.getElementById('trainingCost').innerHTML = nextCost;  //updates the cursor cost for the user
};

window.setInterval(function(){
	var total = cursors;
	cookieClick(total);
}, 1000);