<?php 

require_once('dao/SubcategoriaDao.class.php'); 
require_once('model/Subcategoria.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class SubcategoriaController implements InterfaceController{ 
 
   var $dao; 
 

   function SubcategoriaController(){ 
     $this->dao = new SubcategoriaDao();  
   } 

   function salvar($subcategoria){ 

     if($subcategoria->idsubcategoria == 0 || $subcategoria->idsubcategoria == ''){
      $idSalvo = $this->dao->salvar($subcategoria);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($subcategoria);
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
 
   function listarPorCategoria($categoria_idcategoria){ 

     return $this->dao->listarPorCategoria($categoria_idcategoria); 
 

   } 
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

   } 
 
   function excluirPorCategoria($categoria_idcategoria){ 

     return $this->dao->excluirPorCategoria($categoria_idcategoria); 
 

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