/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
//






	



CKEDITOR.dialog.add( 'image', function( editor )
{
	
	return {
		
		
		title : '',
		minWidth : 200,
		minHeight : 30,
		
		
		
		onShow : function()
		{
			
			/*LIMPA DADOS************************************************************/		
			for(i = 1; i <= 3; i++){
				document.getElementById("a"+i).style.background = "#FFF";
				document.getElementById("a"+i).style.border = "1px solid #EEE";
			}
			
			document.getElementById("arquivo").value = "";
			document.getElementById("legenda").value = "";
			
			if(document.getElementById('uploadify_arquivo_disable') != null)           
		        document.getElementById('uploadify_arquivo_disable').setAttribute('id', 'uploadify_arquivo');
	       
			document.getElementById("fileSaves_uploadify_arquivo").innerHTML = "";
			document.getElementById("fileSaves_uploadify_arquivo").innerHTML = '<div id="div_img" style="display:none;"><input type="hidden" name="uploadify_arquivo_1" id="uploadify_arquivo_1"  /><img id="img_arq" src="" /><a href="javascript:document.getElementById(\'div_img\').innerHTML=\'\'; document.getElementById(\'div_img\').style.display=\'none\'; jQuery(\'#uploadify\').mpDeleteFile(\'uploadify_arquivo\');">Excluir</a></div><input type="hidden" name="cont_uploadify_arquivo" id="cont_uploadify_arquivo" value="0" />';	
			document.getElementById("situacao").value = "save";
		
			/************************************************************************/
		
			var editor = this.getParentEditor(),
				sel = this.getParentEditor().getSelection(),
				element = sel.getSelectedElement(),
				link = element && element.getAscendant( 'a' );
			
			
			if(element.getAttribute("src") != ''){
				document.getElementById("arquivo").value = element.getAttribute("name");
				document.getElementById("img_arq").setAttribute( 'src', element.getAttribute("src"));
				document.getElementById("div_img").style.display = 'block';
				document.getElementById("legenda").value = element.getAttribute("title");
				
				document.getElementById("a"+element.getAttribute("class")).style.background = "#FFFACD";
				document.getElementById("a"+element.getAttribute("class")).style.border = "1px solid #FF9933";
				document.getElementById("a"+element.getAttribute("class")).style.zIndex = "1";
				
				//document.getElementById('uploadify_arquivo').setAttribute('id', 'uploadify_arquivo_disable');
				document.getElementById('cont_uploadify_arquivo').value = '1';
				document.getElementById("situacao").value = "edit";	
				
				document.getElementById("idimgdiv").value = element.getAttribute("src");	
				document.getElementById("htmlaux").innerHTML = "";
				
			}
			 
			 	
			
			
			//CKEDITOR.document.getById( 'ImagePreviewLoader' ).setStyle( 'display', 'none' );
			//CKEDITOR.document.getById( 'ImagePreviewLoader' ).setAttribute( 'src', element.getAttribute("src"));
			//CKEDITOR.document.getById( 'ImagePreviewLoader' ).setStyle( 'display', 'block' );
			
			
		},
		
		
		onCancel : function(){
			//$('#imageupload').dialog('hide'); 
		},
		
		onOk : function(){
			$('#imageupload').dialog('open'); 
		},
		
		contents : [
			{
				id : 'tab1',
				label : 'First Tab',
				title : 'First Tab',
				elements :
				[
					{
						id : 'input1',
						type : 'html',
						html : 'Deseja adicionar/editar uma imagem?'
					}
				]
			}
		]
		
		
		//CKEDITOR.dialog.setStyles{(visibility : 'hidden')};
	};
	
	
	/*
	
	var loadElements = function( editor, selection, element )
	{
		this.editMode = true;
		this.editObj = element;
		
		var attributeValue = this.editObj.getAttribute( 'name' );

		if ( attributeValue )
			this.setValueOf( 'info','txtName', attributeValue );
		else
			this.setValueOf( 'info','txtName', "" );
			
	};
	
	return {
		title : "Imagem",
		minWidth : 450,
		minHeight : 60,
		onOk : function()
		{
			//alert(this.getContentElement( 'info', 'legenda' ).getValue());
			editor.insertHtml( "<a href='http://www.globo.com' target='_blank'>Globo.com</a>" );
			
			return true;
		},
		onShow : function()
			{
	
				var editor = this.getParentEditor(),
					sel = this.getParentEditor().getSelection(),
					element = sel.getSelectedElement(),
					link = element && element.getAscendant( 'a' );
				//alert(element.getAttribute("src"));
				
				CKEDITOR.document.getById( 'ImagePreviewLoader' ).setStyle( 'display', 'none' );
				//CKEDITOR.document.getById( 'ImagePreviewLoader' ).setAttribute( 'src', element.getAttribute("src"));
				//CKEDITOR.document.getById( 'ImagePreviewLoader' ).setStyle( 'display', 'block' );
				
				
			},
			
		onHide : function()
			{
			alert("eh noiis");	
		  },	
		
		contents : [
			{
				id : 'info',
				label : "Imagem",
				accessKey : 'I',
				elements :
				[
					{
						type : 'text',
						id : 'legenda',
						label : "Legenda da Imagem",
						required: true,
						validate : function()
						{
							if ( !this.getValue() )
							{
								alert( editor.lang.anchor.errorName );
								return false;
							}
							return true;
						}
					},
					
					{
						id : 'htm',
						type : 'html',
						html : '<label>Posição da imagem no texto<br/><div style="float:left; width:100%; background:#FFF;"><div id="a1" onclick="this.style.background=\'#FFFACD\'; this.style.border=\'1px solid #FF9933\'" style="float:left; margin:10px; padding:10px; border:1px solid #EEE;"><img src="includes/js/ckeditor/images/left.gif"/></div><div id="a2" onclick="this.style.background=\'#FFFACD\'; this.style.border=\'1px solid #FF9933\'" style="float:left; margin:10px; padding:10px; border:1px solid #EEE;"><img src="includes/js/ckeditor/images/right.gif"/></div><div id="a3" onclick="this.style.background=\'#FFFACD\'; this.style.border=\'1px solid #FF9933\'" style="float:left; margin:10px; padding:10px; border:1px solid #EEE;"><img src="includes/js/ckeditor/images/center.gif"/></div></div></label><br/><br/><img width="40" style="float:left;" id="ImagePreviewLoader" src="" />'
							  +document.getElementById("imageupload").innerHTML,
						validate : function()
						{
							//alert(document.getElementById("imagem").value);
							return true;
						}					
					}
				]
				
				
			}
		]
	};
	*/
		
})();
