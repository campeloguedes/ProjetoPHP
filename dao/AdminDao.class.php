<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class AdminDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function AdminDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($admin){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO admin(perfil_idperfil, nome, usuario, senha, foto, bloqueado) VALUES (?, ?, ?, ?, ?, ?)");

      $stmt->bindValue(1, $admin->Perfil->idperfil); 
      $stmt->bindValue(2, $admin->nome); 
      $stmt->bindValue(3, $admin->usuario); 
      $stmt->bindValue(4, $admin->senha); 
      $stmt->bindValue(5, $admin->foto); 
      $stmt->bindValue(6, $admin->bloqueado); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('admin','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($admin){ 
     try{
      $stmt = $this->conex->prepare("Update admin set perfil_idperfil = ?, nome = ?, usuario = ?, senha = ?, foto = ?, bloqueado = ? where idadmin = ?");

      $stmt->bindValue(1, $admin->Perfil->idperfil); 
      $stmt->bindValue(2, $admin->nome); 
      $stmt->bindValue(3, $admin->usuario); 
      $stmt->bindValue(4, $admin->senha); 
      $stmt->bindValue(5, $admin->foto); 
      $stmt->bindValue(6, $admin->bloqueado); 
      $stmt->bindValue(7, $admin->idadmin); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('admin','atualizar', $admin->idadmin);
        return $admin->idadmin;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function listarTodos(){ 
     try{
      $stmt = $this->conex->query("SELECT admin.idadmin as idadmin, admin.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, admin.nome as nome, admin.usuario as usuario, admin.senha as senha, admin.foto as foto, admin.bloqueado as bloqueado FROM admin inner join perfil on admin.perfil_idperfil = perfil.idperfil"); 
 
      $admins = new ArrayObject();

      foreach($stmt as $row){
         $admin = new admin(); 

         $admin->idadmin = $row['idadmin'];
         $admin->Perfil->idperfil = $row['perfil_idperfil'];
		 $admin->Perfil->nome = $row['perfil_nome'];
         $admin->nome = $row['nome'];
         $admin->usuario = $row['usuario'];
         $admin->senha = $row['senha'];
         $admin->foto = $row['foto'];
         $admin->bloqueado = $row['bloqueado'];


         $admins->append($admin);
      }

      $this->conex = null;

      //addLog('admin','listarTodos',0);
      return $admins;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT admin.idadmin as idadmin, admin.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, admin.nome as nome, admin.usuario as usuario, admin.senha as senha, admin.foto as foto, admin.bloqueado as bloqueado FROM admin inner join perfil on admin.perfil_idperfil = perfil.idperfil where idadmin = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $admin = new admin(); 

         $admin->idadmin = $row['idadmin'];
         $admin->Perfil->idperfil = $row['perfil_idperfil'];
		 $admin->Perfil->nome = $row['perfil_nome'];
         $admin->nome = $row['nome'];
         $admin->usuario = $row['usuario'];
         $admin->senha = $row['senha'];
         $admin->foto = $row['foto'];
         $admin->bloqueado = $row['bloqueado'];


         $this->conex = null;

         addLog('admin','listarPorId',$id);
         return $admin;
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
         $s .= "(admin.idadmin like $like or perfil.nome like $like or admin.nome like $like or admin.usuario like $like or admin.senha like $like)";
      }

      $stmt = $this->conex->query("SELECT admin.idadmin as idadmin, perfil.nome as perfil_nome, admin.nome as nome, admin.usuario as usuario, admin.senha as senha FROM admin inner join perfil on admin.perfil_idperfil = perfil.idperfil where $s order by $order limit $limit"); 
 
      $admins = new ArrayObject();

      foreach($stmt as $row){
         $admin = new admin(); 

         $admin->idadmin = $row['idadmin'];
		 $admin->Perfil->nome = $row['perfil_nome'];
         $admin->nome = $row['nome'] != '' ? $row['nome'] : '____';
         $admin->usuario = $row['usuario'] != '' ? $row['usuario'] : '____';


         $admins->append($admin);
      }

      $this->conex = null;

      //addLog('admin','listarTodos',0);
      return $admins;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorPerfil($perfil_idperfil){ 
     try{
      $stmt = $this->conex->prepare("SELECT admin.idadmin as idadmin, admin.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, admin.nome as nome, admin.usuario as usuario, admin.senha as senha, admin.foto as foto, admin.bloqueado as bloqueado FROM admin inner join perfil on admin.perfil_idperfil = perfil.idperfil where perfil_idperfil = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $perfil_idperfil);
      $stmt->execute();

      $admins = new ArrayObject();

      foreach($stmt as $row){
         $admin = new admin(); 

         $admin->idadmin = $row['idadmin'];
         $admin->Perfil->idperfil = $row['perfil_idperfil'];
		 $admin->Perfil->nome = $row['perfil_nome'];
         $admin->nome = $row['nome'];
         $admin->usuario = $row['usuario'];
         $admin->senha = $row['senha'];
         $admin->foto = $row['foto'];
         $admin->bloqueado = $row['bloqueado'];


         $admins->append($admin);
      }

         $this->conex = null;

      //addLog('admin','listarPorPerfil',$perfil_idperfil);
      return $admins;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM admin where idadmin = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('admin','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorPerfil($perfil_idperfil){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM admin where perfil_idperfil = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $perfil_idperfil);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('admin','excluirPorPerfil',$perfil_idperfil);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT admin.idadmin as idadmin, admin.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, admin.nome as nome, admin.usuario as usuario, admin.senha as senha, admin.foto as foto, admin.bloqueado as bloqueado FROM admin inner join perfil on admin.perfil_idperfil = perfil.idperfil order by $field"); 
 
      $admins = new ArrayObject();

      foreach($stmt as $row){
         $admin = new admin(); 

         $admin->idadmin = $row['idadmin'];
         $admin->Perfil->idperfil = $row['perfil_idperfil'];
		 $admin->Perfil->nome = $row['perfil_nome'];
         $admin->nome = $row['nome'];
         $admin->usuario = $row['usuario'];
         $admin->senha = $row['senha'];
         $admin->foto = $row['foto'];
         $admin->bloqueado = $row['bloqueado'];


         $admins->append($admin);
      }

      $this->conex = null;

      //addLog('admin','listarOrdenado',0);
      return $admins;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT admin.idadmin as idadmin, admin.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, admin.nome as nome, admin.usuario as usuario, admin.senha as senha, admin.foto as foto, admin.bloqueado as bloqueado FROM admin inner join perfil on admin.perfil_idperfil = perfil.idperfil where $param"); 
 
      $admins = new ArrayObject();

      foreach($stmt as $row){
         $admin = new admin(); 

         $admin->idadmin = $row['idadmin'];
         $admin->Perfil->idperfil = $row['perfil_idperfil'];
		 $admin->Perfil->nome = $row['perfil_nome'];
         $admin->nome = $row['nome'];
         $admin->usuario = $row['usuario'];
         $admin->senha = $row['senha'];
         $admin->foto = $row['foto'];
         $admin->bloqueado = $row['bloqueado'];


         $admins->append($admin);
      }

      $this->conex = null;

      //addLog('admin','listarOnde',0);
      return $admins;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT admin.idadmin as idadmin, admin.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, admin.nome as nome, admin.usuario as usuario, admin.senha as senha, admin.foto as foto, admin.bloqueado as bloqueado FROM admin inner join perfil on admin.perfil_idperfil = perfil.idperfil where $param"); 
 
      foreach($stmt as $row){
         $admin = new admin(); 

         $admin->idadmin = $row['idadmin'];
         $admin->Perfil->idperfil = $row['perfil_idperfil'];
		 $admin->Perfil->nome = $row['perfil_nome'];
         $admin->nome = $row['nome'];
         $admin->usuario = $row['usuario'];
         $admin->senha = $row['senha'];
         $admin->foto = $row['foto'];
         $admin->bloqueado = $row['bloqueado'];


         return $admin;
      }

      $this->conex = null;

      //addLog('admin','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM admin where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('admin','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>