<?php 

require_once('dao/ProdutofotoDao.class.php'); 
require_once('model/Produtofoto.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class ProdutofotoController implements InterfaceController{ 
 
   var $dao; 
 

   function ProdutofotoController(){ 
     $this->dao = new ProdutofotoDao();  
   } 

   function salvar($produtofoto){ 

     if($produtofoto->idprodutofoto == 0 || $produtofoto->idprodutofoto == ''){
      $idSalvo = $this->dao->salvar($produtofoto);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($produtofoto);
      if($idSalvo!=0){
       return '2*'.$idSalvo;
       }else{return 0;}
      }
 

   } 
 
   function salvarPosicao($produtofoto){ 

     return '1*'.$this->dao->salvarPosicao($produtofoto); 
 

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
 
   function listarPorProduto($produto_idproduto){ 

     return $this->dao->listarPorProduto($produto_idproduto); 
 

   } 
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

   } 
 
   function excluirPorProduto($produto_idproduto){ 

     return $this->dao->excluirPorProduto($produto_idproduto); 
 

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