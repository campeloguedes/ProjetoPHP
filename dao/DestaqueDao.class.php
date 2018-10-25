<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class DestaqueDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function DestaqueDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($destaque){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO destaque(titulo, url, arquivo, posicao) VALUES (?, ?, ?, ?)");

      $stmt->bindValue(1, $destaque->titulo); 
      $stmt->bindValue(2, $destaque->url); 
      $stmt->bindValue(3, $destaque->arquivo); 
      $stmt->bindValue(4, $destaque->posicao); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('destaque','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($destaque){ 
     try{
      $stmt = $this->conex->prepare("Update destaque set titulo = ?, url = ?, arquivo = ?, posicao = ? where iddestaque = ?");

      $stmt->bindValue(1, $destaque->titulo); 
      $stmt->bindValue(2, $destaque->url); 
      $stmt->bindValue(3, $destaque->arquivo); 
      $stmt->bindValue(4, $destaque->posicao); 
      $stmt->bindValue(5, $destaque->iddestaque); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('destaque','atualizar', $destaque->iddestaque);
        return $destaque->iddestaque;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function salvarPosicao($destaque){ 
     try{
      $stmt = $this->conex->prepare("Update destaque set posicao = ? where iddestaque = ?");

      $stmt->bindValue(1, $destaque->posicao); 
      $stmt->bindValue(2, $destaque->iddestaque); 
      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('destaque','salvarPosicao', $destaque->iddestaque);
        return $destaque->iddestaque;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update destaque set $field = ? where $where");
      $stmt->bindValue(1, $value); 
      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        return true;
      }else
        $_SESSION["cplus_save_error"] = print_r($stmt->errorInfo());
        return false;
     }catch ( PDOException $ex ){ 
        $_SESSION["cplus_save_error"] = print_r($stmt->errorInfo());
        return false; 
      }

   } 
 
   function listarTodos(){ 
     try{
      $stmt = $this->conex->query("SELECT destaque.iddestaque as iddestaque, destaque.titulo as titulo, destaque.url as url, destaque.arquivo as arquivo, destaque.posicao as posicao FROM destaque order by posicao"); 
 
      $destaques = new ArrayObject();

      foreach($stmt as $row){
         $destaque = new destaque(); 

         $destaque->iddestaque = htmlentities(stripslashes($row['iddestaque']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $destaques->append($destaque);
      }

      $this->conex = null;

      //addLog('destaque','listarTodos',0);
      return $destaques;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT destaque.iddestaque as iddestaque, destaque.titulo as titulo, destaque.url as url, destaque.arquivo as arquivo, destaque.posicao as posicao FROM destaque where iddestaque = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $destaque = new destaque(); 

         $destaque->iddestaque = htmlentities(stripslashes($row['iddestaque']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('destaque','listarPorId',$id);
         return $destaque;
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
         $s .= "(destaque.iddestaque like $like or destaque.titulo like $like or destaque.url like $like or destaque.arquivo like $like or destaque.posicao like $like)";
      }

      $stmt = $this->conex->query("SELECT destaque.iddestaque as iddestaque, destaque.titulo as titulo, destaque.url as url, destaque.arquivo as arquivo, destaque.posicao as posicao FROM destaque where $s order by $order limit $limit"); 
 
      $destaques = new ArrayObject();

      foreach($stmt as $row){
         $destaque = new destaque(); 

         $destaque->iddestaque = htmlentities(stripslashes($row['iddestaque']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->titulo = $row['titulo'] != '' ? htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $destaque->url = $row['url'] != '' ? htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $destaque->posicao = $row['posicao'] != '' ? htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $destaques->append($destaque);
      }

      $this->conex = null;

      //addLog('destaque','listarTodos',0);
      return $destaques;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM destaque where iddestaque = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('destaque','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT destaque.iddestaque as iddestaque, destaque.titulo as titulo, destaque.url as url, destaque.arquivo as arquivo, destaque.posicao as posicao FROM destaque order by $field"); 
 
      $destaques = new ArrayObject();

      foreach($stmt as $row){
         $destaque = new destaque(); 

         $destaque->iddestaque = htmlentities(stripslashes($row['iddestaque']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $destaques->append($destaque);
      }

      $this->conex = null;

      //addLog('destaque','listarOrdenado',0);
      return $destaques;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT destaque.iddestaque as iddestaque, destaque.titulo as titulo, destaque.url as url, destaque.arquivo as arquivo, destaque.posicao as posicao FROM destaque where $param"); 
 
      $destaques = new ArrayObject();

      foreach($stmt as $row){
         $destaque = new destaque(); 

         $destaque->iddestaque = htmlentities(stripslashes($row['iddestaque']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $destaques->append($destaque);
      }

      $this->conex = null;

      //addLog('destaque','listarOnde',0);
      return $destaques;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT destaque.iddestaque as iddestaque, destaque.titulo as titulo, destaque.url as url, destaque.arquivo as arquivo, destaque.posicao as posicao FROM destaque where $param"); 
 
      foreach($stmt as $row){
         $destaque = new destaque(); 

         $destaque->iddestaque = htmlentities(stripslashes($row['iddestaque']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $destaque->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         return $destaque;
      }

      $this->conex = null;

      //addLog('destaque','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM destaque where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('destaque','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>