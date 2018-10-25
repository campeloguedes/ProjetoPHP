/* Menus */


function showText() {
	document.getElementById("text1").style.display = "block";
	document.getElementById("text2").style.display = "none";
	document.getElementById("Content").style.width = "788px";
	
	if(navegador == "Microsoft Internet Explorer"){
		if(versaoNavegador < 7){
			
			document.getElementById("Content").style.width = "768px";
		}
	}
}
function hideText() {
	document.getElementById("text1").style.display = "none";
	document.getElementById("text2").style.display = "block";
	document.getElementById("Content").style.width = "978px";
	
	if(navegador == "Microsoft Internet Explorer"){
		if(versaoNavegador < 7){
			
			document.getElementById("Content").style.width = "958px";
		}
	}
}

function showText2() {
	document.getElementById("textb1").style.display = "block";
	document.getElementById("textb2").style.display = "none";
}
function hideText2() {
	document.getElementById("textb1").style.display = "none";
	document.getElementById("textb2").style.display = "block";
}


function remover_espacos(str){
    r = "";
	   for(i = 0; i < str.length; i++){
	      if(str.charAt(i) != ' ')
	        r += str.charAt(i);
	   }
	  return r;
  }