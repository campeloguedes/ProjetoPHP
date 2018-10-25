<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class ModuloDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function ModuloDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($modulo){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO modulo(nome, posicao) VALUES (?, ?)");

      $stmt->bindValue(1, $modulo->nome); 
      $stmt->bindValue(2, $modulo->posicao); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('modulo','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($modulo){ 
     try{
      $stmt = $this->conex->prepare("Update modulo set nome = ?, posicao = ? where idmodulo = ?");

      $stmt->bindValue(1, $modulo->nome); 
      $stmt->bindValue(2, $modulo->posicao); 
      $stmt->bindValue(3, $modulo->idmodulo); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('modulo','atualizar', $modulo->idmodulo);
        return $modulo->idmodulo;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function listarTodos(){ 
     try{
      $stmt = $this->conex->query("SELECT modulo.idmodulo as idmodulo, modulo.nome as nome, modulo.posicao as posicao FROM modulo order by posicao"); 
 
      $modulos = new ArrayObject();

      foreach($stmt as $row){
         $modulo = new modulo(); 

         $modulo->idmodulo = $row['idmodulo'];
         $modulo->nome = $row['nome'];
         $modulo->posicao = $row['posicao'];


         $modulos->append($modulo);
      }

      $this->conex = null;

      //addLog('modulo','listarTodos',0);
      return $modulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT modulo.idmodulo as idmodulo, modulo.nome as nome, modulo.posicao as posicao FROM modulo where idmodulo = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $modulo = new modulo(); 

         $modulo->idmodulo = $row['idmodulo'];
         $modulo->nome = $row['nome'];
         $modulo->posicao = $row['posicao'];


         $this->conex = null;

         addLog('modulo','listarPorId',$id);
         return $modulo;
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
         $s .= "(modulo.idmodulo like $like or modulo.nome like $like or modulo.posicao like $like)";
      }

      $stmt = $this->conex->query("SELECT modulo.idmodulo as idmodulo, modulo.nome as nome, modulo.posicao as posicao FROM modulo where $s order by $order limit $limit"); 
 
      $modulos = new ArrayObject();

      foreach($stmt as $row){
         $modulo = new modulo(); 

         $modulo->idmodulo = $row['idmodulo'];
         $modulo->nome = $row['nome'] != '' ? $row['nome'] : '____';
         $modulo->posicao = $row['posicao'] != '' ? $row['posicao'] : '____';


         $modulos->append($modulo);
      }

      $this->conex = null;

      //addLog('modulo','listarTodos',0);
      return $modulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM modulo where idmodulo = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('modulo','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT modulo.idmodulo as idmodulo, modulo.nome as nome, modulo.posicao as posicao FROM modulo order by $field"); 
 
      $modulos = new ArrayObject();

      foreach($stmt as $row){
         $modulo = new modulo(); 

         $modulo->idmodulo = $row['idmodulo'];
         $modulo->nome = $row['nome'];
         $modulo->posicao = $row['posicao'];


         $modulos->append($modulo);
      }

      $this->conex = null;

      //addLog('modulo','listarOrdenado',0);
      return $modulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT modulo.idmodulo as idmodulo, modulo.nome as nome, modulo.posicao as posicao FROM modulo where $param"); 
 
      $modulos = new ArrayObject();

      foreach($stmt as $row){
         $modulo = new modulo(); 

         $modulo->idmodulo = $row['idmodulo'];
         $modulo->nome = $row['nome'];
         $modulo->posicao = $row['posicao'];


         $modulos->append($modulo);
      }

      $this->conex = null;

      //addLog('modulo','listarOnde',0);
      return $modulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT modulo.idmodulo as idmodulo, modulo.nome as nome, modulo.posicao as posicao FROM modulo where $param"); 
 
      foreach($stmt as $row){
         $modulo = new modulo(); 

         $modulo->idmodulo = $row['idmodulo'];
         $modulo->nome = $row['nome'];
         $modulo->posicao = $row['posicao'];


         return $modulo;
      }

      $this->conex = null;

      //addLog('modulo','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM modulo where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('modulo','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>