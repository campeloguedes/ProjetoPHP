<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class CategoriaDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function CategoriaDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($categoria){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO categoria(nome, icone) VALUES (?, ?)");

      $stmt->bindValue(1, $categoria->nome); 
      $stmt->bindValue(2, $categoria->icone); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('categoria','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($categoria){ 
     try{
      $stmt = $this->conex->prepare("Update categoria set nome = ?, icone = ? where idcategoria = ?");

      $stmt->bindValue(1, $categoria->nome); 
      $stmt->bindValue(2, $categoria->icone); 
      $stmt->bindValue(3, $categoria->idcategoria); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('categoria','atualizar', $categoria->idcategoria);
        return $categoria->idcategoria;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update categoria set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT categoria.idcategoria as idcategoria, categoria.nome as nome, categoria.icone as icone FROM categoria"); 
 
      $categorias = new ArrayObject();

      foreach($stmt as $row){
         $categoria = new categoria(); 

         $categoria->idcategoria = htmlentities(stripslashes($row['idcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->icone = htmlentities(stripslashes($row['icone']),ENT_COMPAT, 'ISO-8859-1');


         $categorias->append($categoria);
      }

      $this->conex = null;

      //addLog('categoria','listarTodos',0);
      return $categorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT categoria.idcategoria as idcategoria, categoria.nome as nome, categoria.icone as icone FROM categoria where idcategoria = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $categoria = new categoria(); 

         $categoria->idcategoria = htmlentities(stripslashes($row['idcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->icone = htmlentities(stripslashes($row['icone']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('categoria','listarPorId',$id);
         return $categoria;
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
         $s .= "(categoria.idcategoria like $like or categoria.nome like $like or categoria.icone like $like)";
      }

      $stmt = $this->conex->query("SELECT categoria.idcategoria as idcategoria, categoria.nome as nome, categoria.icone as icone FROM categoria where $s order by $order limit $limit"); 
 
      $categorias = new ArrayObject();

      foreach($stmt as $row){
         $categoria = new categoria(); 

         $categoria->idcategoria = htmlentities(stripslashes($row['idcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->nome = $row['nome'] != '' ? htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $categorias->append($categoria);
      }

      $this->conex = null;

      //addLog('categoria','listarTodos',0);
      return $categorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM categoria where idcategoria = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('categoria','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT categoria.idcategoria as idcategoria, categoria.nome as nome, categoria.icone as icone FROM categoria order by $field"); 
 
      $categorias = new ArrayObject();

      foreach($stmt as $row){
         $categoria = new categoria(); 

         $categoria->idcategoria = htmlentities(stripslashes($row['idcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->icone = htmlentities(stripslashes($row['icone']),ENT_COMPAT, 'ISO-8859-1');


         $categorias->append($categoria);
      }

      $this->conex = null;

      //addLog('categoria','listarOrdenado',0);
      return $categorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT categoria.idcategoria as idcategoria, categoria.nome as nome, categoria.icone as icone FROM categoria where $param"); 
 
      $categorias = new ArrayObject();

      foreach($stmt as $row){
         $categoria = new categoria(); 

         $categoria->idcategoria = htmlentities(stripslashes($row['idcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->icone = htmlentities(stripslashes($row['icone']),ENT_COMPAT, 'ISO-8859-1');


         $categorias->append($categoria);
      }

      $this->conex = null;

      //addLog('categoria','listarOnde',0);
      return $categorias;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT categoria.idcategoria as idcategoria, categoria.nome as nome, categoria.icone as icone FROM categoria where $param"); 
 
      foreach($stmt as $row){
         $categoria = new categoria(); 

         $categoria->idcategoria = htmlentities(stripslashes($row['idcategoria']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->nome = htmlentities(stripslashes($row['nome']),ENT_COMPAT, 'ISO-8859-1');
         $categoria->icone = htmlentities(stripslashes($row['icone']),ENT_COMPAT, 'ISO-8859-1');


         return $categoria;
      }

      $this->conex = null;

      //addLog('categoria','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM categoria where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('categoria','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>