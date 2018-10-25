<?php 

require_once('dao/ProdutoDao.class.php'); 
require_once('model/Produto.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class ProdutoController implements InterfaceController{ 
 
   var $dao; 
 

   function ProdutoController(){ 
     $this->dao = new ProdutoDao();  
   } 

   function salvar($produto){ 

     if($produto->idproduto == 0 || $produto->idproduto == ''){
      $idSalvo = $this->dao->salvar($produto);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($produto);
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
 
   function listarPorAnunciante($anunciante_idanunciante){ 

     return $this->dao->listarPorAnunciante($anunciante_idanunciante); 
 

   } 
 
   function listarPorCategoria($categoria_idcategoria){ 

     return $this->dao->listarPorCategoria($categoria_idcategoria); 
 

   } 
 
   function listarPorSubcategoria($subcategoria_idsubcategoria){ 

     return $this->dao->listarPorSubcategoria($subcategoria_idsubcategoria); 
 

   } 
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

   } 
 
   function excluirPorAnunciante($anunciante_idanunciante){ 

     return $this->dao->excluirPorAnunciante($anunciante_idanunciante); 
 

   } 
 
   function excluirPorCategoria($categoria_idcategoria){ 

     return $this->dao->excluirPorCategoria($categoria_idcategoria); 
 

   } 
 
   function excluirPorSubcategoria($subcategoria_idsubcategoria){ 

     return $this->dao->excluirPorSubcategoria($subcategoria_idsubcategoria); 
 

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