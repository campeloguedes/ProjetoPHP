<?php
require_once('Perfil.class.php');
require_once('Modulo.class.php');

class Perfilmodulo{ 
 
   var $idperfilmodulo; 
   var $Perfil; 
   var $Modulo; 

   function Perfilmodulo(){
    $this->Perfil = new Perfil();
    $this->Modulo = new Modulo();
   } 

} 
 
?>