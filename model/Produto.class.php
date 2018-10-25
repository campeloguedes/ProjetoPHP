<?php
require_once('Anunciante.class.php');
require_once('Categoria.class.php');
require_once('Subcategoria.class.php');

class Produto{ 
 
   var $idproduto; 
   var $Anunciante; 
   var $Categoria; 
   var $Subcategoria; 
   var $titulo; 
   var $descricao; 
   var $preco; 
   var $fpagamento; 
   var $fotodestaque; 
   var $destaque; 

   function Produto(){
    $this->Anunciante = new Anunciante();
    $this->Categoria = new Categoria();
    $this->Subcategoria = new Subcategoria();
   } 

} 
 
?>