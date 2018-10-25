
function mudaValCheckBox(idElem){
	if(document.getElementById(idElem).getAttribute("value")=="1"){
		document.getElementById(idElem).setAttribute("value","0");
	}else{
		document.getElementById(idElem).setAttribute("value","1");
	}	
}

