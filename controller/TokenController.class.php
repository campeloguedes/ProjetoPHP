<?php 

require_once('dao/TokenDao.class.php'); 
require_once('model/Token.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class TokenController implements InterfaceController{ 
 
   var $dao; 
 

   function TokenController(){ 
     $this->dao = new TokenDao();  
   } 

   function salvar($token){ 

     $token->dt=dateMysql($token->dt);
     if($token->idtoken == 0 || $token->idtoken == ''){
      $idSalvo = $this->dao->salvar($token);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($token);
      if($idSalvo!=0){
       return '2*'.$idSalvo;
       }else{return 0;}
      }
 

   } 
 
   function listarTodos(){ 

     return $this->dao->listarTodos(); 
 

   } 
 
   function atualizarCampo($field, $value, $where){ 

     return $this->dao->atualizarCampo($field, $value, $where); 
 

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