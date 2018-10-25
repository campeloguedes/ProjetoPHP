<?php 

require_once('dao/AdminDao.class.php'); 
require_once('model/Admin.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class AdminController implements InterfaceController{ 
 
   var $dao; 
 

   function AdminController(){ 
     $this->dao = new AdminDao();  
   } 

   function salvar($admin){ 

     if($admin->idadmin == 0 || $admin->idadmin == ''){
      $idSalvo = $this->dao->salvar($admin);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($admin);
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
 
   function listarPorPerfil($perfil_idperfil){ 

     return $this->dao->listarPorPerfil($perfil_idperfil); 
 

   } 
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

   } 
 
   function excluirPorPerfil($perfil_idperfil){ 

     return $this->dao->excluirPorPerfil($perfil_idperfil); 
 

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