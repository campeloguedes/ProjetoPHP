<?php
require_once('Perfil.class.php');

class Admin{ 
 
   var $idadmin; 
   var $Perfil; 
   var $nome; 
   var $usuario; 
   var $senha; 
   var $foto; 
   var $bloqueado; 

   function Admin(){
    $this->Perfil = new Perfil();
   } 

} 
 
?>