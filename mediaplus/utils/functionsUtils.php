<?php
function dateMysql($datEntrada){
	if($datEntrada == ''){
		$datSaida = '0000-00-00';
	}else{
		$datSaida = $datEntrada[6].$datEntrada[7].$datEntrada[8].$datEntrada[9];
		$datSaida .= '-'.$datEntrada[3].$datEntrada[4].'-'.$datEntrada[0].$datEntrada[1];
		if(strlen($datEntrada) > 10){
			$datSaida .= ' '.$datEntrada[11].$datEntrada[12].':'.$datEntrada[14].$datEntrada[15];
		}	
	 }
	  
	return $datSaida;	
}

function diasemana($data){

	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);
	
	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
	
	switch($diasemana) {
	case"0": $diasemana = "Domingo";       break;
	case"1": $diasemana = "Segunda"; break;
	case"2": $diasemana = "Ter�a";   break;
	case"3": $diasemana = "Quarta";  break;
	case"4": $diasemana = "Quinta";  break;
	case"5": $diasemana = "Sexta";   break;
	case"6": $diasemana = "S�bado";        break;
	}
	return $diasemana;

}

function ano($datEntrada){
	if($datEntrada == '0000-00-00' || $datEntrada == '1969-12-31'){
		$datSaida = "____";
	}else{
		$datSaida = $datEntrada[0].$datEntrada[1].$datEntrada[2].$datEntrada[3];
     }
	 
	return $datSaida;	
}

function mes($datEntrada){
	if($datEntrada == '0000-00-00' || $datEntrada == '1969-12-31'){
		$datSaida = "____";
	}else{
		$datSaida = $datEntrada[5].$datEntrada[6];
		
     }
	 
	return $datSaida;	
}



function dia($datEntrada){
	if($datEntrada == '0000-00-00' || $datEntrada == '1969-12-31'){
		$datSaida = "____";
	}else{
		$datSaida = $datEntrada[8].$datEntrada[9];
		
     }
	 
	return $datSaida;	
}

function mesAbreviado($nMes){
	$mes[1] = "JAN";
	$mes[2] = "FEV";
	$mes[3] = "MAR";
	$mes[4] = "ABR";
	$mes[5] = "MAI";
	$mes[6] = "JUN";
	$mes[7] = "JUL";
	$mes[8] = "AGO";
	$mes[9] = "SET";
	$mes[10] = "OUT";
	$mes[11] = "NOV";
	$mes[12] = "DEZ";
	
	return $mes[$nMes];
}

function mesCompleto($nMes){
	$mes[1] = "Janeiro";
	$mes[2] = "Fevereiro";
	$mes[3] = "Mar�o";
	$mes[4] = "Abril";
	$mes[5] = "Maio";
	$mes[6] = "Junho";
	$mes[7] = "Julho";
	$mes[8] = "Agosto";
	$mes[9] = "Setembro";
	$mes[10] = "Outubro";
	$mes[11] = "Novembro";
	$mes[12] = "Dezembro";
	
	return $mes[$nMes];
}

function dt($datEntrada){
	if($datEntrada == '0000-00-00' || $datEntrada == '1969-12-31'){
		$datSaida = "____";
	}else{
		$datSaida = $datEntrada[8].$datEntrada[9].'/'.$datEntrada[5].$datEntrada[6];
		$datSaida .= '/'.$datEntrada[0].$datEntrada[1].$datEntrada[2].$datEntrada[3];
     }
	 
	return $datSaida;	
}

function dthr($datEntrada){
	if($datEntrada == '0000-00-00 00:00:00'){
		$datSaida = "____";
	}else{
		$datSaida = $datEntrada[8].$datEntrada[9].'/'.$datEntrada[5].$datEntrada[6];
		$datSaida .= '/'.$datEntrada[0].$datEntrada[1].$datEntrada[2].$datEntrada[3];
		$datSaida .= ' '.$datEntrada[11].$datEntrada[12].':'.$datEntrada[14].$datEntrada[15];
	 }
	 
	return $datSaida;	
}

function hr($datEntrada){
	if($datEntrada == '0000-00-00 00:00:00'){
		$datSaida = "____";
	}else{
		if(strlen($datEntrada) == 19){
			$datSaida = $datEntrada[11].$datEntrada[12].':'.$datEntrada[14].$datEntrada[15];
		}else if(strlen($datEntrada) == 8){
			$datSaida = $datEntrada[0].$datEntrada[1].':'.$datEntrada[3].$datEntrada[4];	
		 }  
	}
	 
	return $datSaida;	
}

function auxUrl($str){
	return str_replace(' ', '+', $str);	
}

