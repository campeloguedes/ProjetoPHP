<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/NoticiaController.class.php');  
 $noticiaController = new NoticiaController();  

 if(isset($idMP)){

    $noticia =  $noticiaController->listarPorId($idMP); 
   

 }else{   
  $noticia = new Noticia();   
    } 
?>
<?php include('template/headers.php'); ?> 
<!-- head -->
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.validate.js'></script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.maskedinput-1.2.2.js'></script>
<script type='text/javascript'>

  $('.area_btns').corner();

  $(function() { 
     $('#cpload1').hide();
     $('#formCad').validate({ 
           submitHandler: function(form) {
              $('.btn1').hide();
              $('.btn2').hide();
              $('#cpload1').show();
              $(form).ajaxSubmit({
	             dataType: 'html',
	             type: 'post',
	             success: response
               });
            },
     		rules: { 
               titulo: { 
                   required: true, 
                   maxlength: 255 
               }, 

               dt: { 
                   required: true 
               }, 

               texto: { 
                   required: true 
               }

            } 
      }); 
  }); 

  jQuery(function($){ 
      $('#dt').mask('99/99/9999'); 
  }); 
 
  $(function() { 
  	   $('#info').dialog({ 
  	   		bgiframe: true,  
  	   		resizable: true,  
  	   		minHeight: 100,  
  	   		height: 110,  
  	   		modal: true,  
  	   		autoOpen: false  
      });
  });

  function response(data){
      data = remover_espacos(data);	   $('#cpload1').hide();
	   $('.btn1').show();
	   $('.btn2').show();
	   if(data==1){
		var _oEditor_noticia_texto = CKEDITOR.instances.noticia_texto;
		_oEditor_noticia_texto.setData("");
		 $('#formCad').resetForm();
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
	   }
	   if(data==2){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
	   }
       if(data==0){
         document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Verifique os dados do cadastro e tente novamente!</p>';
         $('#info').dialog('open'); 
	   }
  }

$(function() { 
	$("#imageupload").dialog({ 
		resizable: true,
		width:425, 
		minHeight: 300,  
		height: 450,
		modal: true,  
		autoOpen: false  
	});
});

</script>

