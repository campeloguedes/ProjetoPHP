<?php
require_once('Categoria.class.php');

class Subcategoria{ 
 
   var $idsubcategoria; 
   var $Categoria; 
   var $nome; 

   function Subcategoria(){
    $this->Categoria = new Categoria();
   } 

} 
 
?>