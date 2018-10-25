<?php 

require_once('dao/PerfilmoduloDao.class.php'); 
require_once('model/Perfilmodulo.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class PerfilmoduloController implements InterfaceController{ 
 
   var $dao; 
 

   function PerfilmoduloController(){ 
     $this->dao = new PerfilmoduloDao();  
   } 

   function salvar($perfilmodulo){ 

     if($perfilmodulo->idperfilmodulo == 0 || $perfilmodulo->idperfilmodulo == ''){
      $idSalvo = $this->dao->salvar($perfilmodulo);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($perfilmodulo);
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
 
   function listarPorModulo($modulo_idmodulo){ 

     return $this->dao->listarPorModulo($modulo_idmodulo); 
 

   } 
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

   } 
 
   function excluirPorPerfil($perfil_idperfil){ 

     return $this->dao->excluirPorPerfil($perfil_idperfil); 
 

   } 
 
   function excluirPorModulo($modulo_idmodulo){ 

     return $this->dao->excluirPorModulo($modulo_idmodulo); 
 

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