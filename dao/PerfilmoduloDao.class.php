<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class PerfilmoduloDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function PerfilmoduloDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($perfilmodulo){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO perfilmodulo(perfil_idperfil, modulo_idmodulo) VALUES (?, ?)");

      $stmt->bindValue(1, $perfilmodulo->Perfil->idperfil); 
      $stmt->bindValue(2, $perfilmodulo->Modulo->idmodulo); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('perfilmodulo','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($perfilmodulo){ 
     try{
      $stmt = $this->conex->prepare("Update perfilmodulo set perfil_idperfil = ?, modulo_idmodulo = ? where idperfilmodulo = ?");

      $stmt->bindValue(1, $perfilmodulo->Perfil->idperfil); 
      $stmt->bindValue(2, $perfilmodulo->Modulo->idmodulo); 
      $stmt->bindValue(3, $perfilmodulo->idperfilmodulo); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('perfilmodulo','atualizar', $perfilmodulo->idperfilmodulo);
        return $perfilmodulo->idperfilmodulo;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function listarTodos(){ 
     try{
      $stmt = $this->conex->query("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfilmodulo.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, perfilmodulo.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo"); 
 
      $perfilmodulos = new ArrayObject();

      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
         $perfilmodulo->Perfil->idperfil = $row['perfil_idperfil'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
         $perfilmodulo->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         $perfilmodulos->append($perfilmodulo);
      }

      $this->conex = null;

      //addLog('perfilmodulo','listarTodos',0);
      return $perfilmodulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfilmodulo.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, perfilmodulo.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo where idperfilmodulo = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
         $perfilmodulo->Perfil->idperfil = $row['perfil_idperfil'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
         $perfilmodulo->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         $this->conex = null;

         addLog('perfilmodulo','listarPorId',$id);
         return $perfilmodulo;
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
         $s .= "(perfilmodulo.idperfilmodulo like $like or perfil.nome like $like or modulo.nome like $like)";
      }

      $stmt = $this->conex->query("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfil.nome as perfil_nome, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo where $s order by $order limit $limit"); 
 
      $perfilmodulos = new ArrayObject();

      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         $perfilmodulos->append($perfilmodulo);
      }

      $this->conex = null;

      //addLog('perfilmodulo','listarTodos',0);
      return $perfilmodulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorPerfil($perfil_idperfil){ 
     try{
      $stmt = $this->conex->prepare("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfilmodulo.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, perfilmodulo.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo where perfil_idperfil = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $perfil_idperfil);
      $stmt->execute();

      $perfilmodulos = new ArrayObject();

      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
         $perfilmodulo->Perfil->idperfil = $row['perfil_idperfil'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
         $perfilmodulo->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         $perfilmodulos->append($perfilmodulo);
      }

         $this->conex = null;

      //addLog('perfilmodulo','listarPorPerfil',$perfil_idperfil);
      return $perfilmodulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorModulo($modulo_idmodulo){ 
     try{
      $stmt = $this->conex->prepare("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfilmodulo.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, perfilmodulo.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo where modulo_idmodulo = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $modulo_idmodulo);
      $stmt->execute();

      $perfilmodulos = new ArrayObject();

      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
         $perfilmodulo->Perfil->idperfil = $row['perfil_idperfil'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
         $perfilmodulo->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         $perfilmodulos->append($perfilmodulo);
      }

         $this->conex = null;

      //addLog('perfilmodulo','listarPorModulo',$modulo_idmodulo);
      return $perfilmodulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM perfilmodulo where idperfilmodulo = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('perfilmodulo','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorPerfil($perfil_idperfil){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM perfilmodulo where perfil_idperfil = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $perfil_idperfil);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('perfilmodulo','excluirPorPerfil',$perfil_idperfil);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorModulo($modulo_idmodulo){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM perfilmodulo where modulo_idmodulo = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $modulo_idmodulo);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('perfilmodulo','excluirPorModulo',$modulo_idmodulo);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfilmodulo.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, perfilmodulo.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo order by $field"); 
 
      $perfilmodulos = new ArrayObject();

      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
         $perfilmodulo->Perfil->idperfil = $row['perfil_idperfil'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
         $perfilmodulo->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         $perfilmodulos->append($perfilmodulo);
      }

      $this->conex = null;

      //addLog('perfilmodulo','listarOrdenado',0);
      return $perfilmodulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfilmodulo.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, perfilmodulo.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo where $param"); 
 
      $perfilmodulos = new ArrayObject();

      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
         $perfilmodulo->Perfil->idperfil = $row['perfil_idperfil'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
         $perfilmodulo->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         $perfilmodulos->append($perfilmodulo);
      }

      $this->conex = null;

      //addLog('perfilmodulo','listarOnde',0);
      return $perfilmodulos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT perfilmodulo.idperfilmodulo as idperfilmodulo, perfilmodulo.perfil_idperfil as perfil_idperfil, perfil.nome as perfil_nome, perfilmodulo.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome FROM perfilmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join modulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo where $param"); 
 
      foreach($stmt as $row){
         $perfilmodulo = new perfilmodulo(); 

         $perfilmodulo->idperfilmodulo = $row['idperfilmodulo'];
         $perfilmodulo->Perfil->idperfil = $row['perfil_idperfil'];
		 $perfilmodulo->Perfil->nome = $row['perfil_nome'];
         $perfilmodulo->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $perfilmodulo->Modulo->nome = $row['modulo_nome'];


         return $perfilmodulo;
      }

      $this->conex = null;

      //addLog('perfilmodulo','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM perfilmodulo where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('perfilmodulo','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>