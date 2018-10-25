/*
MP-FORM-AJAX
@# Dependencias (Sweet)
lib/jquery.sweetalert2.css
lib/jquery.sweetalert2.js
*/
$(document).ready(function(){
	
	//SELECTS
    $("div[mp-select] select ").change(function(){
	    var rec = $(this).parent('div[mp-select]').find('strong');
	  	var val = $(this).val();
	  	$(this).find('option').each(function(index, element) {
	         if($(element).val() == val){
	  	       rec.html($(element).html()); 
	  	   	  }      
	    });
    });
    $("div[mp-select]").find('select').each(function(index,element){
	    var rec = $(element).parent('div[mp-select]').find('strong');
	    var val = $(element).val();
	    $(element).find('option').each(function(i, el) {
	         if($(el).val() == val){
	           rec.html($(el).html()); 
	       	 }      
	    });
	});
	

	//AJAX REQUEST
	$.mpAjax = function(path, params, content){

		$.ajax({
			url: $.mediaplus.mainFolder+"/ajax/"+path+".ajax",
			type:'POST',
			data: $.param(params),
			beforeSend: function(){
				$('body').prepend('<div mp-load></div>');	
			},
			success: function(data){

				$("div[mp-load]").fadeOut('slow',function(){

				 	$("div[mp-load]").remove();

				 	if( data ){
				 		$(content).html(data);
					}
			 	});

			},
			error: function(){
				console.log("Error request");
			}
		});

	};


    //FORM SUBMIT AJAX
	$("*[mp-form]").ajaxForm({
		dataType: 'html',
		type: 'post',
		beforeSend:function(){ 
		 $('body').prepend('<div mp-load></div>');
		},
		success: function(data){

			console.log(data);

			 data = $.parseJSON(data);

			 $("div[mp-load]").fadeOut('slow',function(){

			 	$("div[mp-load]").remove();

			 	if( !!data.error ){

			 			swal({  
							title: data.message, 
							text: data.complement, 
							type: 'error', 
							confirmButtonText: 'Ok' 
						},function(){
							eval(data.callback); 
						});

			 	} else {

			 		$("form[mp-form]").resetForm();

			 		swal({  
							title: data.message, 
							text: data.complement, 
							type: 'success', 
							confirmButtonText: 'Ok' 
					},function(){
						eval(data.callback);
					});

			 	}

			 });

		},
		error: function(){
		 swal('Falha ao enviar dados!','Clique no botão para sair','error');
		}
	});
	
});