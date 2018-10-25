<?php
	header("Content-Type: text/html; charset=ISO-8859-1",true);	

	if(isset($_POST['imagem']) && isset($_POST['template'])){
		
		$template 	= $_POST['template'];
		$imagem_ 	= utf8_decode($_POST['imagem']);
		$imagem 	= rand(0,999999) . '_' . str_replace(" ", "", $imagem_);
		$imagem		= strtolower($imagem);
		$imagem		= str_replace("á", "a", $imagem);
		$imagem		= str_replace("é", "e", $imagem);
		$imagem		= str_replace("í", "i", $imagem);
		$imagem		= str_replace("ó", "o", $imagem);
		$imagem		= str_replace("ú", "u", $imagem);
		$largura_img_left = $_POST['largura_img_left']; //img alinhada a esquerda
		$largura_img_all = $_POST['largura_img_all']; //img de fora a fora
		
		rename('uploads/imagem_arquivo/'.$imagem_, 'uploads/imagem_arquivo/'.$imagem);
		
		require('controlplus/includes/php/WideImage/WideImage.inc.php');
		$image = wiImage::load('uploads/imagem_arquivo/'.$imagem);
		$w = $image->getWidth();
		$h = $image->getHeight();	
		
		
		$saida = true;
		if($template == 1 || $template == 2){
		
				//largura maxima = $largura_img_left
				if($w <= $largura_img_left){
					echo 'true*Sucesso*'.$w.'*'.$h.'*no-popup*'.$imagem; 
				}else{
					//popup
					$imageGde = $image;
					if(!$w > $largura_img_all){
						$imageGde->resize($w, $h)->saveToFile('uploads/imagem_arquivo/gde_'.$imagem);
					}else{
						$imageGde->resize($largura_img_all, ($h*$largura_img_all)/$w)->saveToFile('uploads/imagem_arquivo/gde_'.$imagem);	
					 }
					//exibe
					$image->resize($largura_img_left, ($h*$largura_img_left)/$w)->saveToFile('uploads/imagem_arquivo/'.$imagem);
					echo 'true*Sucesso*'.$largura_img_left.'*' . ($h*$largura_img_left)/$w .'*no-popup*'.$imagem;  
				 }
	
		}else if($template == 3){
			
				//largura = 580
				if($w < $largura_img_all){
					$saida = false;
					echo 'false*Para esta posição imagem deve possuir no mínimo $largura_img_allpx de largura.*'.$w.'*'.$h.'*no-popup*'.$imagem; 
				}else{
					
					if($w == $largura_img_all){
						echo 'true*Sucesso*'.$w.'*'.$h.'*no-popup*'.$imagem; 
					}else if($w > $largura_img_all){
						//popup
						$imageGde = $image;
						if(!$w > $largura_img_all){
							$imageGde->resize($w, $h)->saveToFile('uploads/imagem_arquivo/gde_'.$imagem);
						}else{
							$imageGde->resize($largura_img_all, ($h*$largura_img_all)/$w)->saveToFile('uploads/imagem_arquivo/gde_'.$imagem);	
						 }
						//exibe
						$image->resize($largura_img_all, ($h*$largura_img_all)/$w)->saveToFile('uploads/imagem_arquivo/'.$imagem);
						echo 'true*Sucesso*'.$largura_img_all.'*'.($h*$largura_img_all)/$w.'*no-popup*'.$imagem;
					 }
					 
					/*$image->resize($largura_img_all, ($h*$largura_img_all)/$w)->saveToFile('uploads/imagem_arquivo/'.$imagem);
					echo 'true*Sucesso*$largura_img_all*'.($h*$largura_img_all)/$w.'*no-popup*'.$imagem; */
				 }

		
		}
		
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
		
		/*if($saida){
			
			$html = $_POST['html'];
			$fp = fopen("controlplus/includes/js/ckeditor/_aux.html", "w");
			$escreve = fwrite($fp, $html);
			fclose($fp);
			
		}*/
		
	}


?>