function busca_cep($cep){  
    $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  
    parse_str($resultado, $retorno);   
    return $retorno;  
} 

function addQuebraLinha($str){
	$str = str_replace("\n", "<br/>", $str);
	return $str;
}

function trataString($newname){
		$newname = strtolower($newname);
		$newname = str_replace("&aacute;","�",$newname);
		$newname = str_replace("&Aacute;","�",$newname);
		$newname = str_replace("&eacute;","�",$newname);
		$newname = str_replace("&Eacute;","�",$newname);
		$newname = str_replace("&iacute;","�",$newname);
		$newname = str_replace("&Iacute;","�",$newname);
		$newname = str_replace("&oacute;","�",$newname);
		$newname = str_replace("&Oacute;","�",$newname);
		$newname = str_replace("&uacute;","�",$newname);
		$newname = str_replace("&Uacute;","�",$newname);
		$newname = str_replace("&ccedil;","�",$newname);
		$newname = str_replace("&Ccedil;","�",$newname);
		$newname = str_replace("&acirc;","�",$newname);
		$newname = str_replace("&Acirc;","�",$newname);
		$newname = str_replace("&ecirc;","�",$newname);
		$newname = str_replace("&Ecirc;","�",$newname);
		$newname = str_replace("&icirc;","�",$newname);
		$newname = str_replace("&Icirc;","�",$newname);
		$newname = str_replace("&ocirc;","�",$newname);
		$newname = str_replace("&Ocirc;","�",$newname);
		$newname = str_replace("&ucirc;","�",$newname);
		$newname = str_replace("&Ucirc;","�",$newname);
		$newname = str_replace("&atilde;","�",$newname);
		$newname = str_replace("&Atilde;","�",$newname);
		$newname = str_replace("&otilde;","�",$newname);
		$newname = str_replace("&Otilde;","�",$newname);
		$newname = str_replace("&agrave;","�",$newname);
		$newname = str_replace("&Agrave;","�",$newname);
		$newname = str_replace("&egrave;","�",$newname);
		$newname = str_replace("&Egrave;","�",$newname);
		$newname = str_replace("&igrave;","�",$newname);
		$newname = str_replace("&Igrave;","�",$newname);
		$newname = str_replace("&ograve;","�",$newname);
		$newname = str_replace("&ograve;","�",$newname);
		$newname = str_replace("&ugrave;","�",$newname);
		$newname = str_replace("&ugrave;","�",$newname);
		$newname = str_replace("\&quot;",'',$newname);
		$newname = str_replace("&quot;",'',$newname);
		$newname = str_replace("&frasl;",'',$newname);
		$newname = str_replace(" ","-",$newname);
		$newname = str_replace("�","a",$newname);
		$newname = str_replace("�","a",$newname);
		$newname = str_replace("�","e",$newname);
		$newname = str_replace("�","e",$newname);
		$newname = str_replace("�","i",$newname);
		$newname = str_replace("�","i",$newname);
		$newname = str_replace("�","o",$newname);
		$newname = str_replace("�","o",$newname);
		$newname = str_replace("�","u",$newname);
		$newname = str_replace("�","u",$newname);
		$newname = str_replace("�","c",$newname);
		$newname = str_replace("�","c",$newname);
		$newname = str_replace("�","a",$newname);
		$newname = str_replace("�","a",$newname);
		$newname = str_replace("�","e",$newname);
		$newname = str_replace("�","e",$newname);
		$newname = str_replace("�","i",$newname);
		$newname = str_replace("�","i",$newname);
		$newname = str_replace("�","o",$newname);
		$newname = str_replace("�","o",$newname);
		$newname = str_replace("�","u",$newname);
		$newname = str_replace("�","u",$newname);
		$newname = str_replace("�","a",$newname);
		$newname = str_replace("�","a",$newname);
		$newname = str_replace("�","o",$newname);
		$newname = str_replace("�","o",$newname);
		$newname = str_replace("�","a",$newname);
		$newname = str_replace("�","e",$newname);
		$newname = str_replace("�","i",$newname);
		$newname = str_replace("�","o",$newname);
		$newname = str_replace("�","u",$newname);
		$newname = str_replace("~","",$newname);
		$newname = str_replace("'","",$newname);
		$newname = str_replace("_","",$newname);
		$newname = str_replace("�","",$newname);
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
		$newname = str_replace("�","",$newname);
		$newname = str_replace("!","",$newname);
		$newname = str_replace('"',"",$newname);
		$newname = str_replace("�","",$newname);
		$newname = str_replace("�","",$newname);
		$newname = str_replace("�","",$newname);
		$newname = str_replace("=","",$newname); 
		$newname = str_replace("+","",$newname);
		$newname = str_replace(",","",$newname);
		$newname = str_replace("/","",$newname);
		$newname = str_replace(":","",$newname);
		
		return $newname;
	
}

