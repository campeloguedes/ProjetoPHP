<?php 

require_once('dao/PaginaDao.class.php'); 
require_once('model/Pagina.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class PaginaController implements InterfaceController{ 
 
   var $dao; 
 

   function PaginaController(){ 
     $this->dao = new PaginaDao();  
   } 

   function salvar($pagina){ 

     if($pagina->idpagina == 0 || $pagina->idpagina == ''){
      $idSalvo = $this->dao->salvar($pagina);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($pagina);
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
 
   function listarPorModulo($modulo_idmodulo){ 

     return $this->dao->listarPorModulo($modulo_idmodulo); 
 

   } 
 
   function excluir($id){ 

     return $this->dao->excluir($id); 
 

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