<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/_sample/sample.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/adapters/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/_sample/sample.css" />
<script type="text/javascript">$(function(){
	var config_noticia_texto = {
		height: 300,
		toolbar:
				[
					['Source','-','NewPage','Preview','-','Templates'],
					['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker', 'Scayt', 'Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
					'/',
					['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
					['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['Link','Unlink'],
					['Table','HorizontalRule','Smiley','SpecialChar'],
					'/',
					['Format','Font','FontSize'],
					['ShowBlocks', '-', 'Image']
				]
	};
	$('#noticia_texto').ckeditor(config_noticia_texto);
});					

function getnoticia_texto(){	
			var _oEditor = CKEDITOR.instances.noticia_texto;
			document.getElementById('texto').value = _oEditor.getData();
}

</script><link href='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/css/uploadify.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/swfobject.js'></script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/jquery.uploadify.v2.1.0.js'></script>
<script type='text/javascript'>
	$(document).ready(function() {
		$('#uploadify_arquivo').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/imagem_arquivo',
			'queueID'        : 'fileQueue_arquivo',
			'auto'           : true,
			'multi'          : false,
			'displayData'	 : 'speed',
			'fileExt'		 : '*.jpg;*.jpeg;*.gif;*.png'
		 });
	 });
</script>
<!-- end head -->

<?php include('template/top.php'); ?> 
<?php include('template/menu.php'); ?> 
<!-- conteudo -->

<div id='Content'> 
   <div class='category'>
		<span class='title'>Notícia</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Notícia</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='NoticiaController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Noticia' />

       <input type='hidden' id='idnoticia' name='idnoticia' value='<?php echo $noticia->idnoticia; ?>' />

       <label>
       	   Título:<br/>
       	   <input type='text' name='titulo' id='titulo' value='<?php echo $noticia->titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   Data:<br/>
       	   <input type='text' name='dt' id='dt' value='<?php echo dt($noticia->dt); ?>' /><br/><br/>
       </label>

       <label>
       	   Texto:<br/>
       </label>
		 <input type="hidden" value="" name="texto" id="texto" />
       <div style='float:left;' onclick='oEditor = CKEDITOR.instances.noticia_texto; largura_img_left = 400; largura_img_all = 800;'>
<textarea name='noticia_texto' id='noticia_texto'><?php echo html_entity_decode($noticia->texto); ?></textarea>
<br/><br/>
</div>
       

       <br/>
		<div class='area_btns'>
			<input type='submit' onclick='getnoticia_texto(); ' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listNoticia'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


<div id='imageupload' title='controlplus - imagem'>
   				<form id='formCad2' name='formCad2' accept-charset='utf-8'>		
   					<input type="hidden" id="situacao" name="situacao" value="save" />
   					<input type="hidden" id="idimgdiv" name="idimgdiv" /> 	
   					<div id="htmlaux" style="display:none;"></div>
   						
   								<script type="text/javascript">
									//610px largura maxima.
									var sel = 0;
									var retorno = "";
									var largura_img_left; 
									var largura_img_all;
									function mudaTemplate(id, template){
										for(i = 1; i <= 3; i++){
											document.getElementById("a"+i).style.background = "#FFF";
											document.getElementById("a"+i).style.border = "1px solid #EEE";
											document.getElementById("a"+i).style.zIndex = "0";
										}

   	   									sel = template;
   	   									elem = document.getElementById(id);
   										elem.style.background='#FFFACD'; 
										elem.style.border='1px solid #FF9933'; 
										elem.style.zIndex='1'; 
   									}

   									function addImagem(){

   	   									//var template = sel;
   										for(i = 1; i <= 3; i++){
   	   										//alert(document.getElementById("a"+i).style.zIndex);
											if(document.getElementById("a"+i).style.zIndex == '1'){
												template = i;
											}
										}

										var imagem = "<?php echo $mainFolder; ?>/uploads/imagem_arquivo/"+document.getElementById("arquivo").value;
										var img = document.getElementById("arquivo").value;
										var legenda = document.getElementById("legenda").value;
										
										if(template == 0 || imagem == "" || legenda == ""){
											document.getElementById('info').innerHTML = '<p>Você deve preencher todos os campos!</p>'; 
									        $('#info').dialog('open'); 			

											return false;	
										}
										
										//redimensiona imagem.
										controlImagem(img, template, legenda);
										

										
   							   		}

   							   		function controlImagem(imagem, template, legenda){

	   							   		$.ajax(
	   							   			{
	   							   			  type: "POST",
	   							   			  url: "<?php echo $mainFolder; ?>/mediaplus/controller/imagemcontroller",
	   							   			  //
	   							   			  data: "imagem="+imagem+"&template="+template+"&largura_img_all="+largura_img_all+"&largura_img_left="+largura_img_left,
	   							   			  beforeSend: function() {
	   							   	 			//carregando
	   							   			  },
	   							   			  success: function(txt) {
		   							   			//retorno
		   							   			/*
		   							   			 * 0 true : sucesso - false : falha
		   							   			 * 1 mensagem de erro ou sucesso
		   							   			 * 2 largura
		   							   			 * 3 altura
		   							   			 * 4 tem ou nao popup
		   							   			 * 5 nome imagem
		   							   			 *
		   							   			 */
		   										//alert(txt);
		   										resp = txt.split("*");
		   										//alert(resp[0]);
		   										if(resp[0] == 'false'){
		   							   			    document.getElementById('info').innerHTML = '<p>'+resp[1]+'</p>';
		   							   	            $('#info').dialog('open'); 	
		   							   	            retorno = "err";
	   							   			  	}else{

			   							   			  	document.getElementById("arquivo").value = resp[5];
			  											imagem = "<?php echo $mainFolder; ?>/uploads/imagem_arquivo/" + resp[5];
			  											img = resp[5];
			  											w = resp[2];
			  											h = resp[3];
			  											popup = resp[4];
														
														if(document.getElementById("situacao").value == "save"){
															
				  											if(template == 1){
					  											if(popup == "no-popup"){
				  													html = "<div id='"+imagem+"' style='float:left; margin:10px; margin-left:0; margin-top:5px; width:"+w+"px;'><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";
					  											}else if(popup == "yes-popup"){
						  											var mainFolder = "<?php echo $mainFolder; ?>";
					  												html = "<div id='"+imagem+"' style='float:left; margin:10px; margin-left:0; margin-top:5px; width:"+w+"px;'><a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;  border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";				
					  											 }	 
				  											}else if(template == 3){
				  												if(popup == "no-popup"){
				  													html = "<div id='"+imagem+"' style='float:left; margin-top:10px; margin-bottom:5px; width:"+w+"px;'><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";
				  												}else if(popup == "yes-popup"){
				  													var mainFolder = "<?php echo $mainFolder; ?>";
				  													html = "<div id='"+imagem+"' style='float:left; margin-top:10px; margin-bottom:5px; width:"+w+"px;'><a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left; border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";
				  												 }	
				  											 }	

				  											if ( oEditor.mode == 'wysiwyg' ){
				  												oEditor.insertHtml( html );
				  											}
				  											 
														}else if(document.getElementById("situacao").value == "edit"){
															
																if(template == 1){
																	if(popup == "no-popup"){
					  													html = "<img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>"; 
																	}else if(popup == "yes-popup"){
																		var mainFolder = "<?php echo $mainFolder; ?>";
																		html = "<a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left; border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>";
																	 }	

																	style = 'float:left; margin:10px; margin-left:0; margin-top:5px; width:'+w+'px;';
																	//alert(style);
																	html2 = "<p style='text-align: left;'>&nbsp;</p>";
						  										}else if(template == 3){
						  											if(popup == "no-popup"){
				  														html = "<img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>";
						  											}else if(popup == "yes-popup"){
						  												var mainFolder = "<?php echo $mainFolder; ?>";
						  												html = "<a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left; border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>";
						  											 }	

																	style = "float:left; margin-top:10px; margin-bottom:5px; width:"+w+"px;";
																	html2 =  "<p style='text-align: left;'>&nbsp;</p>";	
							  									 }	
																	
																//alert(document.getElementById("idimgdiv").value);
																document.getElementById("htmlaux").innerHTML = oEditor.getData();
																//alert(document.getElementById("idimgdiv").value);		
																_iddiv = document.getElementById("idimgdiv").value;
																_iddiv = _iddiv.replace("../../", "<?php echo $mainFolder; ?>/");
																document.getElementById(_iddiv).innerHTML = html;
																document.getElementById(_iddiv).setAttribute("style", style);
																document.getElementById(_iddiv).setAttribute("id", imagem);
																oEditor.setData( document.getElementById("htmlaux").innerHTML + html2 );
																
														 }	 	
			  											
			  											
			  											
			  											$('#imageupload').dialog('close'); 	
													
	   							   			  	 } 	
	   							   			  	 
	   							   			  },
	   							   			  error: function(txt) {
	   							   			 	document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>';
	   							   	            $('#info').dialog('open'); 
	   							   	      		retorno = "err";
	   							   			  }
	   							   			}
	   							   		);
	   							   		
   							   		}
   								</script>
   								
   								<label>
   									legenda da imagem<br/>
   									<input type="text" id="legenda" name="legenda" style="width:350px; border: 1px solid #E5E5E5; padding: 3px 0 0 7px; height: 23px; font-weight: bold;" /><br/><br/>
   								</label>
   								
   								<label>posição da imagem no texto<br/>
   								<div style="float:left; width:100%; background:#FFF;">
	   								<div id="a1" onclick="mudaTemplate('a1', 1);" style="float:left; margin:10px; padding:10px; border:1px solid #EEE;">
	   									<img src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/images/left.gif"/>
	   								</div>
	   								<div id="a2" onclick="mudaTemplate('a2', 2);" style="float:left; margin:10px; padding:10px; border:1px solid #EEE; display:none;">
	   									<img src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/images/right.gif"/>
	   								</div>
	   								<div id="a3" onclick="mudaTemplate('a3', 3);" style="float:left; margin:10px; padding:10px; border:1px solid #EEE;">
	   									<img src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/images/center.gif"/>
	   								</div>
   								</div>
   								</label><br/><br/>
   								
   								<label>
			          			imagem
   								<div style="float:left; width:100%;">
							 	    <input type="hidden" name="arquivo" id="arquivo"  />
							 	    <input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/> 
							        <div id="fileQueue_arquivo"></div>
							        <input type="file" name="uploadify_arquivo" id="uploadify_arquivo" />
							   		<input type="hidden" name="totalFiles_uploadify_arquivo" id="totalFiles_uploadify_arquivo" value="1" />
							  		<div id="fileSaves_uploadify_arquivo" class="fileSaves_uploadify_style">
							           <div id="div_img" style="display:none;">
							  				<input type="hidden" name="uploadify_arquivo_1" id="uploadify_arquivo_1"  />
							  				<img id="img_arq" src="" />
							  				<a href="javascript:document.getElementById('div_img').innerHTML=''; document.getElementById('div_img').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_arquivo');"><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
							            </div>
							            <input type="hidden" name="cont_uploadify_arquivo" id="cont_uploadify_arquivo" value="0" />
							  		</div>
							 	<br/><br/><br/>
							  </div>
							  </label>
							  
							  <input type='button' name='botEnviar2' id='botEnviar2' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px; border:none; float:left;' onclick="addImagem();" />
				</form>
   </div>
   <div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
