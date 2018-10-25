<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class ParceiroDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function ParceiroDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($parceiro){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO parceiro(nome, url, logotipo) VALUES (?, ?, ?)");

      $stmt->bindValue(1, $parceiro->nome); 
      $stmt->bindValue(2, $parceiro->url); 
      $stmt->bindValue(3, $parceiro->logotipo); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('parceiro','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($parceiro){ 
     try{
      $stmt = $this->conex->prepare("Update parceiro set nome = ?, url = ?, logotipo = ? where idparceiro = ?");

      $stmt->bindValue(1, $parceiro->nome); 
      $stmt->bindValue(2, $parceiro->url); 
      $stmt->bindValue(3, $parceiro->logotipo); 
      $stmt->bindValue(4, $parceiro->idparceiro); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('parceiro','atualizar', $parceiro->idparceiro);
        return $parceiro->idparceiro;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update parceiro set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT parceiro.idparceiro as idparceiro, parceiro.nome as nome, parceiro.url as url, parceiro.logotipo as logotipo FROM parceiro"); 
 
      $parceiros = new ArrayObject();

      foreach($stmt as $row){
         $parceiro = new parceiro(); 

         $parceiro->idparceiro = htmlentities(stripslashes($row['idparceiro']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');


         $parceiros->append($parceiro);
      }

      $this->conex = null;

      //addLog('parceiro','listarTodos',0);
      return $parceiros;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT parceiro.idparceiro as idparceiro, parceiro.nome as nome, parceiro.url as url, parceiro.logotipo as logotipo FROM parceiro where idparceiro = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $parceiro = new parceiro(); 

         $parceiro->idparceiro = htmlentities(stripslashes($row['idparceiro']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('parceiro','listarPorId',$id);
         return $parceiro;
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
         $s .= "(parceiro.idparceiro like $like or parceiro.nome like $like or parceiro.url like $like or parceiro.logotipo like $like)";
      }

      $stmt = $this->conex->query("SELECT parceiro.idparceiro as idparceiro, parceiro.nome as nome, parceiro.url as url, parceiro.logotipo as logotipo FROM parceiro where $s order by $order limit $limit"); 
 
      $parceiros = new ArrayObject();

      foreach($stmt as $row){
         $parceiro = new parceiro(); 

         $parceiro->idparceiro = htmlentities(stripslashes($row['idparceiro']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->nome = $row['nome'] != '' ? htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $parceiro->url = $row['url'] != '' ? htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $parceiros->append($parceiro);
      }

      $this->conex = null;

      //addLog('parceiro','listarTodos',0);
      return $parceiros;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM parceiro where idparceiro = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('parceiro','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT parceiro.idparceiro as idparceiro, parceiro.nome as nome, parceiro.url as url, parceiro.logotipo as logotipo FROM parceiro order by $field"); 
 
      $parceiros = new ArrayObject();

      foreach($stmt as $row){
         $parceiro = new parceiro(); 

         $parceiro->idparceiro = htmlentities(stripslashes($row['idparceiro']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');


         $parceiros->append($parceiro);
      }

      $this->conex = null;

      //addLog('parceiro','listarOrdenado',0);
      return $parceiros;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT parceiro.idparceiro as idparceiro, parceiro.nome as nome, parceiro.url as url, parceiro.logotipo as logotipo FROM parceiro where $param"); 
 
      $parceiros = new ArrayObject();

      foreach($stmt as $row){
         $parceiro = new parceiro(); 

         $parceiro->idparceiro = htmlentities(stripslashes($row['idparceiro']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');


         $parceiros->append($parceiro);
      }

      $this->conex = null;

      //addLog('parceiro','listarOnde',0);
      return $parceiros;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT parceiro.idparceiro as idparceiro, parceiro.nome as nome, parceiro.url as url, parceiro.logotipo as logotipo FROM parceiro where $param"); 
 
      foreach($stmt as $row){
         $parceiro = new parceiro(); 

         $parceiro->idparceiro = htmlentities(stripslashes($row['idparceiro']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->url = htmlentities(stripslashes($row['url']),ENT_COMPAT, 'ISO-8859-1');
         $parceiro->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');


         return $parceiro;
      }

      $this->conex = null;

      //addLog('parceiro','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM parceiro where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('parceiro','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>