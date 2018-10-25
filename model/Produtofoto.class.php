<?php
require_once('Produto.class.php');

class Produtofoto{ 
 
   var $idprodutofoto; 
   var $Produto; 
   var $arquivo; 
   var $posicao; 

   function Produtofoto(){
    $this->Produto = new Produto();
   } 

} 
 
?>