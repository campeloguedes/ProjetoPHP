<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class PerfilDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function PerfilDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($perfil){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO perfil(nome) VALUES (?)");

      $stmt->bindValue(1, $perfil->nome); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('perfil','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($perfil){ 
     try{
      $stmt = $this->conex->prepare("Update perfil set nome = ? where idperfil = ?");

      $stmt->bindValue(1, $perfil->nome); 
      $stmt->bindValue(2, $perfil->idperfil); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('perfil','atualizar', $perfil->idperfil);
        return $perfil->idperfil;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function listarTodos(){ 
     try{
      $stmt = $this->conex->query("SELECT perfil.idperfil as idperfil, perfil.nome as nome FROM perfil"); 
 
      $perfils = new ArrayObject();

      foreach($stmt as $row){
         $perfil = new perfil(); 

         $perfil->idperfil = $row['idperfil'];
         $perfil->nome = $row['nome'];


         $perfils->append($perfil);
      }

      $this->conex = null;

      //addLog('perfil','listarTodos',0);
      return $perfils;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT perfil.idperfil as idperfil, perfil.nome as nome FROM perfil where idperfil = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $perfil = new perfil(); 

         $perfil->idperfil = $row['idperfil'];
         $perfil->nome = $row['nome'];


         $this->conex = null;

         addLog('perfil','listarPorId',$id);
         return $perfil;
      }

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listar($like, $order, $limit){ 
     try{
      $s = '';
      $likes = explode(' ', $like);
      for($x = 0; $x < sizeof($likes); $x++){
         if($x > 0){
           $s .= ' and ';
         }
      	 $like = "_utf8 '%".str_replace("'","",$likes[$x])."%' collate utf8_unicode_ci ";
         $s .= "(perfil.idperfil like $like or perfil.nome like $like)";
      }

      $stmt = $this->conex->query("SELECT perfil.idperfil as idperfil, perfil.nome as nome FROM perfil where $s order by $order limit $limit"); 
 
      $perfils = new ArrayObject();

      foreach($stmt as $row){
         $perfil = new perfil(); 

         $perfil->idperfil = $row['idperfil'];
         $perfil->nome = $row['nome'] != '' ? $row['nome'] : '____';


         $perfils->append($perfil);
      }

      $this->conex = null;

      //addLog('perfil','listarTodos',0);
      return $perfils;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM perfil where idperfil = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('perfil','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT perfil.idperfil as idperfil, perfil.nome as nome FROM perfil order by $field"); 
 
      $perfils = new ArrayObject();

      foreach($stmt as $row){
         $perfil = new perfil(); 

         $perfil->idperfil = $row['idperfil'];
         $perfil->nome = $row['nome'];


         $perfils->append($perfil);
      }

      $this->conex = null;

      //addLog('perfil','listarOrdenado',0);
      return $perfils;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT perfil.idperfil as idperfil, perfil.nome as nome FROM perfil where $param"); 
 
      $perfils = new ArrayObject();

      foreach($stmt as $row){
         $perfil = new perfil(); 

         $perfil->idperfil = $row['idperfil'];
         $perfil->nome = $row['nome'];


         $perfils->append($perfil);
      }

      $this->conex = null;

      //addLog('perfil','listarOnde',0);
      return $perfils;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT perfil.idperfil as idperfil, perfil.nome as nome FROM perfil where $param"); 
 
      foreach($stmt as $row){
         $perfil = new perfil(); 

         $perfil->idperfil = $row['idperfil'];
         $perfil->nome = $row['nome'];


         return $perfil;
      }

      $this->conex = null;

      //addLog('perfil','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM perfil where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('perfil','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>