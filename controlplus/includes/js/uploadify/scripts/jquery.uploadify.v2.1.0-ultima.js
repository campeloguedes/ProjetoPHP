/*
Uploadify v2.1.0
Release Date: August 24, 2009

Copyright (c) 2009 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

if(jQuery)(
	function(jQuery){
		jQuery.extend(jQuery.fn,{
			uploadify:function(options) {
				jQuery(this).each(function(){
					settings = jQuery.extend({
					id             : jQuery(this).attr('id'), // The ID of the object being Uploadified
					uploader       : 'uploadify.swf', // The path to the uploadify swf file
					script         : 'uploadify.php', // The path to the uploadify backend upload script
					expressInstall : null, // The path to the express install swf file
					folder         : '', // The path to the upload folder
					height         : 37, // The height of the flash button
					width          : 156, // The width of the flash button
					cancelImg      : 'cancel.png', // The path to the cancel image for the default file queue item container
					wmode          : 'opaque', // The wmode of the flash file
					scriptAccess   : 'sameDomain', // Set to "always" to allow script access across domains
					fileDataName   : 'Filedata', // The name of the file collection object in the backend upload script
					method         : 'POST', // The method for sending variables to the backend upload script
					queueSizeLimit : 999, // The maximum size of the file queue
					simUploadLimit : 1, // The number of simultaneous uploads allowed
					queueID        : false, // The optional ID of the queue container
					displayData    : 'percentage', // Set to "speed" to show the upload speed in the default queue item
					totalFile      : 0,
					localSave	   : '',
					onInit         : function() {}, // Function to run when uploadify is initialized
					onSelect       : function() {}, // Function to run when a file is selected
					onQueueFull    : function() {}, // Function to run when the queue reaches capacity
					onCheck        : function() {}, // Function to run when script checks for duplicate files on the server
					onCancel       : function() {}, // Function to run when an item is cleared from the queue
					onError        : function() {}, // Function to run when an upload item returns an error
					onProgress     : function() {}, // Function to run each time the upload progress is updated
					onComplete     : function() {}, // Function to run when an upload is completed
					onAllComplete  : function() {}  // Functino to run when all uploads are completed
				}, options);
				var pagePath = location.pathname;
				pagePath = pagePath.split('/');
				pagePath.pop();
				pagePath = pagePath.join('/') + '/';
				var data = {};
				data.uploadifyID = settings.id;
				data.pagepath = pagePath;
				if (settings.buttonImg) data.buttonImg = escape(settings.buttonImg);
				if (settings.buttonText) data.buttonText = escape(settings.buttonText);
				if (settings.rollover) data.rollover = true;
				data.script = settings.script;
				data.folder = escape(settings.folder);
				if (settings.scriptData) {
					var scriptDataString = '';
					for (var name in settings.scriptData) {
						scriptDataString += '&' + name + '=' + settings.scriptData[name];
					}
					data.scriptData = escape(scriptDataString.substr(1));
				}
				data.width          = settings.width;
				data.height         = settings.height;
				data.wmode          = settings.wmode;
				data.method         = settings.method;
				data.queueSizeLimit = settings.queueSizeLimit;
				data.simUploadLimit = settings.simUploadLimit;
				if (settings.hideButton)   data.hideButton   = true;
				if (settings.fileDesc)     data.fileDesc     = settings.fileDesc;
				if (settings.fileExt)      data.fileExt      = settings.fileExt;
				if (settings.multi)        data.multi        = true;
				if (settings.auto)         data.auto         = true;
				if (settings.sizeLimit)    data.sizeLimit    = settings.sizeLimit;
				if (settings.checkScript)  data.checkScript  = settings.checkScript;
				if (settings.fileDataName) data.fileDataName = settings.fileDataName;
				if (settings.queueID)      data.queueID      = settings.queueID;
				if (settings.onInit() !== false) {
					jQuery(this).css('display','none');
					jQuery(this).after('<div id="' + jQuery(this).attr('id') + 'Uploader"></div>');
					swfobject.embedSWF(settings.uploader, settings.id + 'Uploader', settings.width, settings.height, '9.0.24', settings.expressInstall, data, {'quality':'high','wmode':settings.wmode,'allowScriptAccess':settings.scriptAccess});
					if (settings.queueID == false) {
						jQuery("#" + jQuery(this).attr('id') + "Uploader").after('<div id="' + jQuery(this).attr('id') + 'Queue" class="uploadifyQueue"></div>');
					}
				}
				if (typeof(settings.onOpen) == 'function') {
					jQuery(this).bind("uploadifyOpen", settings.onOpen);
				}
				jQuery(this).bind("uploadifySelect", {'action': settings.onSelect, 'queueID': settings.queueID}, function(event, ID, fileObj) {
					
					/*************************************************************************************************************/
					/*************************************************************************************************************/
					/*************************************************************************************************************/
					var cont = document.getElementById("cont_"+jQuery(this).attr('id')).getAttribute("value");
					settings.totalFile = document.getElementById("totalFiles_"+jQuery(this).attr('id')).getAttribute("value");
					
					
					
					if(cont < settings.totalFile){
					
					
					
						if (event.data.action(event, ID, fileObj) !== false) {
							var byteSize = Math.round(fileObj.size / 1024 * 100) * .01;
							var suffix = 'KB';
							if (byteSize > 1000) {
								byteSize = Math.round(byteSize *.001 * 100) * .01;
								suffix = 'MB';
							}
							var sizeParts = byteSize.toString().split('.');
							if (sizeParts.length > 1) {
								byteSize = sizeParts[0] + '.' + sizeParts[1].substr(0,2);
							} else {
								byteSize = sizeParts[0];
							}
					
							if (fileObj.name.length > 20) {
								fileName = fileObj.name.substr(0,20) + '...';
							} else {
								fileName = fileObj.name;
							}
							queue = '#' + jQuery(this).attr('id') + 'Queue';
							if (event.data.queueID) {
								queue = '#' + event.data.queueID;
							}
							jQuery(queue).append('<div id="' + jQuery(this).attr('id') + ID + '" class="uploadifyQueueItem">\
									<div class="cancel">\
										<a href="javascript:jQuery(\'#' + jQuery(this).attr('id') + '\').uploadifyCancel(\'' + ID + '\')"><img src="' + settings.cancelImg + '" border="0" /></a>\
									</div>\
									<span class="fileName">' + fileName + ' (' + byteSize + suffix + ')</span><span class="percentage"></span>\
									<div class="uploadifyProgress">\
										<div id="' + jQuery(this).attr('id') + ID + 'ProgressBar" class="uploadifyProgressBar"><!--Progress Bar--></div>\
									</div>\
								</div>');
						
							
						}
						
					
					}
					/*************************************************************************************************************/
					/*************************************************************************************************************/
					/*************************************************************************************************************/
					
					
				});
				if (typeof(settings.onSelectOnce) == 'function') {
					jQuery(this).bind("uploadifySelectOnce", settings.onSelectOnce);
				}
				jQuery(this).bind("uploadifyQueueFull", {'action': settings.onQueueFull}, function(event, queueSizeLimit) {
					if (event.data.action(event, queueSizeLimit) !== false) {
						alert('Permitido subir apenas ' + queueSizeLimit + ' arquivo(s).');
					}
				});
				jQuery(this).bind("uploadifyCheckExist", {'action': settings.onCheck}, function(event, checkScript, fileQueueObj, folder, single) {
					
					var postData = new Object();
					postData = fileQueueObj;
					postData.folder = pagePath + folder;
					if (single) {
						for (var ID in fileQueueObj) {
							var singleFileID = ID;
						}
					}
					jQuery.post(checkScript, postData, function(data) {
						for(var key in data) {
							if (event.data.action(event, checkScript, fileQueueObj, folder, single) !== false) {
								var replaceFile = confirm("Deseja substituir o arquivo " + data[key] + "?");
								if (!replaceFile) {
									document.getElementById(jQuery(event.target).attr('id') + 'Uploader').cancelFileUpload(key, true,true);
								}
							}
						}
						if (single) {
							document.getElementById(jQuery(event.target).attr('id') + 'Uploader').startFileUpload(singleFileID, true);
						} else {
							document.getElementById(jQuery(event.target).attr('id') + 'Uploader').startFileUpload(null, true);
						}
					}, "json");
				});
				jQuery(this).bind("uploadifyCancel", {'action': settings.onCancel}, function(event, ID, fileObj, data, clearFast) {
					if (event.data.action(event, ID, fileObj, data, clearFast) !== false) {
						var fadeSpeed = (clearFast == true) ? 0 : 250;
						jQuery("#" + jQuery(this).attr('id') + ID).fadeOut(fadeSpeed, function() { jQuery(this).remove() });
					}
				});
				if (typeof(settings.onClearQueue) == 'function') {
					jQuery(this).bind("uploadifyClearQueue", settings.onClearQueue);
				}
				var errorArray = [];
				jQuery(this).bind("uploadifyError", {'action': settings.onError}, function(event, ID, fileObj, errorObj) {
					if (event.data.action(event, ID, fileObj, errorObj) !== false) {
						var fileArray = new Array(ID, fileObj, errorObj);
						errorArray.push(fileArray);
						jQuery("#" + jQuery(this).attr('id') + ID + " .percentage").text(" - " + errorObj.type + " Error");
						jQuery("#" + jQuery(this).attr('id') + ID).addClass('uploadifyError');
					}
				});
				jQuery(this).bind("uploadifyProgress", {'action': settings.onProgress, 'toDisplay': settings.displayData}, function(event, ID, fileObj, data) {
					if (event.data.action(event, ID, fileObj, data) !== false) {
						jQuery("#" + jQuery(this).attr('id') + ID + "ProgressBar").css('width', data.percentage + '%');
						if (event.data.toDisplay == 'percentage') displayData = ' - ' + data.percentage + '%';
						if (event.data.toDisplay == 'speed') displayData = ' - ' + data.speed + 'KB/s';
						if (event.data.toDisplay == null) displayData = ' ';
						jQuery("#" + jQuery(this).attr('id') + ID + " .percentage").text(displayData);
					}
				});
				jQuery(this).bind("uploadifyComplete", {'action': settings.onComplete}, function(event, ID, fileObj, response, data) {
				
					if (event.data.action(event, ID, fileObj, unescape(response), data) !== false) {
						jQuery("#" + jQuery(this).attr('id') + ID + " .percentage").text(' - Finalizado com sucesso!');
						jQuery("#" + jQuery(this).attr('id') + ID).fadeOut(250, function() { jQuery(this).remove()});
					}
					
					///////////////////////////////mp edition
					
					
					//alert("-> "+settings.totalFile);
				
					var nameAux = fileObj.name;
					fileObj.name = fileObj.name.toLowerCase();
			

					fileObj.name = fileObj.name.replace(/ {1}/gi,"");

					fileObj.name = fileObj.name.replace(/�{1}/gi,"a");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"e");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"i");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"o");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"u");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"c");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"a");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"e");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"i");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"o");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"u");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"a");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"o");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"a");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"e");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"i");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"o");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"u");
					fileObj.name = fileObj.name.replace(/~{1}/gi,"");
					fileObj.name = fileObj.name.replace(/'{1}/gi,"");
					fileObj.name = replaceAll(fileObj.name, "+","");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"");
					fileObj.name = fileObj.name.replace(/`{1}/gi,"");
					fileObj.name = replaceAll(fileObj.name, "^","");
					fileObj.name = fileObj.name.replace(/%{1}/gi,"");
					fileObj.name = fileObj.name.replace(/@{1}/gi,"");
					fileObj.name = fileObj.name.replace(/#{1}/gi,"");
					fileObj.name = replaceAll(fileObj.name, "*","");
					fileObj.name = replaceAll(fileObj.name, "?","");
					fileObj.name = replaceAll(fileObj.name, "|","");
					fileObj.name = fileObj.name.replace(/;{1}/gi,"");
					fileObj.name = fileObj.name.replace(/{{1}/gi,"");
					fileObj.name = fileObj.name.replace(/}{1}/gi,"");
					fileObj.name = replaceAll(fileObj.name, "(","");
					fileObj.name = replaceAll(fileObj.name, ")","");
					fileObj.name = replaceAll(fileObj.name, "[","");
					fileObj.name = fileObj.name.replace(/]{1}/gi,"");
					fileObj.name = replaceAll(fileObj.name, "$","");
					fileObj.name = fileObj.name.replace(/&{1}/gi,"");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"");
					fileObj.name = fileObj.name.replace(/!{1}/gi,"");
					fileObj.name = fileObj.name.replace(/"{1}/gi,"");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"");
					fileObj.name = fileObj.name.replace(/�{1}/gi,"");
					fileObj.name = fileObj.name.replace(/={1}/gi,""); 
					fileObj.name = fileObj.name.replace(/-{1}/gi,""); 
					
					//$folderarr = fileObj.filePath.split("/");
					
					settings.folder = fileObj.filePath.replace(nameAux, "");
					
					fileObj.filePath = settings.folder + fileObj.name;
					extsoes = fileObj.name.split(".");
					ext_f = extsoes[extsoes.length - 1];
					if(ext_f == "jpeg" || ext_f == "jpg" || ext_f == "gif" || ext_f == "png"){
						ext_type = "1"; //image
					}else{
						ext_type = "2"; // outros tipos
					 }	
					
					if(ext_type == 1){
						filehtm = '<img class="thumb" src="'+fileObj.filePath+'" />';
					}else{
						filehtm = '<a target="_blank" href="'+fileObj.filePath+'"/>'+fileObj.name+'</a>';
					 }	
					
			
					settings.totalFile = document.getElementById("totalFiles_"+jQuery(this).attr('id')).getAttribute("value");
					var cont = document.getElementById("cont_"+jQuery(this).attr('id')).getAttribute("value");
					var mainFolder = document.getElementById("mainFolder").value;
					
					v = parseInt(cont) + 1;
					if(cont < settings.totalFile){
						var mydate = new Date();
						var x = (mydate.getTime()*Math.random());
						if(document.getElementById('type_'+jQuery(this).attr('id')) == null){
							
							if(parseInt(settings.totalFile) == 1){
								
								document.getElementById("fileSaves_"+jQuery(this).attr('id')).innerHTML += '<div id="'+x+'"><input type="hidden" name="'+jQuery(this).attr('id')+'_'+v+'" id="'+jQuery(this).attr('id')+'_'+v+'" value="'+fileObj.name+'" />'+filehtm+'<a href="javascript:document.getElementById('+"'"+x+"'"+').innerHTML=\'\'; document.getElementById('+"'"+x+"'"+').style.display=\'none\'; jQuery(\'#uploadify\').mpDeleteFile('+"'"+jQuery(this).attr('id')+"'"+');"><img title="Excluir" alt="Excluir" class="del" src="'+mainFolder+'/controlplus/includes/imgs/icon_del.gif"/></a></div>';
								
							}else if(parseInt(settings.totalFile) > 1){
								/************************************************************************************************************/
								
								
								
								var fdel = document.getElementById(jQuery(this).attr('id')+'_fdel').value;
								var cCam = document.getElementById(jQuery(this).attr('id')+"_conteudoCam").value;
								var fieldFile = document.getElementById("nameField").value; 
								
								var last = document.getElementById("last_"+jQuery(this).attr('id')).getAttribute("value");
								v = parseInt(last)+1;
								
								
								var arrC = cCam.split("#");
								var cCamada = "";
								for(p = 0; p < arrC.length; p++){
									arrC2 = arrC[p].split("*");
									
									tipo_f = arrC2[0];
									id_f  = arrC2[1];
									value_f = arrC2[2];
									label_f = arrC2[3];
									
											arrC3 = arrC2[1].split("_");
									
									field_f = arrC3[2];
									
									
									if(tipo_f == "hidden"){
										
										if(field_f == fieldFile){
											cCamada += '<input type="hidden" id="'+id_f+v+'" name="'+id_f+v+'" value="'+fileObj.name+'" />';	
										}else if(field_f == "posicao"){
											cCamada += '<input type="hidden" id="'+id_f+v+'" name="'+id_f+v+'" value="'+v+'" />';	
										 }else{
											cCamada += '<input type="hidden" id="'+id_f+v+'" name="'+id_f+v+'" />'; 
										  }
										
									}else if(tipo_f == "text"){
										
										cCamada += '<input type="text" id="'+id_f+v+'" name="'+id_f+v+'" value="'+label_f+'" onfocus=\"if (this.value == \''+label_f+'\') {this.value = \'\';}\" onblur=\"if (this.value == \'\') {this.value = \''+label_f+'\';}\" />';	
									 
									}else if(tipo_f == "select"){
										
									  }else if(tipo_f == "checkbox"){
										  
										  cCamada += '<span><b>'+label_f+'</b><input type="hidden" id="'+id_f+v+'" name="'+id_f+v+'" /><input type="checkbox" class="checkbox" name="chb'+id_f+v+'" id="chb'+id_f+v+'" onclick="mudaValCheckBox(\''+id_f+v+'\');"  /></span>';
										  
									  }else if(tipo_f == "textarea"){
										  
										  cCamada += '<textarea id="'+id_f+v+'" name="'+id_f+v+'" onfocus=\"if (this.innerHTML == \''+label_f+'\') {this.innerHTML = \'\';}\" onblur=\"if (this.innerHTML == \'\') {this.innerHTML = \''+label_f+'\';}\">'+label_f+'</textarea>';
										  
									  }	  
										 
									
								}
								
								document.getElementById("fileSaves_"+jQuery(this).attr('id')).innerHTML += '<div id="c'+jQuery(this).attr('id')+'_'+v+'" class="camadaComposta"><a style="float:right;" href="javascript:'+fdel+'(\'c'+jQuery(this).attr('id')+'_'+v+'\'); jQuery(\'#uploadify\').mpDeleteFile('+"'"+jQuery(this).attr('id')+"'"+');"><img title="Excluir" alt="Excluir" class="del" src="'+mainFolder+'/controlplus/includes/imgs/icon_del.gif"/></a>'+ filehtm + cCamada + '</div>';
								document.getElementById("last_"+jQuery(this).attr('id')).setAttribute("value", ""+ v +"");
								//alert('<div id="c'+jQuery(this).attr('id')+'_'+v+'" class="camadaComposta">'+ filehtm + cCamada + '<a href="javascript:'+fdel+'(\'c'+jQuery(this).attr('id')+'_'+v+'\'); jQuery(\'#uploadify\').mpDeleteFile('+"'"+jQuery(this).attr('id')+"'"+');"><img title="Excluir" alt="Excluir" class="del" src="'+mainFolder+'/controlplus/includes/imgs/icon_del.gif"/></a></div>');
								
								/************************************************************************************************************/
							 }	
						}else{
							
							//document.getElementById("fileSaves_"+jQuery(this).attr('id')).innerHTML += '<div id="'+x+'"><input type="hidden" name="'+jQuery(this).attr('id')+'_'+v+'" id="'+jQuery(this).attr('id')+'_'+v+'" value="'+fileObj.name+'" /><a href="'+fileObj.filePath+'">'+fileObj.name+'</a><a href="javascript:document.getElementById('+"'"+x+"'"+').innerHTML=\'\'; document.getElementById('+"'"+x+"'"+').style.display=\'none\'; jQuery(\'#uploadify\').mpDeleteFile('+"'"+jQuery(this).attr('id')+"'"+');"><img title="Excluir" alt="Excluir" class="del" src="'+mainFolder+'/controlplus/includes/imgs/icon_del.gif"/></a></div>';
						 }	
							
						var arr = jQuery(this).attr('id').split("_");
						var nomeProp = arr[1];
						document.getElementById(nomeProp).setAttribute("value", fileObj.name);
						
						
						
						
						document.getElementById("cont_"+jQuery(this).attr('id')).setAttribute("value", ""+ v +"");
						//alert(document.getElementById("cont_"+jQuery(this).attr('id')).getAttribute("value"));
						if(settings.totalFile == v){
							document.getElementById(jQuery(this).attr('id')).setAttribute("id",jQuery(this).attr('id')+"_disable");	
						}
					}else{
						document.getElementById(jQuery(this).attr('id')).setAttribute("id",jQuery(this).attr('id')+"_disable");	
					 }
					////////////////////////////////////////////////////
				});
				
				if (typeof(settings.onAllComplete) == 'function') {
					jQuery(this).bind("uploadifyAllComplete", {'action': settings.onAllComplete}, function(event, uploadObj) {
						if (event.data.action(event, uploadObj) !== false) {
							errorArray = [];
						}
					});
				}
			});
		},
		uploadifySettings:function(settingName, settingValue, resetObject) {
			var returnValue = false;
			jQuery(this).each(function() {
				if (settingName == 'scriptData' && settingValue != null) {
					if (resetObject) {
						var scriptData = settingValue;
					} else {
						var scriptData = jQuery.extend(settings.scriptData, settingValue);
					}
					var scriptDataString = '';
					for (var name in scriptData) {
						scriptDataString += '&' + name + '=' + escape(scriptData[name]);
					}
					settingValue = scriptDataString.substr(1);
				}
				returnValue = document.getElementById(jQuery(this).attr('id') + 'Uploader').updateSettings(settingName, settingValue);
			});
			if (settingValue == null) {
				if (settingName == 'scriptData') {
					var returnSplit = unescape(returnValue).split('&');
					var returnObj   = new Object();
					for (var i = 0; i < returnSplit.length; i++) {
						var iSplit = returnSplit[i].split('=');
						returnObj[iSplit[0]] = iSplit[1];
					}
					returnValue = returnObj;
				}
				return returnValue;
			}
		},
		uploadifyUpload:function(ID, _localSave) {
			settings.localSave = _localSave;
			//alert(jQuery(this).attr('id'));
			jQuery(this).each(function() {
				document.getElementById(jQuery(this).attr('id') + 'Uploader').startFileUpload(ID, false);
			});
		},
		uploadifyCancel:function(ID) {
			jQuery(this).each(function() {
				document.getElementById(jQuery(this).attr('id') + 'Uploader').cancelFileUpload(ID, true, false);
			});
		},
		uploadifyClearQueue:function() {
			jQuery(this).each(function() {
				document.getElementById(jQuery(this).attr('id') + 'Uploader').clearFileUploadQueue(false);
			});
		},
		mpDeleteFile:function(idElem) {
			///////////////////////////////mp edition
			
			settings.totalFile = document.getElementById("totalFiles_"+idElem).getAttribute("value");
			cont = document.getElementById("cont_"+idElem).getAttribute("value");
			
			
			
			v = parseInt(cont) - 1;
			
			
			if(cont == settings.totalFile){
				if(document.getElementById(idElem+"_disable") != null)
				    document.getElementById(idElem+"_disable").setAttribute("id",idElem);
			}
			
			
			document.getElementById("cont_"+idElem).setAttribute("value", ""+ v +"");
			
			
		}
		
		

		
		
	})
})(jQuery);
		
		
		function replaceAll(string, token, newtoken) {
			while (string.indexOf(token) != -1) {
		 		string = string.replace(token, newtoken);
			}
			return string;
		}		