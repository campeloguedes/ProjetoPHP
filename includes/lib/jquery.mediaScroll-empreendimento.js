/*
 * mediaScroll - v1.0 - 03-07-2012
 * http://mediaplus.com.br | exlennon@gmail.com 
 *
 * Copyright (c) 2013 Lennon Lemos
 * Distribuiçao e Licença GPL e MIT
 
 INSTRUÇOES DE USO:
 em cada pagina colocar data-url e passar a classe das paginas como parametro e pronto.lolol
 
 */
 
 
 
(function($) {
	
 $.fn.mediaScroll = function(urlComp,idMP,descMP) {
    
	
	this.scroll(function(e) {
 	   
	 var browser = navigator.appName;
	 
	 var ver = navigator.appVersion;
	 
	 var thestart = parseFloat(ver.indexOf("MSIE"))+1;
	 
	 var brow_ver = parseFloat(ver.substring(thestart+4,thestart+7));
	 
     if (((browser == "Microsoft Internet Explorer") && (brow_ver <= 9))){

		
	 }  else {
	 
	 
	      var page = 'fotos';
		  var y = $(document).scrollTop() + 100;
		  if(y >= 0 && y < $("#page_fotos").offset().top){ page = 'fotos'; }
		  if(y >= $("#page_detalhes").offset().top && y < $("#page_localizacao").offset().top){ page = 'detalhes'; }
		  if(y >= $("#page_localizacao").offset().top && y < $("#page_plantas").offset().top){ page = 'localizacao'; }
		  if(y >= $("#page_plantas").offset().top && y < $("#page_orcamento").offset().top){ page = 'plantas'; }
		  if(y >= $("#page_orcamento").offset().top && y < $("#page_manual").offset().top){ page = 'manual'; }
		  if(y >= $("#page_orcamento").offset().top){ page = 'orcamento'; }
		  
		
		
		  
		     var urlf = urlComp +'/'+page+'/'+idMP+'/'+descMP; 
			 if(urlf != window.location.href){
			  $("#menu_e a , #menu_e span").removeClass();
			  $("#lk_"+page+"_s").addClass('ativo');
			  $("#lk_"+page+"_s span").addClass('ativo');
			  window.history.pushState({ url:urlf }, urlf , urlf); 
		     }
		  

	 } 
	  
	 
  });
 
}
})(jQuery);
