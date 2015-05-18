window.addEventListener("load", initialise, false);

function initialise(){
	var aCheckBoxes = document.getElementsByClassName("choose");
	aCheckBoxes[0].addEventListener("click", function(){displayBiblio(aCheckBoxes[0])});
	aCheckBoxes[1].addEventListener("click", function(){displayBiblio(aCheckBoxes[1])});
	aCheckBoxes[2].addEventListener("click", function(){displayBiblio(aCheckBoxes[2])});
	aCheckBoxes[3].addEventListener("click", function(){displayBiblio(aCheckBoxes[3])});
	aCheckBoxes[4].addEventListener("click", function(){displayBiblio(aCheckBoxes[4])});

};
function displayBiblio(oBoxes){
	var aContainer = document.getElementsByClassName("containerBiblio");
	if(oBoxes.className == "choose off"){
		oBoxes.className="choose on";
		for(i=0; i<aContainer.length; i++){
			if(aContainer[i].className == oBoxes.name+" containerBiblio" && oBoxes.className=="choose on"){
				aContainer[i].style.display='block';
			}
		}
	}

	else{
		oBoxes.className="choose off";
		for(i=0; i<aContainer.length; i++){
			if(aContainer[i].className == oBoxes.name+" containerBiblio" && oBoxes.className=="choose off"){
				aContainer[i].style.display='none';
			}
		}
	}
	
	/*for(i=0; i<aContainer.length; i++){
		if(aContainer[i].className == oBoxes.name+" containerBiblio off" );{
			aContainer[i].style.display='none';
		}
	}*/
}