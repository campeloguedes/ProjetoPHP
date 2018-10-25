<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class GeralDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function GeralDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($geral){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO geral(email, telefone, urlfacebook, urltwitter, urlinstagram, urlyoutube, anuncinformacoes, endereco, bairro, cidade, googlemaps, objetivos, e1icone, e1titulo, e1descricao, e2icone, e2titulo, e2descricao, e3icone, e3titulo, e3descricao, e4icone, e4titulo, e4descricao, parallax, codigoanalytics, codigochat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $stmt->bindValue(1, $geral->email); 
      $stmt->bindValue(2, $geral->telefone); 
      $stmt->bindValue(3, $geral->urlfacebook); 
      $stmt->bindValue(4, $geral->urltwitter); 
      $stmt->bindValue(5, $geral->urlinstagram); 
      $stmt->bindValue(6, $geral->urlyoutube); 
      $stmt->bindValue(7, $geral->anuncinformacoes); 
      $stmt->bindValue(8, $geral->endereco); 
      $stmt->bindValue(9, $geral->bairro); 
      $stmt->bindValue(10, $geral->cidade); 
      $stmt->bindValue(11, $geral->googlemaps); 
      $stmt->bindValue(12, $geral->objetivos); 
      $stmt->bindValue(13, $geral->e1icone); 
      $stmt->bindValue(14, $geral->e1titulo); 
      $stmt->bindValue(15, $geral->e1descricao); 
      $stmt->bindValue(16, $geral->e2icone); 
      $stmt->bindValue(17, $geral->e2titulo); 
      $stmt->bindValue(18, $geral->e2descricao); 
      $stmt->bindValue(19, $geral->e3icone); 
      $stmt->bindValue(20, $geral->e3titulo); 
      $stmt->bindValue(21, $geral->e3descricao); 
      $stmt->bindValue(22, $geral->e4icone); 
      $stmt->bindValue(23, $geral->e4titulo); 
      $stmt->bindValue(24, $geral->e4descricao); 
      $stmt->bindValue(25, $geral->parallax); 
      $stmt->bindValue(26, $geral->codigoanalytics); 
      $stmt->bindValue(27, $geral->codigochat); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('geral','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($geral){ 
     try{
      $stmt = $this->conex->prepare("Update geral set email = ?, telefone = ?, urlfacebook = ?, urltwitter = ?, urlinstagram = ?, urlyoutube = ?, anuncinformacoes = ?, endereco = ?, bairro = ?, cidade = ?, googlemaps = ?, objetivos = ?, e1icone = ?, e1titulo = ?, e1descricao = ?, e2icone = ?, e2titulo = ?, e2descricao = ?, e3icone = ?, e3titulo = ?, e3descricao = ?, e4icone = ?, e4titulo = ?, e4descricao = ?, parallax = ?, codigoanalytics = ?, codigochat = ? where idgeral = ?");

      $stmt->bindValue(1, $geral->email); 
      $stmt->bindValue(2, $geral->telefone); 
      $stmt->bindValue(3, $geral->urlfacebook); 
      $stmt->bindValue(4, $geral->urltwitter); 
      $stmt->bindValue(5, $geral->urlinstagram); 
      $stmt->bindValue(6, $geral->urlyoutube); 
      $stmt->bindValue(7, $geral->anuncinformacoes); 
      $stmt->bindValue(8, $geral->endereco); 
      $stmt->bindValue(9, $geral->bairro); 
      $stmt->bindValue(10, $geral->cidade); 
      $stmt->bindValue(11, $geral->googlemaps); 
      $stmt->bindValue(12, $geral->objetivos); 
      $stmt->bindValue(13, $geral->e1icone); 
      $stmt->bindValue(14, $geral->e1titulo); 
      $stmt->bindValue(15, $geral->e1descricao); 
      $stmt->bindValue(16, $geral->e2icone); 
      $stmt->bindValue(17, $geral->e2titulo); 
      $stmt->bindValue(18, $geral->e2descricao); 
      $stmt->bindValue(19, $geral->e3icone); 
      $stmt->bindValue(20, $geral->e3titulo); 
      $stmt->bindValue(21, $geral->e3descricao); 
      $stmt->bindValue(22, $geral->e4icone); 
      $stmt->bindValue(23, $geral->e4titulo); 
      $stmt->bindValue(24, $geral->e4descricao); 
      $stmt->bindValue(25, $geral->parallax); 
      $stmt->bindValue(26, $geral->codigoanalytics); 
      $stmt->bindValue(27, $geral->codigochat); 
      $stmt->bindValue(28, $geral->idgeral); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('geral','atualizar', $geral->idgeral);
        return $geral->idgeral;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update geral set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT geral.idgeral as idgeral, geral.email as email, geral.telefone as telefone, geral.urlfacebook as urlfacebook, geral.urltwitter as urltwitter, geral.urlinstagram as urlinstagram, geral.urlyoutube as urlyoutube, geral.anuncinformacoes as anuncinformacoes, geral.endereco as endereco, geral.bairro as bairro, geral.cidade as cidade, geral.googlemaps as googlemaps, geral.objetivos as objetivos, geral.e1icone as e1icone, geral.e1titulo as e1titulo, geral.e1descricao as e1descricao, geral.e2icone as e2icone, geral.e2titulo as e2titulo, geral.e2descricao as e2descricao, geral.e3icone as e3icone, geral.e3titulo as e3titulo, geral.e3descricao as e3descricao, geral.e4icone as e4icone, geral.e4titulo as e4titulo, geral.e4descricao as e4descricao, geral.parallax as parallax, geral.codigoanalytics as codigoanalytics, geral.codigochat as codigochat FROM geral"); 
 
      $gerals = new ArrayObject();

      foreach($stmt as $row){
         $geral = new geral(); 

         $geral->idgeral = htmlentities(stripslashes($row['idgeral']),ENT_COMPAT, 'ISO-8859-1');
         $geral->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $geral->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlfacebook = htmlentities(stripslashes($row['urlfacebook']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urltwitter = htmlentities(stripslashes($row['urltwitter']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlinstagram = htmlentities(stripslashes($row['urlinstagram']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlyoutube = htmlentities(stripslashes($row['urlyoutube']),ENT_COMPAT, 'ISO-8859-1');
         $geral->anuncinformacoes = htmlentities(stripslashes($row['anuncinformacoes']),ENT_COMPAT, 'ISO-8859-1');
         $geral->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $geral->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $geral->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $geral->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $geral->objetivos = htmlentities(stripslashes($row['objetivos']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1icone = htmlentities(stripslashes($row['e1icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1titulo = htmlentities(stripslashes($row['e1titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1descricao = htmlentities(stripslashes($row['e1descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2icone = htmlentities(stripslashes($row['e2icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2titulo = htmlentities(stripslashes($row['e2titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2descricao = htmlentities(stripslashes($row['e2descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3icone = htmlentities(stripslashes($row['e3icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3titulo = htmlentities(stripslashes($row['e3titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3descricao = htmlentities(stripslashes($row['e3descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4icone = htmlentities(stripslashes($row['e4icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4titulo = htmlentities(stripslashes($row['e4titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4descricao = htmlentities(stripslashes($row['e4descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->parallax = htmlentities(stripslashes($row['parallax']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigoanalytics = htmlentities(stripslashes($row['codigoanalytics']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigochat = htmlentities(stripslashes($row['codigochat']),ENT_COMPAT, 'ISO-8859-1');


         $gerals->append($geral);
      }

      $this->conex = null;

      //addLog('geral','listarTodos',0);
      return $gerals;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT geral.idgeral as idgeral, geral.email as email, geral.telefone as telefone, geral.urlfacebook as urlfacebook, geral.urltwitter as urltwitter, geral.urlinstagram as urlinstagram, geral.urlyoutube as urlyoutube, geral.anuncinformacoes as anuncinformacoes, geral.endereco as endereco, geral.bairro as bairro, geral.cidade as cidade, geral.googlemaps as googlemaps, geral.objetivos as objetivos, geral.e1icone as e1icone, geral.e1titulo as e1titulo, geral.e1descricao as e1descricao, geral.e2icone as e2icone, geral.e2titulo as e2titulo, geral.e2descricao as e2descricao, geral.e3icone as e3icone, geral.e3titulo as e3titulo, geral.e3descricao as e3descricao, geral.e4icone as e4icone, geral.e4titulo as e4titulo, geral.e4descricao as e4descricao, geral.parallax as parallax, geral.codigoanalytics as codigoanalytics, geral.codigochat as codigochat FROM geral where idgeral = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $geral = new geral(); 

         $geral->idgeral = htmlentities(stripslashes($row['idgeral']),ENT_COMPAT, 'ISO-8859-1');
         $geral->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $geral->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlfacebook = htmlentities(stripslashes($row['urlfacebook']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urltwitter = htmlentities(stripslashes($row['urltwitter']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlinstagram = htmlentities(stripslashes($row['urlinstagram']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlyoutube = htmlentities(stripslashes($row['urlyoutube']),ENT_COMPAT, 'ISO-8859-1');
         $geral->anuncinformacoes = htmlentities(stripslashes($row['anuncinformacoes']),ENT_COMPAT, 'ISO-8859-1');
         $geral->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $geral->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $geral->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $geral->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $geral->objetivos = htmlentities(stripslashes($row['objetivos']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1icone = htmlentities(stripslashes($row['e1icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1titulo = htmlentities(stripslashes($row['e1titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1descricao = htmlentities(stripslashes($row['e1descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2icone = htmlentities(stripslashes($row['e2icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2titulo = htmlentities(stripslashes($row['e2titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2descricao = htmlentities(stripslashes($row['e2descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3icone = htmlentities(stripslashes($row['e3icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3titulo = htmlentities(stripslashes($row['e3titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3descricao = htmlentities(stripslashes($row['e3descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4icone = htmlentities(stripslashes($row['e4icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4titulo = htmlentities(stripslashes($row['e4titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4descricao = htmlentities(stripslashes($row['e4descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->parallax = htmlentities(stripslashes($row['parallax']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigoanalytics = htmlentities(stripslashes($row['codigoanalytics']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigochat = htmlentities(stripslashes($row['codigochat']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('geral','listarPorId',$id);
         return $geral;
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
         $s .= "(geral.idgeral like $like or geral.email like $like or geral.telefone like $like or geral.endereco like $like or geral.bairro like $like or geral.cidade like $like or geral.e1icone like $like or geral.e1titulo like $like or geral.e2icone like $like or geral.e2titulo like $like or geral.e3icone like $like or geral.e3titulo like $like or geral.e4icone like $like or geral.e4titulo like $like or geral.parallax like $like)";
      }

      $stmt = $this->conex->query("SELECT geral.idgeral as idgeral, geral.email as email, geral.telefone as telefone, geral.endereco as endereco, geral.bairro as bairro, geral.cidade as cidade, geral.e1icone as e1icone, geral.e1titulo as e1titulo, geral.e2icone as e2icone, geral.e2titulo as e2titulo, geral.e3icone as e3icone, geral.e3titulo as e3titulo, geral.e4icone as e4icone, geral.e4titulo as e4titulo, geral.parallax as parallax FROM geral where $s order by $order limit $limit"); 
 
      $gerals = new ArrayObject();

      foreach($stmt as $row){
         $geral = new geral(); 

         $geral->idgeral = htmlentities(stripslashes($row['idgeral']),ENT_COMPAT, 'ISO-8859-1');
         $geral->email = $row['email'] != '' ? htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->telefone = $row['telefone'] != '' ? htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->endereco = $row['endereco'] != '' ? htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->bairro = $row['bairro'] != '' ? htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->cidade = $row['cidade'] != '' ? htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->e1titulo = $row['e1titulo'] != '' ? htmlentities(stripslashes($row['e1titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->e2titulo = $row['e2titulo'] != '' ? htmlentities(stripslashes($row['e2titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->e3titulo = $row['e3titulo'] != '' ? htmlentities(stripslashes($row['e3titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $geral->e4titulo = $row['e4titulo'] != '' ? htmlentities(stripslashes($row['e4titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $gerals->append($geral);
      }

      $this->conex = null;

      //addLog('geral','listarTodos',0);
      return $gerals;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM geral where idgeral = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('geral','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT geral.idgeral as idgeral, geral.email as email, geral.telefone as telefone, geral.urlfacebook as urlfacebook, geral.urltwitter as urltwitter, geral.urlinstagram as urlinstagram, geral.urlyoutube as urlyoutube, geral.anuncinformacoes as anuncinformacoes, geral.endereco as endereco, geral.bairro as bairro, geral.cidade as cidade, geral.googlemaps as googlemaps, geral.objetivos as objetivos, geral.e1icone as e1icone, geral.e1titulo as e1titulo, geral.e1descricao as e1descricao, geral.e2icone as e2icone, geral.e2titulo as e2titulo, geral.e2descricao as e2descricao, geral.e3icone as e3icone, geral.e3titulo as e3titulo, geral.e3descricao as e3descricao, geral.e4icone as e4icone, geral.e4titulo as e4titulo, geral.e4descricao as e4descricao, geral.parallax as parallax, geral.codigoanalytics as codigoanalytics, geral.codigochat as codigochat FROM geral order by $field"); 
 
      $gerals = new ArrayObject();

      foreach($stmt as $row){
         $geral = new geral(); 

         $geral->idgeral = htmlentities(stripslashes($row['idgeral']),ENT_COMPAT, 'ISO-8859-1');
         $geral->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $geral->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlfacebook = htmlentities(stripslashes($row['urlfacebook']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urltwitter = htmlentities(stripslashes($row['urltwitter']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlinstagram = htmlentities(stripslashes($row['urlinstagram']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlyoutube = htmlentities(stripslashes($row['urlyoutube']),ENT_COMPAT, 'ISO-8859-1');
         $geral->anuncinformacoes = htmlentities(stripslashes($row['anuncinformacoes']),ENT_COMPAT, 'ISO-8859-1');
         $geral->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $geral->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $geral->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $geral->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $geral->objetivos = htmlentities(stripslashes($row['objetivos']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1icone = htmlentities(stripslashes($row['e1icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1titulo = htmlentities(stripslashes($row['e1titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1descricao = htmlentities(stripslashes($row['e1descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2icone = htmlentities(stripslashes($row['e2icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2titulo = htmlentities(stripslashes($row['e2titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2descricao = htmlentities(stripslashes($row['e2descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3icone = htmlentities(stripslashes($row['e3icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3titulo = htmlentities(stripslashes($row['e3titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3descricao = htmlentities(stripslashes($row['e3descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4icone = htmlentities(stripslashes($row['e4icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4titulo = htmlentities(stripslashes($row['e4titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4descricao = htmlentities(stripslashes($row['e4descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->parallax = htmlentities(stripslashes($row['parallax']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigoanalytics = htmlentities(stripslashes($row['codigoanalytics']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigochat = htmlentities(stripslashes($row['codigochat']),ENT_COMPAT, 'ISO-8859-1');


         $gerals->append($geral);
      }

      $this->conex = null;

      //addLog('geral','listarOrdenado',0);
      return $gerals;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT geral.idgeral as idgeral, geral.email as email, geral.telefone as telefone, geral.urlfacebook as urlfacebook, geral.urltwitter as urltwitter, geral.urlinstagram as urlinstagram, geral.urlyoutube as urlyoutube, geral.anuncinformacoes as anuncinformacoes, geral.endereco as endereco, geral.bairro as bairro, geral.cidade as cidade, geral.googlemaps as googlemaps, geral.objetivos as objetivos, geral.e1icone as e1icone, geral.e1titulo as e1titulo, geral.e1descricao as e1descricao, geral.e2icone as e2icone, geral.e2titulo as e2titulo, geral.e2descricao as e2descricao, geral.e3icone as e3icone, geral.e3titulo as e3titulo, geral.e3descricao as e3descricao, geral.e4icone as e4icone, geral.e4titulo as e4titulo, geral.e4descricao as e4descricao, geral.parallax as parallax, geral.codigoanalytics as codigoanalytics, geral.codigochat as codigochat FROM geral where $param"); 
 
      $gerals = new ArrayObject();

      foreach($stmt as $row){
         $geral = new geral(); 

         $geral->idgeral = htmlentities(stripslashes($row['idgeral']),ENT_COMPAT, 'ISO-8859-1');
         $geral->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $geral->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlfacebook = htmlentities(stripslashes($row['urlfacebook']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urltwitter = htmlentities(stripslashes($row['urltwitter']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlinstagram = htmlentities(stripslashes($row['urlinstagram']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlyoutube = htmlentities(stripslashes($row['urlyoutube']),ENT_COMPAT, 'ISO-8859-1');
         $geral->anuncinformacoes = htmlentities(stripslashes($row['anuncinformacoes']),ENT_COMPAT, 'ISO-8859-1');
         $geral->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $geral->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $geral->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $geral->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $geral->objetivos = htmlentities(stripslashes($row['objetivos']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1icone = htmlentities(stripslashes($row['e1icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1titulo = htmlentities(stripslashes($row['e1titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1descricao = htmlentities(stripslashes($row['e1descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2icone = htmlentities(stripslashes($row['e2icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2titulo = htmlentities(stripslashes($row['e2titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2descricao = htmlentities(stripslashes($row['e2descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3icone = htmlentities(stripslashes($row['e3icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3titulo = htmlentities(stripslashes($row['e3titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3descricao = htmlentities(stripslashes($row['e3descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4icone = htmlentities(stripslashes($row['e4icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4titulo = htmlentities(stripslashes($row['e4titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4descricao = htmlentities(stripslashes($row['e4descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->parallax = htmlentities(stripslashes($row['parallax']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigoanalytics = htmlentities(stripslashes($row['codigoanalytics']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigochat = htmlentities(stripslashes($row['codigochat']),ENT_COMPAT, 'ISO-8859-1');


         $gerals->append($geral);
      }

      $this->conex = null;

      //addLog('geral','listarOnde',0);
      return $gerals;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT geral.idgeral as idgeral, geral.email as email, geral.telefone as telefone, geral.urlfacebook as urlfacebook, geral.urltwitter as urltwitter, geral.urlinstagram as urlinstagram, geral.urlyoutube as urlyoutube, geral.anuncinformacoes as anuncinformacoes, geral.endereco as endereco, geral.bairro as bairro, geral.cidade as cidade, geral.googlemaps as googlemaps, geral.objetivos as objetivos, geral.e1icone as e1icone, geral.e1titulo as e1titulo, geral.e1descricao as e1descricao, geral.e2icone as e2icone, geral.e2titulo as e2titulo, geral.e2descricao as e2descricao, geral.e3icone as e3icone, geral.e3titulo as e3titulo, geral.e3descricao as e3descricao, geral.e4icone as e4icone, geral.e4titulo as e4titulo, geral.e4descricao as e4descricao, geral.parallax as parallax, geral.codigoanalytics as codigoanalytics, geral.codigochat as codigochat FROM geral where $param"); 
 
      foreach($stmt as $row){
         $geral = new geral(); 

         $geral->idgeral = htmlentities(stripslashes($row['idgeral']),ENT_COMPAT, 'ISO-8859-1');
         $geral->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $geral->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlfacebook = htmlentities(stripslashes($row['urlfacebook']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urltwitter = htmlentities(stripslashes($row['urltwitter']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlinstagram = htmlentities(stripslashes($row['urlinstagram']),ENT_COMPAT, 'ISO-8859-1');
         $geral->urlyoutube = htmlentities(stripslashes($row['urlyoutube']),ENT_COMPAT, 'ISO-8859-1');
         $geral->anuncinformacoes = htmlentities(stripslashes($row['anuncinformacoes']),ENT_COMPAT, 'ISO-8859-1');
         $geral->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $geral->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $geral->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $geral->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $geral->objetivos = htmlentities(stripslashes($row['objetivos']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1icone = htmlentities(stripslashes($row['e1icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1titulo = htmlentities(stripslashes($row['e1titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e1descricao = htmlentities(stripslashes($row['e1descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2icone = htmlentities(stripslashes($row['e2icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2titulo = htmlentities(stripslashes($row['e2titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e2descricao = htmlentities(stripslashes($row['e2descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3icone = htmlentities(stripslashes($row['e3icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3titulo = htmlentities(stripslashes($row['e3titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e3descricao = htmlentities(stripslashes($row['e3descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4icone = htmlentities(stripslashes($row['e4icone']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4titulo = htmlentities(stripslashes($row['e4titulo']),ENT_COMPAT, 'ISO-8859-1');
         $geral->e4descricao = htmlentities(stripslashes($row['e4descricao']),ENT_COMPAT, 'ISO-8859-1');
         $geral->parallax = htmlentities(stripslashes($row['parallax']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigoanalytics = htmlentities(stripslashes($row['codigoanalytics']),ENT_COMPAT, 'ISO-8859-1');
         $geral->codigochat = htmlentities(stripslashes($row['codigochat']),ENT_COMPAT, 'ISO-8859-1');


         return $geral;
      }

      $this->conex = null;

      //addLog('geral','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM geral where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('geral','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>