<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class ProdutoDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function ProdutoDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($produto){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO produto(anunciante_idanunciante, categoria_idcategoria, subcategoria_idsubcategoria, titulo, descricao, preco, fpagamento, fotodestaque, destaque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $stmt->bindValue(1, $produto->Anunciante->idanunciante); 
      $stmt->bindValue(2, $produto->Categoria->idcategoria); 
      $stmt->bindValue(3, $produto->Subcategoria->idsubcategoria); 
      $stmt->bindValue(4, $produto->titulo); 
      $stmt->bindValue(5, $produto->descricao); 
      $stmt->bindValue(6, $produto->preco); 
      $stmt->bindValue(7, $produto->fpagamento); 
      $stmt->bindValue(8, $produto->fotodestaque); 
      $stmt->bindValue(9, $produto->destaque); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('produto','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($produto){ 
     try{
      $stmt = $this->conex->prepare("Update produto set anunciante_idanunciante = ?, categoria_idcategoria = ?, subcategoria_idsubcategoria = ?, titulo = ?, descricao = ?, preco = ?, fpagamento = ?, fotodestaque = ?, destaque = ? where idproduto = ?");

      $stmt->bindValue(1, $produto->Anunciante->idanunciante); 
      $stmt->bindValue(2, $produto->Categoria->idcategoria); 
      $stmt->bindValue(3, $produto->Subcategoria->idsubcategoria); 
      $stmt->bindValue(4, $produto->titulo); 
      $stmt->bindValue(5, $produto->descricao); 
      $stmt->bindValue(6, $produto->preco); 
      $stmt->bindValue(7, $produto->fpagamento); 
      $stmt->bindValue(8, $produto->fotodestaque); 
      $stmt->bindValue(9, $produto->destaque); 
      $stmt->bindValue(10, $produto->idproduto); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produto','atualizar', $produto->idproduto);
        return $produto->idproduto;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update produto set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria"); 
 
      $produtos = new ArrayObject();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         $produtos->append($produto);
      }

      $this->conex = null;

      //addLog('produto','listarTodos',0);
      return $produtos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria where idproduto = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('produto','listarPorId',$id);
         return $produto;
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
         $s .= "(produto.idproduto like $like or anunciante.titulo like $like or categoria.nome like $like or subcategoria.nome like $like or produto.titulo like $like or produto.preco like $like or produto.fotodestaque like $like or produto.destaque like $like)";
      }

      $stmt = $this->conex->query("SELECT produto.idproduto as idproduto, anunciante.titulo as anunciante_titulo, categoria.nome as categoria_nome, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.preco as preco, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria where $s order by $order limit $limit"); 
 
      $produtos = new ArrayObject();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = $row['titulo'] != '' ? htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $produto->preco = money(money_reverse(($row['preco'])));
          $produto->destaque = $row['destaque'] == 1 ? '<input type="checkbox" checked="checked" onclick="atualizarCampo(\'Produto\', \'destaque\', this.checked==true?1:0, \'idproduto='.$produto->idproduto.'\');" />' : '<input type="checkbox" onclick="atualizarCampo(\'Produto\', \'destaque\', this.checked==true?1:0, \'idproduto='.$produto->idproduto.'\');" />';


         $produtos->append($produto);
      }

      $this->conex = null;

      //addLog('produto','listarTodos',0);
      return $produtos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorAnunciante($anunciante_idanunciante){ 
     try{
      $stmt = $this->conex->prepare("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria where anunciante_idanunciante = ? order by produto.titulo"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $anunciante_idanunciante);
      $stmt->execute();

      $produtos = new ArrayObject();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         $produtos->append($produto);
      }

         $this->conex = null;

      //addLog('produto','listarPorAnunciante',$anunciante_idanunciante);
      return $produtos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorCategoria($categoria_idcategoria){ 
     try{
      $stmt = $this->conex->prepare("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria where categoria_idcategoria = ? order by produto.titulo"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $categoria_idcategoria);
      $stmt->execute();

      $produtos = new ArrayObject();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         $produtos->append($produto);
      }

         $this->conex = null;

      //addLog('produto','listarPorCategoria',$categoria_idcategoria);
      return $produtos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorSubcategoria($subcategoria_idsubcategoria){ 
     try{
      $stmt = $this->conex->prepare("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria where subcategoria_idsubcategoria = ? order by produto.titulo"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $subcategoria_idsubcategoria);
      $stmt->execute();

      $produtos = new ArrayObject();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         $produtos->append($produto);
      }

         $this->conex = null;

      //addLog('produto','listarPorSubcategoria',$subcategoria_idsubcategoria);
      return $produtos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      @require_once('controller/ProdutofotoController.class.php');
      $ProdutofotoController = new ProdutofotoController();
      $ProdutofotoController->excluirPorProduto($id);

      $stmt = $this->conex->prepare("DELETE FROM produto where idproduto = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produto','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorAnunciante($anunciante_idanunciante){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM produto where anunciante_idanunciante = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $anunciante_idanunciante);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produto','excluirPorAnunciante',$anunciante_idanunciante);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorCategoria($categoria_idcategoria){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM produto where categoria_idcategoria = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $categoria_idcategoria);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produto','excluirPorCategoria',$categoria_idcategoria);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluirPorSubcategoria($subcategoria_idsubcategoria){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM produto where subcategoria_idsubcategoria = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $subcategoria_idsubcategoria);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('produto','excluirPorSubcategoria',$subcategoria_idsubcategoria);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria order by $field"); 
 
      $produtos = new ArrayObject();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         $produtos->append($produto);
      }

      $this->conex = null;

      //addLog('produto','listarOrdenado',0);
      return $produtos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria where $param"); 
 
      $produtos = new ArrayObject();

      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         $produtos->append($produto);
      }

      $this->conex = null;

      //addLog('produto','listarOnde',0);
      return $produtos;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT produto.idproduto as idproduto, produto.anunciante_idanunciante as anunciante_idanunciante, anunciante.titulo as anunciante_titulo, produto.categoria_idcategoria as categoria_idcategoria, categoria.nome as categoria_nome, produto.subcategoria_idsubcategoria as subcategoria_idsubcategoria, subcategoria.nome as subcategoria_nome, produto.titulo as titulo, produto.descricao as descricao, produto.preco as preco, produto.fpagamento as fpagamento, produto.fotodestaque as fotodestaque, produto.destaque as destaque FROM produto inner join anunciante on produto.anunciante_idanunciante = anunciante.idanunciante inner join categoria on produto.categoria_idcategoria = categoria.idcategoria inner join subcategoria on produto.subcategoria_idsubcategoria = subcategoria.idsubcategoria where $param"); 
 
      foreach($stmt as $row){
         $produto = new produto(); 

         $produto->idproduto = htmlentities(stripslashes($row['idproduto']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Anunciante->idanunciante = htmlentities(stripslashes($row['anunciante_idanunciante']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Anunciante->titulo = htmlentities(stripslashes($row['anunciante_titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Categoria->idcategoria = htmlentities(stripslashes($row['categoria_idcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Categoria->nome = htmlentities(stripslashes($row['categoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->Subcategoria->idsubcategoria = htmlentities(stripslashes($row['subcategoria_idsubcategoria']),ENT_COMPAT, 'ISO-8859-1');
		 $produto->Subcategoria->nome = htmlentities(stripslashes($row['subcategoria_nome']),ENT_COMPAT, 'ISO-8859-1');
         $produto->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $produto->descricao = htmlentities(stripslashes($row['descricao']),ENT_COMPAT, 'ISO-8859-1');
         $produto->preco = htmlentities(stripslashes($row['preco']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fpagamento = htmlentities(stripslashes($row['fpagamento']),ENT_COMPAT, 'ISO-8859-1');
         $produto->fotodestaque = htmlentities(stripslashes($row['fotodestaque']),ENT_COMPAT, 'ISO-8859-1');
         $produto->destaque = htmlentities(stripslashes($row['destaque']),ENT_COMPAT, 'ISO-8859-1');


         return $produto;
      }

      $this->conex = null;

      //addLog('produto','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM produto where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('produto','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>