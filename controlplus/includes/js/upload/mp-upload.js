$(function(){
	$('#swfupload-control').swfupload({
		upload_url: phpUploadUrl,
		file_post_name: 'uploadfile',
		file_size_limit : "5120",
		file_types : fileTypes,
		file_types_description : "Image files",
		file_upload_limit : fileUploadLimit,
		flash_url : flashUrl,
		button_image_url : buttonUrl,
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'Arquivo: <em>'+file.name+'</em> ('+Math.round(file.size/5120)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Enviando</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log').append(listitem);
			$('li#'+file.id+' .cancel').bind('click', function(){
				var swfu = $.swfupload.getInstance('#swfupload-control');
				swfu.cancelUpload(file.id);
				$('li#'+file.id).slideUp('fast');
			});
			// start the upload since it's queued
			$(this).swfupload('startUpload');
		})
		.bind('fileQueueError', function(event, file, errorCode, message){
			alert('Tamanho do arquivo '+file.name+' &eacute; maior que o limite permitido');
		})
		.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
			//$('#queuestatus').text('Arquivos Selecionados: '+numFilesSelected+' / Arquivos na Fila: '+numFilesQueued);
		})
		.bind('uploadStart', function(event, file){
			$('#log li#'+file.id).find('p.status').text('Uploading...');
			$('#log li#'+file.id).find('span.progressvalue').text('0%');
			$('#log li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log li#'+file.id);
			item.find('div.progress').css('width', '100%');
			item.find('span.progressvalue').text('100%');
			var pathtofile='<a href="uploads/'+file.name+'" target="_blank" >visualizar &raquo;</a>'+
			'<a href="javascript:swfu.removePostParam(\'' + file.name + '\');">Remover</a>';
			item.addClass('success').find('p.status').html('Conclu&iacute;do!!! | '+pathtofile);
		})
		.bind('uploadComplete', function(event, file){
			// upload has completed, try the next one in the queue
			$(this).swfupload('startUpload');
		})
	
});	

