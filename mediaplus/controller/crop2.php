<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$totalAreasDestaque = 3;
	
	for($i = 1; $i <= $totalAreasDestaque; $i++){
		if(isset($_POST['width_'.$i])){	
         
		    if($_POST['x_'.$i] != '' && $_POST['y_'.$i] != '' && $_POST['w_'.$i] != '' && $_POST['h_'.$i] != ''){	
				$targ_w = $_POST['width_'.$i];
				$targ_h = $_POST['height_'.$i];
				
				$jpeg_quality = 80;
				$src = utf8_decode($_POST['urlImagem_'.$i]);
				$img_r = imagecreatefromjpeg($src);
				$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
				
				imagecopyresampled($dst_r,$img_r,0,0,$_POST['x_'.$i],$_POST['y_'.$i],
				$targ_w,$targ_h,$_POST['w_'.$i],$_POST['h_'.$i]);
				header('Content-type: image/jpeg');
				imagejpeg($dst_r,utf8_decode($_POST['urlSaveImagem_'.$i]),$jpeg_quality);
				
				//SALVA COORDENADAS DA IMAGEM
				$idimg = $_POST['idimagem_'.$i];
				require_once('controller/ImagemController.class.php');
				$imagemController = new ImagemController();
				$img = $imagemController->listarPorId($idimg);
				$img->Noticia->idnoticia = null;
				$img->coord = $_POST['x_'.$i] . "," . $_POST['y_'.$i] . "," . $_POST['w_'.$i] . "," . $_POST['h_'.$i];
				$imagemController = new ImagemController();
				$imagemController->salvar($img);
				
		    } 	
		}
		
	}
	
	echo "1";
	exit;

}
?>

