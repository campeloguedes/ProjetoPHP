<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class ProdutofotoDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function ProdutofotoDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($produtofoto){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO produtofoto(produto_idproduto, arquivo, posicao) VALUES (?, ?, ?)");

      $stmt->bindValue(1, $produtofoto->Produto->idproduto); 
      $stmt->bindValue(2, $produtofoto->arquivo); 
      $stmt->bindValue(3, $produtofoto->posicao); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('produtofoto','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($produtofoto){ 
     try{
      $stmt = $this->conex->prepare("Update produtofoto set produto_idproduto = ?, arquivo = ?, posicao = ? where idprodutofoto = ?");

      $stmt->bindValue(1, $produtofoto->Produto->idproduto); 
      $stmt->bindValue(2, $produtofoto->arquivo); 
      $stmt->bindValue(3, $produtofoto->posicao); 
      $stmt->bindValue(4, $produtofoto->idprodutofoto); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produtofoto','atualizar', $produtofoto->idprodutofoto);
        return $produtofoto->idprodutofoto;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function salvarPosicao($produtofoto){ 
     try{
      $stmt = $this->conex->prepare("Update produtofoto set posicao = ? where idprodutofoto = ?");

      $stmt->bindValue(1, $produtofoto->posicao); 
      $stmt->bindValue(2, $produtofoto->idprodutofoto); 
      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produtofoto','salvarPosicao', $produtofoto->idprodutofoto);
        return $produtofoto->idprodutofoto;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update produtofoto set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT produtofoto.idprodutofoto as idprodutofoto, produtofoto.produto_idproduto as produto_idproduto, produto.titulo as produto_titulo, produtofoto.arquivo as arquivo, produtofoto.posicao as posicao FROM produtofoto inner join produto on produtofoto.produto_idproduto = produto.idproduto order by posicao"); 
 
      $produtofotos = new ArrayObject();

      foreach($stmt as $row){
         $produtofoto = new produtofoto(); 

         $produtofoto->idprodutofoto = htmlentities(stripslashes($row['idprodutofoto']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->Produto->idproduto = htmlentities(stripslashes($row['produto_idproduto']),ENT_COMPAT, 'ISO-8859-1');
		 $produtofoto->Produto->titulo = htmlentities(stripslashes($row['produto_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $produtofotos->append($produtofoto);
      }

      $this->conex = null;

      //addLog('produtofoto','listarTodos',0);
      return $produtofotos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT produtofoto.idprodutofoto as idprodutofoto, produtofoto.produto_idproduto as produto_idproduto, produto.titulo as produto_titulo, produtofoto.arquivo as arquivo, produtofoto.posicao as posicao FROM produtofoto inner join produto on produtofoto.produto_idproduto = produto.idproduto where idprodutofoto = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $produtofoto = new produtofoto(); 

         $produtofoto->idprodutofoto = htmlentities(stripslashes($row['idprodutofoto']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->Produto->idproduto = htmlentities(stripslashes($row['produto_idproduto']),ENT_COMPAT, 'ISO-8859-1');
		 $produtofoto->Produto->titulo = htmlentities(stripslashes($row['produto_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('produtofoto','listarPorId',$id);
         return $produtofoto;
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
         $s .= "(produtofoto.idprodutofoto like $like or produto.titulo like $like or produtofoto.arquivo like $like or produtofoto.posicao like $like)";
      }

      $stmt = $this->conex->query("SELECT produtofoto.idprodutofoto as idprodutofoto, produto.titulo as produto_titulo, produtofoto.arquivo as arquivo, produtofoto.posicao as posicao FROM produtofoto inner join produto on produtofoto.produto_idproduto = produto.idproduto where $s order by $order limit $limit"); 
 
      $produtofotos = new ArrayObject();

      foreach($stmt as $row){
         $produtofoto = new produtofoto(); 

         $produtofoto->idprodutofoto = htmlentities(stripslashes($row['idprodutofoto']),ENT_COMPAT, 'ISO-8859-1');
		 $produtofoto->Produto->titulo = htmlentities(stripslashes($row['produto_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->posicao = $row['posicao'] != '' ? htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $produtofotos->append($produtofoto);
      }

      $this->conex = null;

      //addLog('produtofoto','listarTodos',0);
      return $produtofotos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorProduto($produto_idproduto){ 
     try{
      $stmt = $this->conex->prepare("SELECT produtofoto.idprodutofoto as idprodutofoto, produtofoto.produto_idproduto as produto_idproduto, produto.titulo as produto_titulo, produtofoto.arquivo as arquivo, produtofoto.posicao as posicao FROM produtofoto inner join produto on produtofoto.produto_idproduto = produto.idproduto where produto_idproduto = ? order by posicao"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $produto_idproduto);
      $stmt->execute();

      $produtofotos = new ArrayObject();

      foreach($stmt as $row){
         $produtofoto = new produtofoto(); 

         $produtofoto->idprodutofoto = htmlentities(stripslashes($row['idprodutofoto']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->Produto->idproduto = htmlentities(stripslashes($row['produto_idproduto']),ENT_COMPAT, 'ISO-8859-1');
		 $produtofoto->Produto->titulo = htmlentities(stripslashes($row['produto_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $produtofotos->append($produtofoto);
      }

         $this->conex = null;

      //addLog('produtofoto','listarPorProduto',$produto_idproduto);
      return $produtofotos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM produtofoto where idprodutofoto = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produtofoto','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorProduto($produto_idproduto){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM produtofoto where produto_idproduto = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $produto_idproduto);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produtofoto','excluirPorProduto',$produto_idproduto);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT produtofoto.idprodutofoto as idprodutofoto, produtofoto.produto_idproduto as produto_idproduto, produto.titulo as produto_titulo, produtofoto.arquivo as arquivo, produtofoto.posicao as posicao FROM produtofoto inner join produto on produtofoto.produto_idproduto = produto.idproduto order by $field"); 
 
      $produtofotos = new ArrayObject();

      foreach($stmt as $row){
         $produtofoto = new produtofoto(); 

         $produtofoto->idprodutofoto = htmlentities(stripslashes($row['idprodutofoto']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->Produto->idproduto = htmlentities(stripslashes($row['produto_idproduto']),ENT_COMPAT, 'ISO-8859-1');
		 $produtofoto->Produto->titulo = htmlentities(stripslashes($row['produto_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $produtofotos->append($produtofoto);
      }

      $this->conex = null;

      //addLog('produtofoto','listarOrdenado',0);
      return $produtofotos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT produtofoto.idprodutofoto as idprodutofoto, produtofoto.produto_idproduto as produto_idproduto, produto.titulo as produto_titulo, produtofoto.arquivo as arquivo, produtofoto.posicao as posicao FROM produtofoto inner join produto on produtofoto.produto_idproduto = produto.idproduto where $param"); 
 
      $produtofotos = new ArrayObject();

      foreach($stmt as $row){
         $produtofoto = new produtofoto(); 

         $produtofoto->idprodutofoto = htmlentities(stripslashes($row['idprodutofoto']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->Produto->idproduto = htmlentities(stripslashes($row['produto_idproduto']),ENT_COMPAT, 'ISO-8859-1');
		 $produtofoto->Produto->titulo = htmlentities(stripslashes($row['produto_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         $produtofotos->append($produtofoto);
      }

      $this->conex = null;

      //addLog('produtofoto','listarOnde',0);
      return $produtofotos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT produtofoto.idprodutofoto as idprodutofoto, produtofoto.produto_idproduto as produto_idproduto, produto.titulo as produto_titulo, produtofoto.arquivo as arquivo, produtofoto.posicao as posicao FROM produtofoto inner join produto on produtofoto.produto_idproduto = produto.idproduto where $param"); 
 
      foreach($stmt as $row){
         $produtofoto = new produtofoto(); 

         $produtofoto->idprodutofoto = htmlentities(stripslashes($row['idprodutofoto']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->Produto->idproduto = htmlentities(stripslashes($row['produto_idproduto']),ENT_COMPAT, 'ISO-8859-1');
		 $produtofoto->Produto->titulo = htmlentities(stripslashes($row['produto_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->arquivo = htmlentities(stripslashes($row['arquivo']),ENT_COMPAT, 'ISO-8859-1');
         $produtofoto->posicao = htmlentities(stripslashes($row['posicao']),ENT_COMPAT, 'ISO-8859-1');


         return $produtofoto;
      }

      $this->conex = null;

      //addLog('produtofoto','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM produtofoto where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('produtofoto','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>