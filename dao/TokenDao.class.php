<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class TokenDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function TokenDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($token){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO token(admin_idadmin, dt, codigo, ip) VALUES (?, ?, ?, ?)");

      $stmt->bindValue(1, $token->Admin->idadmin == '' ? null : $token->Admin->idadmin); 
      $stmt->bindValue(2, $token->dt); 
      $stmt->bindValue(3, $token->codigo); 
      $stmt->bindValue(4, $token->ip); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('token','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($token){ 
     try{
      $stmt = $this->conex->prepare("Update token set admin_idadmin = ?, dt = ?, codigo = ?, ip = ? where idtoken = ?");

      $stmt->bindValue(1, $token->Admin->idadmin == '' ? null : $token->Admin->idadmin); 
      $stmt->bindValue(2, $token->dt); 
      $stmt->bindValue(3, $token->codigo); 
      $stmt->bindValue(4, $token->ip); 
      $stmt->bindValue(5, $token->idtoken); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('token','atualizar', $token->idtoken);
        return $token->idtoken;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update token set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT token.idtoken as idtoken, token.admin_idadmin as admin_idadmin, token.dt as dt, token.codigo as codigo, token.ip as ip FROM token"); 
 
      $tokens = new ArrayObject();

      foreach($stmt as $row){
         $token = new token(); 

         $token->idtoken = htmlentities(stripslashes($row['idtoken']),ENT_COMPAT, 'ISO-8859-1');
         $token->Admin->idadmin = htmlentities(stripslashes($row['admin_idadmin']),ENT_COMPAT, 'ISO-8859-1');
         $token->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $token->codigo = htmlentities(stripslashes($row['codigo']),ENT_COMPAT, 'ISO-8859-1');
         $token->ip = htmlentities(stripslashes($row['ip']),ENT_COMPAT, 'ISO-8859-1');


         $tokens->append($token);
      }

      $this->conex = null;

      //addLog('token','listarTodos',0);
      return $tokens;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT token.idtoken as idtoken, token.admin_idadmin as admin_idadmin, token.dt as dt, token.codigo as codigo, token.ip as ip FROM token where idtoken = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $token = new token(); 

         $token->idtoken = htmlentities(stripslashes($row['idtoken']),ENT_COMPAT, 'ISO-8859-1');
         $token->Admin->idadmin = htmlentities(stripslashes($row['admin_idadmin']),ENT_COMPAT, 'ISO-8859-1');
         $token->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $token->codigo = htmlentities(stripslashes($row['codigo']),ENT_COMPAT, 'ISO-8859-1');
         $token->ip = htmlentities(stripslashes($row['ip']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('token','listarPorId',$id);
         return $token;
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
         $s .= "(token.idtoken like $like)";
      }

      $stmt = $this->conex->query("SELECT token.idtoken as idtoken FROM token where $s order by $order limit $limit"); 
 
      $tokens = new ArrayObject();

      foreach($stmt as $row){
         $token = new token(); 

         $token->idtoken = htmlentities(stripslashes($row['idtoken']),ENT_COMPAT, 'ISO-8859-1');


         $tokens->append($token);
      }

      $this->conex = null;

      //addLog('token','listarTodos',0);
      return $tokens;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorAdmin($admin_idadmin){ 
     try{
      $stmt = $this->conex->prepare("SELECT token.idtoken as idtoken, token.admin_idadmin as admin_idadmin, token.dt as dt, token.codigo as codigo, token.ip as ip FROM token where admin_idadmin = ? order by token."); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $admin_idadmin);
      $stmt->execute();

      $tokens = new ArrayObject();

      foreach($stmt as $row){
         $token = new token(); 

         $token->idtoken = htmlentities(stripslashes($row['idtoken']),ENT_COMPAT, 'ISO-8859-1');
         $token->Admin->idadmin = htmlentities(stripslashes($row['admin_idadmin']),ENT_COMPAT, 'ISO-8859-1');
         $token->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $token->codigo = htmlentities(stripslashes($row['codigo']),ENT_COMPAT, 'ISO-8859-1');
         $token->ip = htmlentities(stripslashes($row['ip']),ENT_COMPAT, 'ISO-8859-1');


         $tokens->append($token);
      }

         $this->conex = null;

      //addLog('token','listarPorAdmin',$admin_idadmin);
      return $tokens;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM token where idtoken = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('token','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorAdmin($admin_idadmin){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM token where admin_idadmin = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $admin_idadmin);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('token','excluirPorAdmin',$admin_idadmin);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT token.idtoken as idtoken, token.admin_idadmin as admin_idadmin, token.dt as dt, token.codigo as codigo, token.ip as ip FROM token order by $field"); 
 
      $tokens = new ArrayObject();

      foreach($stmt as $row){
         $token = new token(); 

         $token->idtoken = htmlentities(stripslashes($row['idtoken']),ENT_COMPAT, 'ISO-8859-1');
         $token->Admin->idadmin = htmlentities(stripslashes($row['admin_idadmin']),ENT_COMPAT, 'ISO-8859-1');
         $token->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $token->codigo = htmlentities(stripslashes($row['codigo']),ENT_COMPAT, 'ISO-8859-1');
         $token->ip = htmlentities(stripslashes($row['ip']),ENT_COMPAT, 'ISO-8859-1');


         $tokens->append($token);
      }

      $this->conex = null;

      //addLog('token','listarOrdenado',0);
      return $tokens;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT token.idtoken as idtoken, token.admin_idadmin as admin_idadmin, token.dt as dt, token.codigo as codigo, token.ip as ip FROM token where $param"); 
 
      $tokens = new ArrayObject();

      foreach($stmt as $row){
         $token = new token(); 

         $token->idtoken = htmlentities(stripslashes($row['idtoken']),ENT_COMPAT, 'ISO-8859-1');
         $token->Admin->idadmin = htmlentities(stripslashes($row['admin_idadmin']),ENT_COMPAT, 'ISO-8859-1');
         $token->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $token->codigo = htmlentities(stripslashes($row['codigo']),ENT_COMPAT, 'ISO-8859-1');
         $token->ip = htmlentities(stripslashes($row['ip']),ENT_COMPAT, 'ISO-8859-1');


         $tokens->append($token);
      }

      $this->conex = null;

      //addLog('token','listarOnde',0);
      return $tokens;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT token.idtoken as idtoken, token.admin_idadmin as admin_idadmin, token.dt as dt, token.codigo as codigo, token.ip as ip FROM token where $param"); 
 
      foreach($stmt as $row){
         $token = new token(); 

         $token->idtoken = htmlentities(stripslashes($row['idtoken']),ENT_COMPAT, 'ISO-8859-1');
         $token->Admin->idadmin = htmlentities(stripslashes($row['admin_idadmin']),ENT_COMPAT, 'ISO-8859-1');
         $token->dt = htmlentities(stripslashes($row['dt']),ENT_COMPAT, 'ISO-8859-1');
         $token->codigo = htmlentities(stripslashes($row['codigo']),ENT_COMPAT, 'ISO-8859-1');
         $token->ip = htmlentities(stripslashes($row['ip']),ENT_COMPAT, 'ISO-8859-1');


         return $token;
      }

      $this->conex = null;

      //addLog('token','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM token where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('token','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>