<?php 

require_once('dao/ParceiroDao.class.php'); 
require_once('model/Parceiro.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class ParceiroController implements InterfaceController{ 
 
   var $dao; 
 

   function ParceiroController(){ 
     $this->dao = new ParceiroDao();  
   } 

   function salvar($parceiro){ 

     if($parceiro->idparceiro == 0 || $parceiro->idparceiro == ''){
      $idSalvo = $this->dao->salvar($parceiro);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($parceiro);
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
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

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