<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class PaginaDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function PaginaDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($pagina){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO pagina(modulo_idmodulo, nome, descricao, posicao) VALUES (?, ?, ?, ?)");

      $stmt->bindValue(1, $pagina->Modulo->idmodulo); 
      $stmt->bindValue(2, $pagina->nome); 
      $stmt->bindValue(3, $pagina->descricao); 
      $stmt->bindValue(4, $pagina->posicao); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('pagina','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($pagina){ 
     try{
      $stmt = $this->conex->prepare("Update pagina set modulo_idmodulo = ?, nome = ?, descricao = ?, posicao = ? where idpagina = ?");

      $stmt->bindValue(1, $pagina->Modulo->idmodulo); 
      $stmt->bindValue(2, $pagina->nome); 
      $stmt->bindValue(3, $pagina->descricao); 
      $stmt->bindValue(4, $pagina->posicao); 
      $stmt->bindValue(5, $pagina->idpagina); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('pagina','atualizar', $pagina->idpagina);
        return $pagina->idpagina;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function listarTodos(){ 
     try{
      $stmt = $this->conex->query("SELECT pagina.idpagina as idpagina, pagina.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome, pagina.nome as nome, pagina.descricao as descricao, pagina.posicao as posicao FROM pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo order by posicao"); 
 
      $paginas = new ArrayObject();

      foreach($stmt as $row){
         $pagina = new pagina(); 

         $pagina->idpagina = $row['idpagina'];
         $pagina->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $pagina->Modulo->nome = $row['modulo_nome'];
         $pagina->nome = $row['nome'];
         $pagina->descricao = $row['descricao'];
         $pagina->posicao = $row['posicao'];


         $paginas->append($pagina);
      }

      $this->conex = null;

      //addLog('pagina','listarTodos',0);
      return $paginas;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT pagina.idpagina as idpagina, pagina.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome, pagina.nome as nome, pagina.descricao as descricao, pagina.posicao as posicao FROM pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo where idpagina = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $pagina = new pagina(); 

         $pagina->idpagina = $row['idpagina'];
         $pagina->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $pagina->Modulo->nome = $row['modulo_nome'];
         $pagina->nome = $row['nome'];
         $pagina->descricao = $row['descricao'];
         $pagina->posicao = $row['posicao'];


         $this->conex = null;

         addLog('pagina','listarPorId',$id);
         return $pagina;
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
         $s .= "(pagina.idpagina like $like or modulo.nome like $like or pagina.nome like $like or pagina.descricao like $like or pagina.posicao like $like)";
      }

      $stmt = $this->conex->query("SELECT pagina.idpagina as idpagina, modulo.nome as modulo_nome, pagina.nome as nome, pagina.descricao as descricao, pagina.posicao as posicao FROM pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo where $s order by $order limit $limit"); 
 
      $paginas = new ArrayObject();

      foreach($stmt as $row){
         $pagina = new pagina(); 

         $pagina->idpagina = $row['idpagina'];
		 $pagina->Modulo->nome = $row['modulo_nome'];
         $pagina->nome = $row['nome'] != '' ? $row['nome'] : '____';
         $pagina->descricao = $row['descricao'] != '' ? $row['descricao'] : '____';
         $pagina->posicao = $row['posicao'] != '' ? $row['posicao'] : '____';


         $paginas->append($pagina);
      }

      $this->conex = null;

      //addLog('pagina','listarTodos',0);
      return $paginas;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorModulo($modulo_idmodulo){ 
     try{
      $stmt = $this->conex->prepare("SELECT pagina.idpagina as idpagina, pagina.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome, pagina.nome as nome, pagina.descricao as descricao, pagina.posicao as posicao FROM pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo where modulo_idmodulo = ? order by posicao"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $modulo_idmodulo);
      $stmt->execute();

      $paginas = new ArrayObject();

      foreach($stmt as $row){
         $pagina = new pagina(); 

         $pagina->idpagina = $row['idpagina'];
         $pagina->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $pagina->Modulo->nome = $row['modulo_nome'];
         $pagina->nome = $row['nome'];
         $pagina->descricao = $row['descricao'];
         $pagina->posicao = $row['posicao'];


         $paginas->append($pagina);
      }

         $this->conex = null;

      //addLog('pagina','listarPorModulo',$modulo_idmodulo);
      return $paginas;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM pagina where idpagina = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('pagina','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorModulo($modulo_idmodulo){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM pagina where modulo_idmodulo = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $modulo_idmodulo);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('pagina','excluirPorModulo',$modulo_idmodulo);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT pagina.idpagina as idpagina, pagina.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome, pagina.nome as nome, pagina.descricao as descricao, pagina.posicao as posicao FROM pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo order by $field"); 
 
      $paginas = new ArrayObject();

      foreach($stmt as $row){
         $pagina = new pagina(); 

         $pagina->idpagina = $row['idpagina'];
         $pagina->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $pagina->Modulo->nome = $row['modulo_nome'];
         $pagina->nome = $row['nome'];
         $pagina->descricao = $row['descricao'];
         $pagina->posicao = $row['posicao'];


         $paginas->append($pagina);
      }

      $this->conex = null;

      //addLog('pagina','listarOrdenado',0);
      return $paginas;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT pagina.idpagina as idpagina, pagina.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome, pagina.nome as nome, pagina.descricao as descricao, pagina.posicao as posicao FROM pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo where $param"); 
 
      $paginas = new ArrayObject();

      foreach($stmt as $row){
         $pagina = new pagina(); 

         $pagina->idpagina = $row['idpagina'];
         $pagina->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $pagina->Modulo->nome = $row['modulo_nome'];
         $pagina->nome = $row['nome'];
         $pagina->descricao = $row['descricao'];
         $pagina->posicao = $row['posicao'];


         $paginas->append($pagina);
      }

      $this->conex = null;

      //addLog('pagina','listarOnde',0);
      return $paginas;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT pagina.idpagina as idpagina, pagina.modulo_idmodulo as modulo_idmodulo, modulo.nome as modulo_nome, pagina.nome as nome, pagina.descricao as descricao, pagina.posicao as posicao FROM pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo where $param"); 
 
      foreach($stmt as $row){
         $pagina = new pagina(); 

         $pagina->idpagina = $row['idpagina'];
         $pagina->Modulo->idmodulo = $row['modulo_idmodulo'];
		 $pagina->Modulo->nome = $row['modulo_nome'];
         $pagina->nome = $row['nome'];
         $pagina->descricao = $row['descricao'];
         $pagina->posicao = $row['posicao'];


         return $pagina;
      }

      $this->conex = null;

      //addLog('pagina','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM pagina where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('pagina','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>