function trataTexto($newname){
		
		$newname = str_replace("�","&aacute;",$newname);
		$newname = str_replace("�","&Aacute;",$newname);
		$newname = str_replace("�","&eacute;",$newname);
		$newname = str_replace("�","&Eacute;",$newname);
		$newname = str_replace("�","&iacute;",$newname);
		$newname = str_replace("�","&Iacute;",$newname);
		$newname = str_replace("�","&oacute;",$newname);
		$newname = str_replace("�","&Oacute;",$newname);
		$newname = str_replace("�","&uacute;",$newname);
		$newname = str_replace("�","&Uacute;",$newname);
		$newname = str_replace("�","&ccedil;",$newname);
		$newname = str_replace("�","&Ccedil;",$newname);
		$newname = str_replace("�","&acirc;",$newname);
		$newname = str_replace("�","&Acirc;",$newname);
		$newname = str_replace("�","&ecirc;",$newname);
		$newname = str_replace("�","&Ecirc;",$newname);
		$newname = str_replace("�","&icirc;",$newname);
		$newname = str_replace("�","&Icirc;",$newname);
		$newname = str_replace("�","&ocirc;",$newname);
		$newname = str_replace("�","&Ocirc;",$newname);
		$newname = str_replace("�","&ucirc;",$newname);
		$newname = str_replace("�","&Ucirc;",$newname);
		$newname = str_replace("�","&atilde;",$newname);
		$newname = str_replace("�","&Atilde;",$newname);
		$newname = str_replace("�","&otilde;",$newname);
		$newname = str_replace("�","&Otilde;",$newname);
		$newname = str_replace("�","&agrave;",$newname);
		$newname = str_replace("�","&Agrave;",$newname);
		$newname = str_replace("�","&egrave;",$newname);
		$newname = str_replace("�","&Egrave;",$newname);
		$newname = str_replace("�","&igrave;",$newname);
		$newname = str_replace("�","&Igrave;",$newname);
		$newname = str_replace("�","&ograve;",$newname);
		$newname = str_replace("�","&ograve;",$newname);
		$newname = str_replace("�","&ugrave;",$newname);
		$newname = str_replace("�","&ugrave;",$newname);
		$newname = str_replace("�","&ordm;",$newname);
		$newname = str_replace("�","&ordf;",$newname);
		
		return $newname;
	
}


function money($str){
	$str = str_replace(".", "", $str);
	$str = str_replace(",", ".", $str);	
	return $str;
}

function money_reverse($str){
	$str = str_replace(".", ",", $str);
	$arr = explode(",",$str);
	if(sizeof($arr) == 1){
		$arr[1] = '00';
	}
	$part1 = $arr[0];
	$cont = 0;
	$part1_new = "";
	for($i = strlen($arr[0])-1; $i >= 0; $i--){
		$cont++;
		if($cont == 4){
			$part1_new .= '.';
			$cont = 1;
		}
		$part1_new .= $part1[$i];
		
	}
	
	
	if(strlen($arr[1]) == 1){
		$arr[1] .= '0';
	}
	
		
	$str = strrev($part1_new) . ',' . $arr[1];
	
	return $str;
}

function is_img($arquivo){
	
	$ext = explode('.',$arquivo);
    $ext = array_reverse($ext);
	$extensao = strtolower($ext[0]); 
	
	if($extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'gif' || $extensao == 'png' || $extensao == 'bmp'){
		return true;	
	}else{
		return false;	
	 }
	
		
}

function get_extensao($arquivo){
	$ext = explode('.',$arquivo);
    $ext = array_reverse($ext);
	$extensao = strtolower($ext[0]); 
	return $extensao;
}

function mascara_telefone($telefone,$mask = "(99) 9999-9999"){
    $telefone = preg_replace("/[^0-9]/","", $telefone);
    $countend = strlen($mask)-1;
    if(strpos($mask,'?') !== false){
        if(strlen($telefone) < substr_count($mask,'9')){
            $countend--;
        }
    }
    $telefonecount = strlen($telefone)-1;
    $return = array();
    for($a = $countend; $a >= 0; $a--){
        if(substr($mask,$a,1) === '9'){
                array_unshift($return, substr($telefone,$telefonecount,1));
                $telefonecount--;
            } else {
                array_unshift($return, substr($mask,$a,1));
        }
    }
    return join(str_replace("?","",$return));
}


function getUrlPath($url){
    $url = preg_replace("(^https?://)", "",$url); 
    $datainurl = explode("/",$url);
    array_shift($datainurl);
    return join("/",$datainurl);
}


?>