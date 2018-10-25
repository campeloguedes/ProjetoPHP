<?php
require_once('Admin.class.php');

class Log{ 
 
   var $idlog; 
   var $dt; 
   var $tabela; 
   var $chave; 
   var $acao; 
   var $ip; 
   var $tipo; 
   var $Admin; 

   function Log(){
    $this->Admin = new Admin();
   } 

} 
 
?>