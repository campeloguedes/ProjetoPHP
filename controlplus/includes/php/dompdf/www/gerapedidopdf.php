<?php
 @session_start();
 require_once("controlplus/includes/php/dompdf/dompdf_config.inc.php");
  if ( isset( $_POST["html"] ) ) {

  	 if( get_magic_quotes_gpc() ){
       $_POST["html"] = stripslashes($_POST["html"]);
  	 }
  	 
     $dompdf = new DOMPDF();
	 $dompdf->load_html($html);
	 $dompdf->set_paper("letter", "portrait");
	
	 $dompdf->render();
	 $name = "palmares_orcamento_".$_SESSION['logado_palmares_tipo'].'_'.$_SESSION['logado_palmares_id'].'_'.date("dmYHis").".pdf"; 
	 //$dompdf->stream($name);
	 
	 file_put_contents("downloads/pedido_arquivo/".$name, $dompdf->output());  
	 
	 header("Location: $mainFolder/downloads/pedido_arquivo/$name");
	 //exit(0);
  }
?>



<form id="formPdf" name="formPdf" action="<?php echo $mainFolder;?>/controlplus/includes/php/dompdf/www/gerapedidopdf" method="post">

	<textarea id="html" name="html" style="visibility: hidden;">
		<html>
		<head>
		<style type="text/css">

.carrinho_all{
	width: 98.3%;
	float:left;
	background:#FFF;
	margin-top:20px;
}

table.carrinho{
	width: 100%;
	float:left;
	background:#FFF;
	margin-top:0px;
	_margin-top:20px;
	padding:20px;
	
	}

table.carrinho tr.tit, table.carrinho tr.tit td{
	border:none;	
	color: #666;
	font-weight:bold;
	border-bottom:1px solid #96b4d8;
	
	}

table.carrinho tr, table.carrinho tr td{
	
	border:none;	
	color: #666;
	text-align: left;
	padding:10px;
	margin:0;
	border-bottom:1px solid #CDDAEC;
	}	

table.carrinho tr.noborder td{
	border:none; 		
}


table.carrinho tr td span{
	color:#0066ff;
}

table.carrinho tr td img{
	float:left;
	margin-right:20px;
}

.logo{
	float:left;
	margin:10px;
}
	
</style>
		</head>
		<body>
		<img src="includes/imgs/logo-pedido-pdf.jpg" class="logo" />
		<table class="carrinho">
			    
			    
				<tr class="tit" style="border:1px solid #666;">
					
					<td>Produto:</td>
					<td width="60">Quantidade:</td>
					
				</tr>
				
				
			<?php 
			require("model/Itempedido.class.php");
			$itens = $_SESSION['itenspedido'];
			$cont = 0;
			foreach($itens as $it){
				$cont++;
				$item = unserialize($it);
				$item->Produto->imagem = str_replace("/grupopalmares.com.br/", "", $item->Produto->imagem);
			?>				
				
			
					<tr id="tr_<?php echo $item->Produto->idproduto; ?>" onmouseover="this.style.backgroundColor='#FFFFCC';" onmouseout="this.style.backgroundColor='#FFFFFF';">
						
						<td>
							<?php echo $item->Produto->nome; ?>
							&nbsp;<span>(Código do Produto: <?php echo $item->Produto->referencia; ?>)</span>
						</td>
						<td>
							<?php echo $item->qtd; ?>
						</td>
						
					</tr>		
			<?php					
			}
			?>
			</table>
		
		
		</body>
		</html>
	</textarea>
	
	<input type="submit" value="" style="visibility: hidden;"/>
	
</form>

<script type="text/javascript">
	document.getElementById("formPdf").submit();
</script>
