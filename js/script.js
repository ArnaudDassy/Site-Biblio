window.addEventListener('load',start,false);
var inputsSearch = document.getElementsByTagName('input');
var divFiltres = document.getElementsByClassName('divFiltre');
var spanFiltre = document.getElementsByClassName('filtre');
var aOff=document.getElementsByClassName('off');
function start () {
	for (var i = 0; i < spanFiltre.length; i++) {
		if(spanFiltre[i].innerHTML == ''){
			divFiltres[i].style.display='none';
		}
	};
	inputsSearch[0].addEventListener('keyup',function(){recherche(0)},false);
	inputsSearch[1].addEventListener('keyup',function(){recherche(1)},false);
	inputsSearch[2].addEventListener('keyup',function(){recherche(2)},false);
	inputsSearch[3].addEventListener('keyup',function(){recherche(3)},false);

	aOff[0].addEventListener('click',function(){deleteThis(0)},false);
	aOff[1].addEventListener('click',function(){deleteThis(1)},false);
	aOff[2].addEventListener('click',function(){deleteThis(2)},false);
	aOff[3].addEventListener('click',function(){deleteThis(3)},false);
}
function recherche(indice){
	if(inputsSearch[indice].value!=''){
		divFiltres[indice].style.display='inline-block';
		spanFiltre[indice].innerHTML=inputsSearch[indice].value;
	}
	if(inputsSearch[indice].value==''){
		divFiltres[indice].style.display='none';
		spanFiltre[indice].innerHTML='';
	}
}
function deleteThis(indice){
	divFiltres[indice].style.display='none';
	inputsSearch[indice].value='';
	spanFiltre[indice].innerHTML='';
}
