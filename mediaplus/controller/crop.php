<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$qtdCrop = $_POST['qtdCrop'];
	
	for($i = 1; $i <= $qtdCrop; $i++){
	
		$targ_w = $_POST['width_'.$i];
		$targ_h = $_POST['height_'.$i];
		
		
		//CALCULOS PROPORÇÃO************
		$multiplicador = $_POST['w_img'] / $_POST['w_preview'];
			
		$_POST['x_'.$i] *= $multiplicador;
		$_POST['y_'.$i] *= $multiplicador;
		$_POST['w_'.$i] *= $multiplicador;
		$_POST['h_'.$i] *= $multiplicador;
			
		//******************************
		
		
		$jpeg_quality = 80;
		$src = utf8_decode($_POST['urlImagem']);
		$ext = substr($src, strrpos($src, '.') + 1);
		
		if($ext == "jpg" || $ext == "jpeg"){
			$img_r = imagecreatefromjpeg($src);
		}else if($ext == "png"){
			$img_r = imagecreatefrompng($src);
		 }else if($ext == "gif"){
			$img_r = imagecreatefromgif($src);
		 }	
		 
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x_'.$i],$_POST['y_'.$i],
		$targ_w,$targ_h,$_POST['w_'.$i],$_POST['h_'.$i]);
		
		
		if($ext == "jpg" || $ext == "jpeg"){
			header('Content-type: image/jpeg');
		}else if($ext == "png"){
			header('Content-type: image/png');
		 }else if($ext == "gif"){
			header('Content-type: image/gif');
		 }	
		
		
		if($ext == "jpg" || $ext == "jpeg"){
			imagejpeg($dst_r,utf8_decode($_POST['urlSaveImagem_'.$i]),$jpeg_quality);
		}else if($ext == "png"){
			imagepng($dst_r,utf8_decode($_POST['urlSaveImagem_'.$i]));
		 }else if($ext == "gif"){
			imagegif($dst_r,utf8_decode($_POST['urlSaveImagem_'.$i]));
		 }	
		
		/********mini****************/
		if(isset($_POST['mini_'.$i])){
			$targ_mini_w = $_POST['width_mini_'.$i];
			$targ_mini_h = $_POST['height_mini_'.$i];
			
			$dst_mini_r = ImageCreateTrueColor( $targ_mini_w, $targ_mini_h );
			
			imagecopyresampled($dst_mini_r,$img_r,0,0,$_POST['x_'.$i],$_POST['y_'.$i],
			$targ_mini_w,$targ_mini_h,$_POST['w_'.$i],$_POST['h_'.$i]);
			
			
			if($ext == "jpg" || $ext == "jpeg"){
				imagejpeg($dst_mini_r,utf8_decode($_POST['urlSaveImagem_mini_'.$i]),$jpeg_quality);
			}else if($ext == "png"){
				imagepng($dst_mini_r,utf8_decode($_POST['urlSaveImagem_mini_'.$i]));
			 }else if($ext == "gif"){
				imagegif($dst_mini_r,utf8_decode($_POST['urlSaveImagem_mini_'.$i]));
			 }	
			
		}
		/***************************/
		
		
		
		
	}
	
	echo "1";
	exit;

}
?>
