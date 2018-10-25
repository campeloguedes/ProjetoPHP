<?php include('template/config-init.php'); ?> 
<?php include('template/headers.php'); ?> 
<!-- head -->
<link rel='stylesheet' type='text/css' href='<?php echo $mainFolder; ?>/controlplus/includes/js/dataTables/media/css/datatable.css' />
<script type='text/javascript' language='javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/dataTables/media/js/jquery.dataTables.js'></script>
<script type='text/javascript'>
  $(function() { 
  	   $('#confirmDel').dialog({ 
  	   		bgiframe: true,  
  	   		resizable: true,  
  	   		minHeight: 100,  
  	   		height: 140,  
  	   		modal: true,  
  	   		autoOpen: false,  
              buttons: { 
                   'Confirmar': function() { 
              		  $('#formDel').ajaxSubmit({
	             			dataType: 'html',
	             			type: 'post',
	             			success: response
               	      });
                      $(this).dialog('close'); 
                   }, 
                   Cancelar: function() { 
						$(this).dialog('close'); 
                   } 
              } 
         });
  });

  $(function() { 
  	   $('#confirmDel2').dialog({ 
  	   		bgiframe: true,  
  	   		resizable: true,  
  	   		minHeight: 100,  
  	   		height: 140,  
  	   		modal: true,  
  	   		autoOpen: false,  
              buttons: { 
                   'Confirmar': function() { 
              		  $('#formDel2').ajaxSubmit({
	             			dataType: 'html',
	             			type: 'post',
	             			success: response2
               	      });
                      $(this).dialog('close'); 
                   }, 
                   Cancelar: function() { 
						$(this).dialog('close'); 
                   } 
              } 
         });
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
	   if(data==1){
		   prepare();
         document.getElementById('info').innerHTML = '<p>Excluído com sucesso!</p>'; 
         $('#info').dialog('open'); 
	   }
       if(data==0){
         document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>';
         $('#info').dialog('open'); 
	   }
  }

  function response2(data){
	   if(data==1){
		   prepare();
         document.getElementById('info').innerHTML = '<p>Excluído com sucesso!</p>'; 
         $('#info').dialog('open'); 
	   }
       if(data==0){
         document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>';
         $('#info').dialog('open'); 
	   }
  }

  function controlDel2(){ 
    var limit2 = parseInt(document.getElementById('limit2').value);
	var sel = false;
	var sels = '';
    if(ids.length > 0){
	  	arr = ids.split(';');
	  	for(i = 0; i < arr.length-1; i++){
	   		if(document.getElementById('chb_'+arr[i]).checked == true){if(sel){sels += ';';} sel = true; sels += arr[i]; }
	  	}
    }

    if(sel){ document.getElementById('idPkeys').value = sels; $('#confirmDel2').dialog('open'); }
    else{
         document.getElementById('info').innerHTML = '<p>Nenhum registro selecionado!</p>';
         $('#info').dialog('open'); 
    }
  }

  function selectAll(){
  	if(ids.length > 0){
  		arr = ids.split(';');
  		for(i = 0; i < arr.length-1; i++){
  			document.getElementById('chb_'+arr[i]).checked = true;
  		}
  	}
  	document.getElementById('selrev').onclick = revertAll;
  }

  function revertAll(){
  	if(ids.length > 0){
  		arr = ids.split(';');
  		for(i = 0; i < arr.length-1; i++){
  			document.getElementById('chb_'+arr[i]).checked = false;
  		}
  	}
  	document.getElementById('selrev').onclick = selectAll;
  }

  function atualizarCampo(objeto, campo, valor, onde){
   $.ajax({ 
  	type: 'POST', 
  	url: '<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller',
  	data: 'acao=atualizarCampo&classe='+objeto+'Controller&objeto='+objeto+'&campo='+campo+'&valor='+valor+'&onde='+onde,
  	beforeSend: function(txt) { $('#plusloading').show(); }, 
  	success: function(txt) { $('#plusloading').hide(); }, 
  	error: function(txt) { } 
   }); 
 } 

  function datagrid(like, order, limit) { 
	   $.ajax({ 
			 type: 'POST', 
			 url: '<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller', 
			 data: 'classe=TokenController&acao=datagrid&objeto=Token&like='+like+'&order='+order+'&limit='+limit, 
			 beforeSend: function() { }, 
			 success: function(txt) { data = txt.split('***********'); $('#datagrid').html(data[0]); document.getElementById('totalRegs').innerHTML = data[1]; totalPages(data[1]); ids = data[2]; $('#cpload1').hide(); $('#cpload2').hide(); document.getElementById('selrev').onclick = selectAll; }, 
			 error: function(txt) { document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>'; $('#info').dialog('open'); } 
      }); 
  } 

  function prepare(){ 
	  if(document.getElementById('like').value == 'Busca...'){ var like = ''; }
	  else{ var like = document.getElementById('like').value;	} 
      var limit = limit1 + ',' + document.getElementById('limit2').value; 
      var order = defaultOrder; 

      datagrid(like, order, limit); 
  }

  function nextPage(){
	auxFocus();
    if(parseInt(document.getElementById('pageTotal').innerHTML) != page){
			page++; 
			limit1 = parseInt(limit1) + parseInt(document.getElementById('limit2').value); 

			prepare();
    }else{ $('#cpload2').hide(); }
  }

  function previousPage(){
	auxFocus();
    if(page > 1){
			page--; 
			limit1 = parseInt(limit1) - parseInt(document.getElementById('limit2').value); 

			prepare();
    }else{ $('#cpload2').hide(); }
  }

  function totalPages(regs) { 
	   var limit2 = parseInt(document.getElementById('limit2').value); 
	   if(parseFloat(regs / limit2) - (parseInt(regs / limit2)) != 0){	  
			  total = parseInt(regs / limit2) + 1; 
	   }else{ 
		      total = parseInt(regs / limit2); 
		}	  

     if(total == 0){total = 1;}
	   document.getElementById('pageNow').innerHTML   = page; 
	   document.getElementById('pageTotal').innerHTML = total; 

  } 

  function ordena(order) { 
 		if(defaultOrder == order || defaultOrder == order+' asc'){
 			defaultOrder = order + ' desc';
 		}else{
 			defaultOrder = order + ' asc';
 		 }

 		document.getElementById('th_'+auxOrder).style.fontWeight = 'normal';
 		document.getElementById('th_'+order).style.fontWeight = 'bold';
 		auxOrder = order;
		$('#cpload1').show();
 		prepare();
  } 

  function focusTop() { 
 		document.getElementById('like').focus();
 		document.getElementById('like').blur();
  } 

  function auxFocus() { 
 		if(parseInt(document.getElementById('limit2').value) > 10){
 			focusTop();
 		}
  } 

  var ids; 
  var limit1	     = 0; 
  var page		 = 1; 
  var defaultLike  = ""; 
  var defaultOrder = 'idtoken'; 
  var auxOrder = 'idtoken'; 
  var defaultLimit = '0,25'; 
</script> 
<!-- end head -->

<?php include('template/top.php'); ?> 
<?php include('template/menu.php'); ?> 
<!-- conteudo -->

<div id='Content'> 

   <div class='category'>
		<span class='title'>Token</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Listagem De Tokens</span> 
   </div>

 <br clear='all' /> 

	 <div class='searchdg'>
      <img class="loadsearchdg" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/><input onkeyup="$('#cpload1').show(); limit1 = 0; page = 1; prepare();" style="margin-right:20px; width:150px; margin-bottom:5px;" class="geral" type="text" name="like" id="like" value="Busca..." onfocus="if (this.value == 'Busca...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Busca...';}" />
	 </div> 
 
   <div class="add"><label><input onclick='window.location="<?php echo $mainFolder; ?>/controlplus/cadToken";' type="image" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon-add.png" /> <a href="<?php echo $mainFolder; ?>/controlplus/cadToken">Novo Registro</a> </label><label><input onclick='controlDel2();' type="image" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon-del.png" /> <a onclick='controlDel2();'>Excluir Selecionado(s)</a> </label><label><input type="image" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_excell.gif" /> <a target="_blank" href='http://cms.mediaplus.com.br/tocsv/E1695618512RE1524GHB2G45132GQA-12RE152475OPDGA1321GHB2G45132GQAGHB2G45132GQA'>Exportar</a> </label></div>

   <table id='listReg' cellspacing='1' class='table'>
     <thead> 
        <tr> 
			<th id="selrev" onclick="selectAll();"><img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/select-all-checkbox.png" /></th>
         <th class="order" id="th_idtoken" onclick="ordena('idtoken');">ID</th>
         <th>Ações</th>
        </tr> 
     </thead> 
         <tbody id='datagrid'> 
         </tbody> 
         <tfoot> 
			  <tr><th colspan="50" id="rows"><div style="float:left; margin-top:7px; color:#333;">Total de registros: <span style="color:#F96400; font-weight:bold;" id="totalRegs">&nbsp;</span></div><div style="float:right"><img id="cpload2" style="float:left; margin:3px 12px;" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/><label style="float:left; padding-top:7px;">Exibir:</label><select onchange="focusTop(); $('#cpload2').show(); limit1 = 0; page = 1; prepare();" class="geral" style="margin-left:5px; height:25px;" id="limit2" name="limit2"><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="500">500</option><option value="1000">1000</option></select><label style="margin-left:15px; text-transform: lowercase;  float:left; margin-top:8px; margin-right:5px;"><span id="pageNow">&nbsp;</span> de <span id="pageTotal">&nbsp;</span></label><input onclick="$('#cpload2').show(); previousPage();" type="image" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_previous.gif" style="margin-left:5px; margin-top:5px;" /><input onclick="$('#cpload2').show(); nextPage();" type="image" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_next.gif" style="margin-left:5px; margin-top:5px;" /></div></th></tr>
		  </tfoot>

   </table>

   <form id='formDel' name='formDel' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>
       <input type='hidden' name='classe' id='classe' value='TokenController' />
       <input type='hidden' name='acao' id='acao' value='excluir' />
       <input type='hidden' name='objeto' id='objeto' value='Token' />
       <input type='hidden' name='idPkey' id='idPkey' value='' />
   </form>


   <form id='formDel2' name='formDel2' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>
       <input type='hidden' name='classe' id='classe2' value='TokenController' />
       <input type='hidden' name='acao' id='acao2' value='excluirEmMassa' />
       <input type='hidden' name='objeto' id='objeto2' value='Token' />
       <input type='hidden' name='idPkeys' id='idPkeys' value='' />
   </form>


   <div id='info' title='controlplus - informação'></div>
   <div id='confirmDel' title='controlplus - confirmação'> 
     <p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>Tem certeza que deseja excluir este registro?</p>
   </div>

   <div id='confirmDel2' title='controlplus - confirmação'> 
     <p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>Tem certeza que deseja excluir este(s) registro(s)?</p>
   </div>

</div> 
<!-- end conteudo -->
<script type='text/javascript'> 
  datagrid(defaultLike, defaultOrder, defaultLimit); 
</script> 
<?php include('template/bottom.php'); ?> 
