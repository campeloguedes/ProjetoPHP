<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class SubcategoriaDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function SubcategoriaDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($subcategoria){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO subcategoria(categoria_idcategoria, nome) VALUES (?, ?)");

      $stmt->bindValue(1, $subcategoria->Categoria->idcategoria); 
      $stmt->bindValue(2, $subcategoria->nome); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('subcategoria','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($subcategoria){ 
     try{
      $stmt = $this->conex->prepare("Update subcategoria set categoria_idcategoria = ?, nome = ? where idsubcategoria = ?");

      $stmt->bindValue(1, $subcategoria->Categoria->idcategoria); 
      $stmt->bindValue(2, $subcategoria->nome); 
      $stmt->bindValue(3, $subcategoria->idsubcategoria); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('subcategoria','atualizar', $subcategoria->idsubcategoria);
        return $subcategoria->idsubcategoria;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update subcategoria set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT subcategoria.idsubcategoria as idsubcategoria, subcategoria.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, subcategoria.nome as nome FROM subcategoria inner join categoria on subcategoria.categoria_idcategoria = categoria.idcategoria"); 
 
      $subcategorias = new ArrayObject();

      foreach($stmt as $row){
         $subcategoria = new subcategoria(); 

         $subcategoria->idsubcategoria = htmlentities(stripslashes($row['idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $subcategoria->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');


         $subcategorias->append($subcategoria);
      }

      $this->conex = null;

      //addLog('subcategoria','listarTodos',0);
      return $subcategorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT subcategoria.idsubcategoria as idsubcategoria, subcategoria.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, subcategoria.nome as nome FROM subcategoria inner join categoria on subcategoria.categoria_idcategoria = categoria.idcategoria where idsubcategoria = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $subcategoria = new subcategoria(); 

         $subcategoria->idsubcategoria = htmlentities(stripslashes($row['idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $subcategoria->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('subcategoria','listarPorId',$id);
         return $subcategoria;
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
         $s .= "(subcategoria.idsubcategoria like $like or categoria.nome like $like or subcategoria.nome like $like)";
      }

      $stmt = $this->conex->query("SELECT subcategoria.idsubcategoria as idsubcategoria, categoria.nome as categoria_nome, subcategoria.nome as nome FROM subcategoria inner join categoria on subcategoria.categoria_idcategoria = categoria.idcategoria where $s order by $order limit $limit"); 
 
      $subcategorias = new ArrayObject();

      foreach($stmt as $row){
         $subcategoria = new subcategoria(); 

         $subcategoria->idsubcategoria = htmlentities(stripslashes($row['idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $subcategoria->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->nome = $row['nome'] != '' ? htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $subcategorias->append($subcategoria);
      }

      $this->conex = null;

      //addLog('subcategoria','listarTodos',0);
      return $subcategorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorCategoria($categoria_idcategoria){ 
     try{
      $stmt = $this->conex->prepare("SELECT subcategoria.idsubcategoria as idsubcategoria, subcategoria.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, subcategoria.nome as nome FROM subcategoria inner join categoria on subcategoria.categoria_idcategoria = categoria.idcategoria where categoria_idcategoria = ? order by subcategoria.nome"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $categoria_idcategoria);
      $stmt->execute();

      $subcategorias = new ArrayObject();

      foreach($stmt as $row){
         $subcategoria = new subcategoria(); 

         $subcategoria->idsubcategoria = htmlentities(stripslashes($row['idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $subcategoria->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');


         $subcategorias->append($subcategoria);
      }

         $this->conex = null;

      //addLog('subcategoria','listarPorCategoria',$categoria_idcategoria);
      return $subcategorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM subcategoria where idsubcategoria = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('subcategoria','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorCategoria($categoria_idcategoria){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM subcategoria where categoria_idcategoria = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $categoria_idcategoria);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('subcategoria','excluirPorCategoria',$categoria_idcategoria);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT subcategoria.idsubcategoria as idsubcategoria, subcategoria.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, subcategoria.nome as nome FROM subcategoria inner join categoria on subcategoria.categoria_idcategoria = categoria.idcategoria order by $field"); 
 
      $subcategorias = new ArrayObject();

      foreach($stmt as $row){
         $subcategoria = new subcategoria(); 

         $subcategoria->idsubcategoria = htmlentities(stripslashes($row['idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $subcategoria->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');


         $subcategorias->append($subcategoria);
      }

      $this->conex = null;

      //addLog('subcategoria','listarOrdenado',0);
      return $subcategorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT subcategoria.idsubcategoria as idsubcategoria, subcategoria.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, subcategoria.nome as nome FROM subcategoria inner join categoria on subcategoria.categoria_idcategoria = categoria.idcategoria where $param"); 
 
      $subcategorias = new ArrayObject();

      foreach($stmt as $row){
         $subcategoria = new subcategoria(); 

         $subcategoria->idsubcategoria = htmlentities(stripslashes($row['idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $subcategoria->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');


         $subcategorias->append($subcategoria);
      }

      $this->conex = null;

      //addLog('subcategoria','listarOnde',0);
      return $subcategorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT subcategoria.idsubcategoria as idsubcategoria, subcategoria.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, subcategoria.nome as nome FROM subcategoria inner join categoria on subcategoria.categoria_idcategoria = categoria.idcategoria where $param"); 
 
      foreach($stmt as $row){
         $subcategoria = new subcategoria(); 

         $subcategoria->idsubcategoria = htmlentities(stripslashes($row['idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $subcategoria->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $subcategoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');


         return $subcategoria;
      }

      $this->conex = null;

      //addLog('subcategoria','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM subcategoria where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('subcategoria','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>