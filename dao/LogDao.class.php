<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class LogDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function LogDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($log){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO log(dt, tabela, chave, acao, ip, tipo, admin_idadmin) VALUES (?, ?, ?, ?, ?, ?, ?)");

      $stmt->bindValue(1, $log->dt); 
      $stmt->bindValue(2, $log->tabela); 
      $stmt->bindValue(3, $log->chave); 
      $stmt->bindValue(4, $log->acao); 
      $stmt->bindValue(5, $log->ip); 
      $stmt->bindValue(6, $log->tipo); 
      $stmt->bindValue(7, $log->Admin->idadmin); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        // addLog('log','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($log){ 
     try{
      $stmt = $this->conex->prepare("Update log set dt = ?, tabela = ?, chave = ?, acao = ?, ip = ?, tipo = ?, admin_idadmin = ? where idlog = ?");

      $stmt->bindValue(1, $log->dt); 
      $stmt->bindValue(2, $log->tabela); 
      $stmt->bindValue(3, $log->chave); 
      $stmt->bindValue(4, $log->acao); 
      $stmt->bindValue(5, $log->ip); 
      $stmt->bindValue(6, $log->tipo); 
      $stmt->bindValue(7, $log->Admin->idadmin); 
      $stmt->bindValue(8, $log->idlog); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('log','atualizar', $log->idlog);
        return $log->idlog;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function listarTodos(){ 
     try{
      $stmt = $this->conex->query("SELECT log.idlog as idlog, log.dt as dt, log.tabela as tabela, log.chave as chave, log.acao as acao, log.ip as ip, log.tipo as tipo, log.admin_idadmin as admin_idadmin FROM log"); 
 
      $logs = new ArrayObject();

      foreach($stmt as $row){
         $log = new log(); 

         $log->idlog = $row['idlog'];
         $log->dt = $row['dt'];
         $log->tabela = $row['tabela'];
         $log->chave = $row['chave'];
         $log->acao = $row['acao'];
         $log->ip = $row['ip'];
         $log->tipo = $row['tipo'];
         $log->Admin->idadmin = $row['admin_idadmin'];


         $logs->append($log);
      }

      $this->conex = null;

      //addLog('log','listarTodos',0);
      return $logs;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT log.idlog as idlog, log.dt as dt, log.tabela as tabela, log.chave as chave, log.acao as acao, log.ip as ip, log.tipo as tipo, log.admin_idadmin as admin_idadmin FROM log where idlog = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $log = new log(); 

         $log->idlog = $row['idlog'];
         $log->dt = $row['dt'];
         $log->tabela = $row['tabela'];
         $log->chave = $row['chave'];
         $log->acao = $row['acao'];
         $log->ip = $row['ip'];
         $log->tipo = $row['tipo'];
         $log->Admin->idadmin = $row['admin_idadmin'];


         $this->conex = null;

         addLog('log','listarPorId',$id);
         return $log;
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
         $s .= "(log.idlog like $like or log.dt like $like or log.tabela like $like or log.chave like $like or log.acao like $like or log.ip like $like or log.tipo like $like)";
      }

      $stmt = $this->conex->query("SELECT log.idlog as idlog, log.dt as dt, log.tabela as tabela, log.chave as chave, log.acao as acao, log.ip as ip, log.tipo as tipo FROM log where $s order by $order limit $limit"); 
 
      $logs = new ArrayObject();

      foreach($stmt as $row){
         $log = new log(); 

         $log->idlog = $row['idlog'];
         $log->dt = dthr($row['dt']);
         $log->tabela = $row['tabela'] != '' ? $row['tabela'] : '____';
         $log->chave = $row['chave'] != '' ? $row['chave'] : '____';
         $log->acao = $row['acao'] != '' ? $row['acao'] : '____';
         $log->ip = $row['ip'] != '' ? $row['ip'] : '____';
         $log->tipo = $row['tipo'] != '' ? $row['tipo'] : '____';


         $logs->append($log);
      }

      $this->conex = null;

      //addLog('log','listarTodos',0);
      return $logs;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorAdmin($admin_idadmin){ 
     try{
      $stmt = $this->conex->prepare("SELECT log.idlog as idlog, log.dt as dt, log.tabela as tabela, log.chave as chave, log.acao as acao, log.ip as ip, log.tipo as tipo, log.admin_idadmin as admin_idadmin FROM log where admin_idadmin = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $admin_idadmin);
      $stmt->execute();

      $logs = new ArrayObject();

      foreach($stmt as $row){
         $log = new log(); 

         $log->idlog = $row['idlog'];
         $log->dt = $row['dt'];
         $log->tabela = $row['tabela'];
         $log->chave = $row['chave'];
         $log->acao = $row['acao'];
         $log->ip = $row['ip'];
         $log->tipo = $row['tipo'];
         $log->Admin->idadmin = $row['admin_idadmin'];


         $logs->append($log);
      }

         $this->conex = null;

      //addLog('log','listarPorAdmin',$admin_idadmin);
      return $logs;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM log where idlog = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('log','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorAdmin($admin_idadmin){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM log where admin_idadmin = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $admin_idadmin);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('log','excluirPorAdmin',$admin_idadmin);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT log.idlog as idlog, log.dt as dt, log.tabela as tabela, log.chave as chave, log.acao as acao, log.ip as ip, log.tipo as tipo, log.admin_idadmin as admin_idadmin FROM log order by $field"); 
 
      $logs = new ArrayObject();

      foreach($stmt as $row){
         $log = new log(); 

         $log->idlog = $row['idlog'];
         $log->dt = $row['dt'];
         $log->tabela = $row['tabela'];
         $log->chave = $row['chave'];
         $log->acao = $row['acao'];
         $log->ip = $row['ip'];
         $log->tipo = $row['tipo'];
         $log->Admin->idadmin = $row['admin_idadmin'];


         $logs->append($log);
      }

      $this->conex = null;

      //addLog('log','listarOrdenado',0);
      return $logs;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT log.idlog as idlog, log.dt as dt, log.tabela as tabela, log.chave as chave, log.acao as acao, log.ip as ip, log.tipo as tipo, log.admin_idadmin as admin_idadmin FROM log where $param"); 
 
      $logs = new ArrayObject();

      foreach($stmt as $row){
         $log = new log(); 

         $log->idlog = $row['idlog'];
         $log->dt = $row['dt'];
         $log->tabela = $row['tabela'];
         $log->chave = $row['chave'];
         $log->acao = $row['acao'];
         $log->ip = $row['ip'];
         $log->tipo = $row['tipo'];
         $log->Admin->idadmin = $row['admin_idadmin'];


         $logs->append($log);
      }

      $this->conex = null;

      //addLog('log','listarOnde',0);
      return $logs;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT log.idlog as idlog, log.dt as dt, log.tabela as tabela, log.chave as chave, log.acao as acao, log.ip as ip, log.tipo as tipo, log.admin_idadmin as admin_idadmin FROM log where $param"); 
 
      foreach($stmt as $row){
         $log = new log(); 

         $log->idlog = $row['idlog'];
         $log->dt = $row['dt'];
         $log->tabela = $row['tabela'];
         $log->chave = $row['chave'];
         $log->acao = $row['acao'];
         $log->ip = $row['ip'];
         $log->tipo = $row['tipo'];
         $log->Admin->idadmin = $row['admin_idadmin'];


         return $log;
      }

      $this->conex = null;

      //addLog('log','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM log where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('log','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>