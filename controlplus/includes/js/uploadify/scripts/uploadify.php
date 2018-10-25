<?php
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

session_start();

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath) . utf8_decode($_FILES['Filedata']['name']);
	$targetPath = str_replace('//','/',$targetPath);
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$targetFile);
		
		//$fileName = $_POST['nameFile'].'.'.$extensao(strlen($extensao)-1);
		//rename($targetFile, $targetPath.$fileName);
		$newname = strtolower($targetFile);
		$newname = str_replace(" ","",$newname);
		$newname = str_replace("á","a",$newname);
		$newname = str_replace("é","e",$newname);
		$newname = str_replace("í","i",$newname);
		$newname = str_replace("ó","o",$newname);
		$newname = str_replace("ú","u",$newname);
		$newname = str_replace("ç","c",$newname);
		$newname = str_replace("â","a",$newname);
		$newname = str_replace("ê","e",$newname);
		$newname = str_replace("î","i",$newname);
		$newname = str_replace("ô","o",$newname);
		$newname = str_replace("û","u",$newname);
		$newname = str_replace("ã","a",$newname);
		$newname = str_replace("õ","o",$newname);
		$newname = str_replace("à","a",$newname);
		$newname = str_replace("è","e",$newname);
		$newname = str_replace("ì","i",$newname);
		$newname = str_replace("ò","o",$newname);
		$newname = str_replace("ù","u",$newname);
		
		$newname = str_replace("Á","a",$newname);
		$newname = str_replace("É","e",$newname);
		$newname = str_replace("Í","i",$newname);
		$newname = str_replace("Ó","o",$newname);
		$newname = str_replace("Ú","u",$newname);
		$newname = str_replace("Ç","c",$newname);
		$newname = str_replace("Â","a",$newname);
		$newname = str_replace("Ê","e",$newname);
		$newname = str_replace("Î","i",$newname);
		$newname = str_replace("Ô","o",$newname);
		$newname = str_replace("Û","u",$newname);
		$newname = str_replace("Ã","a",$newname);
		$newname = str_replace("Õ","o",$newname);
		$newname = str_replace("À","a",$newname);
		$newname = str_replace("È","e",$newname);
		$newname = str_replace("Ì","i",$newname);
		$newname = str_replace("Ò","o",$newname);
		$newname = str_replace("Ù","u",$newname);
		
		$newname = str_replace("~","",$newname);
		$newname = str_replace("'","",$newname);
		$newname = str_replace("+","",$newname);
		$newname = str_replace("´","",$newname);
		$newname = str_replace("`","",$newname);
		$newname = str_replace("^","",$newname);
		$newname = str_replace("%","",$newname);
		$newname = str_replace("@","",$newname);
		$newname = str_replace("#","",$newname);
		$newname = str_replace("*","",$newname);
		$newname = str_replace("?","",$newname);
		$newname = str_replace("|","",$newname);
		$newname = str_replace(";","",$newname);
		$newname = str_replace("{","",$newname);
		$newname = str_replace("}","",$newname);
		$newname = str_replace("(","",$newname);
		$newname = str_replace(")","",$newname);
		$newname = str_replace("[","",$newname);
		$newname = str_replace("]","",$newname);
		$newname = str_replace("$","",$newname);
		$newname = str_replace("&","",$newname);
		$newname = str_replace("¨","",$newname);
		$newname = str_replace("!","",$newname);
		$newname = str_replace('"',"",$newname);
		$newname = str_replace("§","",$newname);
		$newname = str_replace("ª","",$newname);
		$newname = str_replace("º","",$newname);
		$newname = str_replace("=","",$newname); 
		$newname = str_replace("-","",$newname); 
		
		
		rename($targetFile, $newname);
		
		
		/***********************************************************************************/
		
		$fileidA = explode("_", $_REQUEST['folder']);
		$fileidB = explode("/", $fileidA[1]);
		$fileid = $fileidB[0];
		$exts = explode(".", $newname);
		$ext = $exts[sizeof($exts)-1];
		
		if(isset($_POST['fileid'])){
			$fileid = $_POST['fileid'];
		}
		
		/**********************************************************************/
		/**********************************************************************/
		/**********************************************************************/
		/**********************************************************************/
		if(isset($_POST[$fileid.'_name_file'])){
			rename($newname, $targetPath.'/'.$_POST[$fileid.'_name_file'].'.'.$ext);
			$newname = $targetPath.'/'.$_POST[$fileid.'_name_file'].'.'.$ext;
		}
		/**********************************************************************/
		/**********************************************************************/
		/**********************************************************************/
		/**********************************************************************/
		
		
		if($ext == "jpg" || $ext == "jpeg" || $ext == "gif" || $ext == "png"){
			
			require('../../../php/WideImage/WideImage.inc.php');

			
			
			
			for($cp = 1; $cp <=5; $cp++){

				
				if(isset($_POST[$fileid.'_width_'.$cp])){
					
					$image = wiImage::load($newname);
					$w = $image->getWidth();
					$h = $image->getHeight();
					
					/*$_POST[$fileid.'_width_'.$cp] = $_POST[$fileid.'_width_'.$cp] == '' ? 0 : $_POST[$fileid.'_width_'.$cp];
					$_POST[$fileid.'_height_'.$cp] = $_POST[$fileid.'_height_'.$cp] == '' ? 0 : $_POST[$fileid.'_height_'.$cp];*/
					
					$imgnameA = explode("/", $newname); 
					$imgname = $imgnameA[sizeof($imgnameA) - 1]; 
					
					if($_POST[$fileid.'_width_'.$cp] == 0 && $_POST[$fileid.'_height_'.$cp] == 0 && $cp == 1){	
						if($w > 1024){
							$image->resize(1024, ($h*1024)/$w)->saveToFile($targetPath.$cp."_".$imgname);
						}
					}else{
						
						
						//$image->resize($_POST['width_file'], $_POST['height_file'])->saveToFile($newname);
						
						if($_POST[$fileid.'_width_'.$cp] != 0){	
							if($w > $_POST[$fileid.'_width_'.$cp]){
								if($_POST[$fileid.'_height_'.$cp] == 0){
									$image->resize($_POST[$fileid.'_width_'.$cp], ($h*$_POST[$fileid.'_width_'.$cp])/$w)->saveToFile($targetPath.$cp."_".$imgname);
								}else{
									$image->resize($_POST[$fileid.'_width_'.$cp], $_POST[$fileid.'_height_'.$cp])->saveToFile($targetPath.$cp."_".$imgname);
								 }
							}
						}else if($_POST[$fileid.'_height_'.$cp] != 0){
							if($h > $_POST[$fileid.'_height_'.$cp]){
								$image->resize(($w * $_POST[$fileid.'_height_'.$cp]) / $h, $_POST[$fileid.'_height_'.$cp])->saveToFile($targetPath.$cp."_".$imgname);
							}
						 }
						
						
					 }
				}
			} 

			
			
			//Marca D'agua
			 
			 if(isset($_POST[$fileid.'_marca_dagua'])){
			 	
			 	$image = wiImage::load($newname);
				$w = $image->getWidth();
				$h = $image->getHeight();
				
				$top = $h - 70 - 1;
      			$top .= 'px';
      			
      			$watermark = wiImage::load($_POST[$fileid.'_marca_dagua'].".png");
			 	$image->merge($watermark, '2.5%', $top, 100)->saveToFile($newname);
			 }
			
			
		}
		/***********************************************************************************/
		
		
		
		echo "1";
	
	
	
	
	
	// } else {
	// 	echo 'Invalid file type.';
	// }
}
?>