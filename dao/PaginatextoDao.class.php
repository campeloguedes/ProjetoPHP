<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class PaginatextoDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function PaginatextoDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($paginatexto){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO paginatexto(titulo, texto, posicao) VALUES (?, ?, ?)");

      $stmt->bindValue(1, $paginatexto->titulo); 
      $stmt->bindValue(2, $paginatexto->texto); 
      $stmt->bindValue(3, $paginatexto->posicao); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('paginatexto','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($paginatexto){ 
     try{
      $stmt = $this->conex->prepare("Update paginatexto set titulo = ?, texto = ?, posicao = ? where idpaginatexto = ?");

      $stmt->bindValue(1, $paginatexto->titulo); 
      $stmt->bindValue(2, $paginatexto->texto); 
      $stmt->bindValue(3, $paginatexto->posicao); 
      $stmt->bindValue(4, $paginatexto->idpaginatexto); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('paginatexto','atualizar', $paginatexto->idpaginatexto);
        return $paginatexto->idpaginatexto;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function salvarPosicao($paginatexto){ 
     try{
      $stmt = $this->conex->prepare("Update paginatexto set posicao = ? where idpaginatexto = ?");

      $stmt->bindValue(1, $paginatexto->posicao); 
      $stmt->bindValue(2, $paginatexto->idpaginatexto); 
      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('paginatexto','salvarPosicao', $paginatexto->idpaginatexto);
        return $paginatexto->idpaginatexto;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update paginatexto set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT paginatexto.idpaginatexto as idpaginatexto, paginatexto.titulo as titulo, paginatexto.texto as texto, paginatexto.posicao as posicao FROM paginatexto order by posicao"); 
 
      $paginatextos = new ArrayObject();

      foreach($stmt as $row){
         $paginatexto = new paginatexto(); 

         $paginatexto->idpaginatexto = htmlentities(stripslashes($row['idpaginatexto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $paginatextos->append($paginatexto);
      }

      $this->conex = null;

      //addLog('paginatexto','listarTodos',0);
      return $paginatextos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT paginatexto.idpaginatexto as idpaginatexto, paginatexto.titulo as titulo, paginatexto.texto as texto, paginatexto.posicao as posicao FROM paginatexto where idpaginatexto = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $paginatexto = new paginatexto(); 

         $paginatexto->idpaginatexto = htmlentities(stripslashes($row['idpaginatexto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('paginatexto','listarPorId',$id);
         return $paginatexto;
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
         $s .= "(paginatexto.idpaginatexto like $like or paginatexto.titulo like $like or paginatexto.posicao like $like)";
      }

      $stmt = $this->conex->query("SELECT paginatexto.idpaginatexto as idpaginatexto, paginatexto.titulo as titulo, paginatexto.posicao as posicao FROM paginatexto where $s order by $order limit $limit"); 
 
      $paginatextos = new ArrayObject();

      foreach($stmt as $row){
         $paginatexto = new paginatexto(); 

         $paginatexto->idpaginatexto = htmlentities(stripslashes($row['idpaginatexto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->titulo = $row['titulo'] != '' ? htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $paginatexto->posicao = $row['posicao'] != '' ? htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $paginatextos->append($paginatexto);
      }

      $this->conex = null;

      //addLog('paginatexto','listarTodos',0);
      return $paginatextos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM paginatexto where idpaginatexto = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('paginatexto','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT paginatexto.idpaginatexto as idpaginatexto, paginatexto.titulo as titulo, paginatexto.texto as texto, paginatexto.posicao as posicao FROM paginatexto order by $field"); 
 
      $paginatextos = new ArrayObject();

      foreach($stmt as $row){
         $paginatexto = new paginatexto(); 

         $paginatexto->idpaginatexto = htmlentities(stripslashes($row['idpaginatexto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $paginatextos->append($paginatexto);
      }

      $this->conex = null;

      //addLog('paginatexto','listarOrdenado',0);
      return $paginatextos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT paginatexto.idpaginatexto as idpaginatexto, paginatexto.titulo as titulo, paginatexto.texto as texto, paginatexto.posicao as posicao FROM paginatexto where $param"); 
 
      $paginatextos = new ArrayObject();

      foreach($stmt as $row){
         $paginatexto = new paginatexto(); 

         $paginatexto->idpaginatexto = htmlentities(stripslashes($row['idpaginatexto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $paginatextos->append($paginatexto);
      }

      $this->conex = null;

      //addLog('paginatexto','listarOnde',0);
      return $paginatextos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT paginatexto.idpaginatexto as idpaginatexto, paginatexto.titulo as titulo, paginatexto.texto as texto, paginatexto.posicao as posicao FROM paginatexto where $param"); 
 
      foreach($stmt as $row){
         $paginatexto = new paginatexto(); 

         $paginatexto->idpaginatexto = htmlentities(stripslashes($row['idpaginatexto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');
         $paginatexto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         return $paginatexto;
      }

      $this->conex = null;

      //addLog('paginatexto','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM paginatexto where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('paginatexto','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>