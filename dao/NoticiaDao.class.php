<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class NoticiaDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function NoticiaDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($noticia){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO noticia(titulo, dt, texto) VALUES (?, ?, ?)");

      $stmt->bindValue(1, $noticia->titulo); 
      $stmt->bindValue(2, $noticia->dt); 
      $stmt->bindValue(3, $noticia->texto); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('noticia','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($noticia){ 
     try{
      $stmt = $this->conex->prepare("Update noticia set titulo = ?, dt = ?, texto = ? where idnoticia = ?");

      $stmt->bindValue(1, $noticia->titulo); 
      $stmt->bindValue(2, $noticia->dt); 
      $stmt->bindValue(3, $noticia->texto); 
      $stmt->bindValue(4, $noticia->idnoticia); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('noticia','atualizar', $noticia->idnoticia);
        return $noticia->idnoticia;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update noticia set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT noticia.idnoticia as idnoticia, noticia.titulo as titulo, noticia.dt as dt, noticia.texto as texto FROM noticia"); 
 
      $noticias = new ArrayObject();

      foreach($stmt as $row){
         $noticia = new noticia(); 

         $noticia->idnoticia = htmlentities(stripslashes($row['idnoticia']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');


         $noticias->append($noticia);
      }

      $this->conex = null;

      //addLog('noticia','listarTodos',0);
      return $noticias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT noticia.idnoticia as idnoticia, noticia.titulo as titulo, noticia.dt as dt, noticia.texto as texto FROM noticia where idnoticia = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $noticia = new noticia(); 

         $noticia->idnoticia = htmlentities(stripslashes($row['idnoticia']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('noticia','listarPorId',$id);
         return $noticia;
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
         $s .= "(noticia.idnoticia like $like or noticia.titulo like $like or noticia.dt like $like)";
      }

      $stmt = $this->conex->query("SELECT noticia.idnoticia as idnoticia, noticia.titulo as titulo, noticia.dt as dt FROM noticia where $s order by $order limit $limit"); 
 
      $noticias = new ArrayObject();

      foreach($stmt as $row){
         $noticia = new noticia(); 

         $noticia->idnoticia = htmlentities(stripslashes($row['idnoticia']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->titulo = $row['titulo'] != '' ? htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $noticia->dt = dt($row['dt']);


         $noticias->append($noticia);
      }

      $this->conex = null;

      //addLog('noticia','listarTodos',0);
      return $noticias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM noticia where idnoticia = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('noticia','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT noticia.idnoticia as idnoticia, noticia.titulo as titulo, noticia.dt as dt, noticia.texto as texto FROM noticia order by $field"); 
 
      $noticias = new ArrayObject();

      foreach($stmt as $row){
         $noticia = new noticia(); 

         $noticia->idnoticia = htmlentities(stripslashes($row['idnoticia']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');


         $noticias->append($noticia);
      }

      $this->conex = null;

      //addLog('noticia','listarOrdenado',0);
      return $noticias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT noticia.idnoticia as idnoticia, noticia.titulo as titulo, noticia.dt as dt, noticia.texto as texto FROM noticia where $param"); 
 
      $noticias = new ArrayObject();

      foreach($stmt as $row){
         $noticia = new noticia(); 

         $noticia->idnoticia = htmlentities(stripslashes($row['idnoticia']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');


         $noticias->append($noticia);
      }

      $this->conex = null;

      //addLog('noticia','listarOnde',0);
      return $noticias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT noticia.idnoticia as idnoticia, noticia.titulo as titulo, noticia.dt as dt, noticia.texto as texto FROM noticia where $param"); 
 
      foreach($stmt as $row){
         $noticia = new noticia(); 

         $noticia->idnoticia = htmlentities(stripslashes($row['idnoticia']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $noticia->texto = htmlentities(stripslashes($row['texto']),ENT_COMPAT, 'ISO-8859-1');


         return $noticia;
      }

      $this->conex = null;

      //addLog('noticia','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM noticia where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('noticia','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>