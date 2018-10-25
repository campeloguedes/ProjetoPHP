<?php 

require_once('dao/NoticiaDao.class.php'); 
require_once('model/Noticia.class.php'); 
require_once('mediaplus/controller/InterfaceController.class.php'); 
require_once('mediaplus/utils/functionsUtils.php'); 

class NoticiaController implements InterfaceController{ 
 
   var $dao; 
 

   function NoticiaController(){ 
     $this->dao = new NoticiaDao();  
   } 

   function salvar($noticia){ 

     $noticia->dt=dateMysql($noticia->dt);
     if($noticia->idnoticia == 0 || $noticia->idnoticia == ''){
      $idSalvo = $this->dao->salvar($noticia);
      if($idSalvo!=0){
       return '1*'.$idSalvo;
       }else{return 0;}
     }else{
      $idSalvo = $this->dao->atualizar($noticia);
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