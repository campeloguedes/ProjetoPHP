<?php 

require_once('dao/LogDao.class.php'); 
require_once('model/Log.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class LogController implements InterfaceController{ 
 
   var $dao; 
 

   function LogController(){ 
     $this->dao = new LogDao();  
   } 

   function salvar($log){ 

     $log->dt=dateMysql($log->dt);
     if($log->idlog == 0 || $log->idlog == ''){
      $idSalvo = $this->dao->salvar($log);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($log);
      if($idSalvo!=0){
       return '2*'.$idSalvo;
       }else{return 0;}
      }
 

   } 
 
   function listarTodos(){ 

     return $this->dao->listarTodos(); 
 

   } 
 
   function listarPorId($id){ 

     return $this->dao->listarPorId($id); 
 

   } 
 
   function listar($like, $order, $limit){ 

     return $this->dao->listar($like, $order, $limit); 
 

   } 
 
   function listarPorAdmin($admin_idadmin){ 

     return $this->dao->listarPorAdmin($admin_idadmin); 
 

   } 
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

   } 
 
   function excluirPorAdmin($admin_idadmin){ 

     return $this->dao->excluirPorAdmin($admin_idadmin); 
 

   } 
 
   function listarOrdenado($field){ 

     return $this->dao->listarOrdenado($field); 
 

   } 
 
   function listarOnde($param){ 

     return $this->dao->listarOnde($param); 
 

   } 
 
   function listarOnde2($param){ 

     return $this->dao->listarOnde2($param); 
 

   } 
 
   function excluirOnde($param){ 

     return $this->dao->excluirOnde($param); 
 

   } 
 

 } 
 
 ?>