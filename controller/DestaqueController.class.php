<?php 

require_once('dao/DestaqueDao.class.php'); 
require_once('model/Destaque.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class DestaqueController implements InterfaceController{ 
 
   var $dao; 
 

   function DestaqueController(){ 
     $this->dao = new DestaqueDao();  
   } 

   function salvar($destaque){ 

     if($destaque->iddestaque == 0 || $destaque->iddestaque == ''){
      $idSalvo = $this->dao->salvar($destaque);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($destaque);
      if($idSalvo!=0){
       return '2*'.$idSalvo;
       }else{return 0;}
      }
 

   } 
 
   function salvarPosicao($destaque){ 

     return '1*'.$this->dao->salvarPosicao($destaque); 
 

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