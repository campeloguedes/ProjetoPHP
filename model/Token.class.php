<?php
require_once('Admin.class.php');

class Token{ 
 
   var $idtoken; 
   var $Admin; 
   var $dt; 
   var $codigo; 
   var $ip; 

   function Token(){
    $this->Admin = new Admin();
   } 

} 
 
?>