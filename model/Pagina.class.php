<?php
require_once('Modulo.class.php');

class Pagina{ 
 
   var $idpagina; 
   var $Modulo; 
   var $nome; 
   var $descricao; 
   var $posicao; 

   function Pagina(){
    $this->Modulo = new Modulo();
   } 

} 
 
?>