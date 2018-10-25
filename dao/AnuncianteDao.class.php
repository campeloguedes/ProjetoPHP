<?php 

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/dao/InterfaceDao.class.php'); 
require_once('mediaplus/controller/log.php'); 

class AnuncianteDao extends PDOConnectionFactory implements InterfaceDao{ 
 
   public $conex = null; 
 

   function AnuncianteDao(){ 
     $this->conex = PDOConnectionFactory::getConnection();  
   } 

   function salvar($anunciante){ 
     try{
      $stmt = $this->conex->prepare("INSERT INTO anunciante(titulo, telefone, whatsapp, email, endereco, bairro, cidade, googlemaps, logotipo, sexo, cpf, fantasia, cnpj, telefone1, telefone2, telefone3, oqueproduz, realizaentrega, formasdepagamento, atendeligacoes, frequenciaemail, autorizaosebrae, liberado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $stmt->bindValue(1, $anunciante->titulo); 
      $stmt->bindValue(2, $anunciante->telefone); 
      $stmt->bindValue(3, $anunciante->whatsapp); 
      $stmt->bindValue(4, $anunciante->email); 
      $stmt->bindValue(5, $anunciante->endereco); 
      $stmt->bindValue(6, $anunciante->bairro); 
      $stmt->bindValue(7, $anunciante->cidade); 
      $stmt->bindValue(8, $anunciante->googlemaps); 
      $stmt->bindValue(9, $anunciante->logotipo); 
      $stmt->bindValue(10, $anunciante->sexo); 
      $stmt->bindValue(11, $anunciante->cpf); 
      $stmt->bindValue(12, $anunciante->fantasia); 
      $stmt->bindValue(13, $anunciante->cnpj); 
      $stmt->bindValue(14, $anunciante->telefone1); 
      $stmt->bindValue(15, $anunciante->telefone2); 
      $stmt->bindValue(16, $anunciante->telefone3); 
      $stmt->bindValue(17, $anunciante->oqueproduz); 
      $stmt->bindValue(18, $anunciante->realizaentrega); 
      $stmt->bindValue(19, $anunciante->formasdepagamento); 
      $stmt->bindValue(20, $anunciante->atendeligacoes); 
      $stmt->bindValue(21, $anunciante->frequenciaemail); 
      $stmt->bindValue(22, $anunciante->autorizaosebrae); 
      $stmt->bindValue(23, $anunciante->liberado); 

      $stmt->execute();
      $lastid = $this->conex->lastInsertId();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
         addLog('anunciante','salvar',$lastid);
        return $lastid;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizar($anunciante){ 
     try{
      $stmt = $this->conex->prepare("Update anunciante set titulo = ?, telefone = ?, whatsapp = ?, email = ?, endereco = ?, bairro = ?, cidade = ?, googlemaps = ?, logotipo = ?, sexo = ?, cpf = ?, fantasia = ?, cnpj = ?, telefone1 = ?, telefone2 = ?, telefone3 = ?, oqueproduz = ?, realizaentrega = ?, formasdepagamento = ?, atendeligacoes = ?, frequenciaemail = ?, autorizaosebrae = ?, liberado = ? where idanunciante = ?");

      $stmt->bindValue(1, $anunciante->titulo); 
      $stmt->bindValue(2, $anunciante->telefone); 
      $stmt->bindValue(3, $anunciante->whatsapp); 
      $stmt->bindValue(4, $anunciante->email); 
      $stmt->bindValue(5, $anunciante->endereco); 
      $stmt->bindValue(6, $anunciante->bairro); 
      $stmt->bindValue(7, $anunciante->cidade); 
      $stmt->bindValue(8, $anunciante->googlemaps); 
      $stmt->bindValue(9, $anunciante->logotipo); 
      $stmt->bindValue(10, $anunciante->sexo); 
      $stmt->bindValue(11, $anunciante->cpf); 
      $stmt->bindValue(12, $anunciante->fantasia); 
      $stmt->bindValue(13, $anunciante->cnpj); 
      $stmt->bindValue(14, $anunciante->telefone1); 
      $stmt->bindValue(15, $anunciante->telefone2); 
      $stmt->bindValue(16, $anunciante->telefone3); 
      $stmt->bindValue(17, $anunciante->oqueproduz); 
      $stmt->bindValue(18, $anunciante->realizaentrega); 
      $stmt->bindValue(19, $anunciante->formasdepagamento); 
      $stmt->bindValue(20, $anunciante->atendeligacoes); 
      $stmt->bindValue(21, $anunciante->frequenciaemail); 
      $stmt->bindValue(22, $anunciante->autorizaosebrae); 
      $stmt->bindValue(23, $anunciante->liberado); 
      $stmt->bindValue(24, $anunciante->idanunciante); 

      $stmt->execute();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('anunciante','atualizar', $anunciante->idanunciante);
        return $anunciante->idanunciante;
      }else
        return 0;
     }catch ( PDOException $ex ){ 
        return 0; 
      }

   } 
 
   function atualizarCampo($field, $value, $where){ 
     try{
      $stmt = $this->conex->prepare("Update anunciante set $field = ? where $where");
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
      $stmt = $this->conex->query("SELECT anunciante.idanunciante as idanunciante, anunciante.titulo as titulo, anunciante.telefone as telefone, anunciante.whatsapp as whatsapp, anunciante.email as email, anunciante.endereco as endereco, anunciante.bairro as bairro, anunciante.cidade as cidade, anunciante.googlemaps as googlemaps, anunciante.logotipo as logotipo, anunciante.sexo as sexo, anunciante.cpf as cpf, anunciante.fantasia as fantasia, anunciante.cnpj as cnpj, anunciante.telefone1 as telefone1, anunciante.telefone2 as telefone2, anunciante.telefone3 as telefone3, anunciante.oqueproduz as oqueproduz, anunciante.realizaentrega as realizaentrega, anunciante.formasdepagamento as formasdepagamento, anunciante.atendeligacoes as atendeligacoes, anunciante.frequenciaemail as frequenciaemail, anunciante.autorizaosebrae as autorizaosebrae, anunciante.liberado as liberado FROM anunciante"); 
 
      $anunciantes = new ArrayObject();

      foreach($stmt as $row){
         $anunciante = new anunciante(); 

         $anunciante->idanunciante = htmlentities(stripslashes($row['idanunciante']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->whatsapp = htmlentities(stripslashes($row['whatsapp']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->sexo = htmlentities(stripslashes($row['sexo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cpf = htmlentities(stripslashes($row['cpf']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->fantasia = htmlentities(stripslashes($row['fantasia']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cnpj = htmlentities(stripslashes($row['cnpj']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone1 = htmlentities(stripslashes($row['telefone1']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone2 = htmlentities(stripslashes($row['telefone2']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone3 = htmlentities(stripslashes($row['telefone3']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->oqueproduz = htmlentities(stripslashes($row['oqueproduz']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->realizaentrega = htmlentities(stripslashes($row['realizaentrega']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->formasdepagamento = htmlentities(stripslashes($row['formasdepagamento']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->atendeligacoes = htmlentities(stripslashes($row['atendeligacoes']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->frequenciaemail = htmlentities(stripslashes($row['frequenciaemail']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->autorizaosebrae = htmlentities(stripslashes($row['autorizaosebrae']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->liberado = htmlentities(stripslashes($row['liberado']),ENT_COMPAT, 'ISO-8859-1');


         $anunciantes->append($anunciante);
      }

      $this->conex = null;

      //addLog('anunciante','listarTodos',0);
      return $anunciantes;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarPorId($id){ 
     try{
      $stmt = $this->conex->prepare("SELECT anunciante.idanunciante as idanunciante, anunciante.titulo as titulo, anunciante.telefone as telefone, anunciante.whatsapp as whatsapp, anunciante.email as email, anunciante.endereco as endereco, anunciante.bairro as bairro, anunciante.cidade as cidade, anunciante.googlemaps as googlemaps, anunciante.logotipo as logotipo, anunciante.sexo as sexo, anunciante.cpf as cpf, anunciante.fantasia as fantasia, anunciante.cnpj as cnpj, anunciante.telefone1 as telefone1, anunciante.telefone2 as telefone2, anunciante.telefone3 as telefone3, anunciante.oqueproduz as oqueproduz, anunciante.realizaentrega as realizaentrega, anunciante.formasdepagamento as formasdepagamento, anunciante.atendeligacoes as atendeligacoes, anunciante.frequenciaemail as frequenciaemail, anunciante.autorizaosebrae as autorizaosebrae, anunciante.liberado as liberado FROM anunciante where idanunciante = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      foreach($stmt as $row){
         $anunciante = new anunciante(); 

         $anunciante->idanunciante = htmlentities(stripslashes($row['idanunciante']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->whatsapp = htmlentities(stripslashes($row['whatsapp']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->sexo = htmlentities(stripslashes($row['sexo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cpf = htmlentities(stripslashes($row['cpf']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->fantasia = htmlentities(stripslashes($row['fantasia']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cnpj = htmlentities(stripslashes($row['cnpj']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone1 = htmlentities(stripslashes($row['telefone1']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone2 = htmlentities(stripslashes($row['telefone2']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone3 = htmlentities(stripslashes($row['telefone3']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->oqueproduz = htmlentities(stripslashes($row['oqueproduz']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->realizaentrega = htmlentities(stripslashes($row['realizaentrega']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->formasdepagamento = htmlentities(stripslashes($row['formasdepagamento']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->atendeligacoes = htmlentities(stripslashes($row['atendeligacoes']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->frequenciaemail = htmlentities(stripslashes($row['frequenciaemail']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->autorizaosebrae = htmlentities(stripslashes($row['autorizaosebrae']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->liberado = htmlentities(stripslashes($row['liberado']),ENT_COMPAT, 'ISO-8859-1');


         $this->conex = null;

         addLog('anunciante','listarPorId',$id);
         return $anunciante;
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
         $s .= "(anunciante.idanunciante like $like or anunciante.titulo like $like or anunciante.telefone like $like or anunciante.whatsapp like $like or anunciante.email like $like or anunciante.endereco like $like or anunciante.bairro like $like or anunciante.cidade like $like or anunciante.logotipo like $like)";
      }

      $stmt = $this->conex->query("SELECT anunciante.idanunciante as idanunciante, anunciante.titulo as titulo, anunciante.telefone as telefone, anunciante.whatsapp as whatsapp, anunciante.email as email, anunciante.endereco as endereco, anunciante.bairro as bairro, anunciante.cidade as cidade, anunciante.logotipo as logotipo FROM anunciante where $s order by $order limit $limit"); 
 
      $anunciantes = new ArrayObject();

      foreach($stmt as $row){
         $anunciante = new anunciante(); 

         $anunciante->idanunciante = htmlentities(stripslashes($row['idanunciante']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->titulo = $row['titulo'] != '' ? htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $anunciante->telefone = $row['telefone'] != '' ? htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $anunciante->whatsapp = $row['whatsapp'] != '' ? htmlentities(stripslashes($row['whatsapp']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $anunciante->email = $row['email'] != '' ? htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $anunciante->endereco = $row['endereco'] != '' ? htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $anunciante->bairro = $row['bairro'] != '' ? htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1') : '____';
         $anunciante->cidade = $row['cidade'] != '' ? htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1') : '____';


         $anunciantes->append($anunciante);
      }

      $this->conex = null;

      //addLog('anunciante','listarTodos',0);
      return $anunciantes;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function excluir($id){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM anunciante where idanunciante = ?"); 
      $this->conex->beginTransaction();

      $stmt->bindValue(1, $id);
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        addLog('anunciante','excluir',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOrdenado($field){ 
     try{
      $stmt = $this->conex->query("SELECT anunciante.idanunciante as idanunciante, anunciante.titulo as titulo, anunciante.telefone as telefone, anunciante.whatsapp as whatsapp, anunciante.email as email, anunciante.endereco as endereco, anunciante.bairro as bairro, anunciante.cidade as cidade, anunciante.googlemaps as googlemaps, anunciante.logotipo as logotipo, anunciante.sexo as sexo, anunciante.cpf as cpf, anunciante.fantasia as fantasia, anunciante.cnpj as cnpj, anunciante.telefone1 as telefone1, anunciante.telefone2 as telefone2, anunciante.telefone3 as telefone3, anunciante.oqueproduz as oqueproduz, anunciante.realizaentrega as realizaentrega, anunciante.formasdepagamento as formasdepagamento, anunciante.atendeligacoes as atendeligacoes, anunciante.frequenciaemail as frequenciaemail, anunciante.autorizaosebrae as autorizaosebrae, anunciante.liberado as liberado FROM anunciante order by $field"); 
 
      $anunciantes = new ArrayObject();

      foreach($stmt as $row){
         $anunciante = new anunciante(); 

         $anunciante->idanunciante = htmlentities(stripslashes($row['idanunciante']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->whatsapp = htmlentities(stripslashes($row['whatsapp']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->sexo = htmlentities(stripslashes($row['sexo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cpf = htmlentities(stripslashes($row['cpf']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->fantasia = htmlentities(stripslashes($row['fantasia']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cnpj = htmlentities(stripslashes($row['cnpj']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone1 = htmlentities(stripslashes($row['telefone1']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone2 = htmlentities(stripslashes($row['telefone2']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone3 = htmlentities(stripslashes($row['telefone3']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->oqueproduz = htmlentities(stripslashes($row['oqueproduz']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->realizaentrega = htmlentities(stripslashes($row['realizaentrega']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->formasdepagamento = htmlentities(stripslashes($row['formasdepagamento']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->atendeligacoes = htmlentities(stripslashes($row['atendeligacoes']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->frequenciaemail = htmlentities(stripslashes($row['frequenciaemail']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->autorizaosebrae = htmlentities(stripslashes($row['autorizaosebrae']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->liberado = htmlentities(stripslashes($row['liberado']),ENT_COMPAT, 'ISO-8859-1');


         $anunciantes->append($anunciante);
      }

      $this->conex = null;

      //addLog('anunciante','listarOrdenado',0);
      return $anunciantes;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde($param){ 
     try{
      $stmt = $this->conex->query("SELECT anunciante.idanunciante as idanunciante, anunciante.titulo as titulo, anunciante.telefone as telefone, anunciante.whatsapp as whatsapp, anunciante.email as email, anunciante.endereco as endereco, anunciante.bairro as bairro, anunciante.cidade as cidade, anunciante.googlemaps as googlemaps, anunciante.logotipo as logotipo, anunciante.sexo as sexo, anunciante.cpf as cpf, anunciante.fantasia as fantasia, anunciante.cnpj as cnpj, anunciante.telefone1 as telefone1, anunciante.telefone2 as telefone2, anunciante.telefone3 as telefone3, anunciante.oqueproduz as oqueproduz, anunciante.realizaentrega as realizaentrega, anunciante.formasdepagamento as formasdepagamento, anunciante.atendeligacoes as atendeligacoes, anunciante.frequenciaemail as frequenciaemail, anunciante.autorizaosebrae as autorizaosebrae, anunciante.liberado as liberado FROM anunciante where $param"); 
 
      $anunciantes = new ArrayObject();

      foreach($stmt as $row){
         $anunciante = new anunciante(); 

         $anunciante->idanunciante = htmlentities(stripslashes($row['idanunciante']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->whatsapp = htmlentities(stripslashes($row['whatsapp']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->sexo = htmlentities(stripslashes($row['sexo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cpf = htmlentities(stripslashes($row['cpf']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->fantasia = htmlentities(stripslashes($row['fantasia']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cnpj = htmlentities(stripslashes($row['cnpj']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone1 = htmlentities(stripslashes($row['telefone1']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone2 = htmlentities(stripslashes($row['telefone2']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone3 = htmlentities(stripslashes($row['telefone3']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->oqueproduz = htmlentities(stripslashes($row['oqueproduz']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->realizaentrega = htmlentities(stripslashes($row['realizaentrega']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->formasdepagamento = htmlentities(stripslashes($row['formasdepagamento']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->atendeligacoes = htmlentities(stripslashes($row['atendeligacoes']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->frequenciaemail = htmlentities(stripslashes($row['frequenciaemail']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->autorizaosebrae = htmlentities(stripslashes($row['autorizaosebrae']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->liberado = htmlentities(stripslashes($row['liberado']),ENT_COMPAT, 'ISO-8859-1');


         $anunciantes->append($anunciante);
      }

      $this->conex = null;

      //addLog('anunciante','listarOnde',0);
      return $anunciantes;

     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 
   function listarOnde2($param){ 
     try{
      $stmt = $this->conex->query("SELECT anunciante.idanunciante as idanunciante, anunciante.titulo as titulo, anunciante.telefone as telefone, anunciante.whatsapp as whatsapp, anunciante.email as email, anunciante.endereco as endereco, anunciante.bairro as bairro, anunciante.cidade as cidade, anunciante.googlemaps as googlemaps, anunciante.logotipo as logotipo, anunciante.sexo as sexo, anunciante.cpf as cpf, anunciante.fantasia as fantasia, anunciante.cnpj as cnpj, anunciante.telefone1 as telefone1, anunciante.telefone2 as telefone2, anunciante.telefone3 as telefone3, anunciante.oqueproduz as oqueproduz, anunciante.realizaentrega as realizaentrega, anunciante.formasdepagamento as formasdepagamento, anunciante.atendeligacoes as atendeligacoes, anunciante.frequenciaemail as frequenciaemail, anunciante.autorizaosebrae as autorizaosebrae, anunciante.liberado as liberado FROM anunciante where $param"); 
 
      foreach($stmt as $row){
         $anunciante = new anunciante(); 

         $anunciante->idanunciante = htmlentities(stripslashes($row['idanunciante']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->titulo = htmlentities(stripslashes($row['titulo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone = htmlentities(stripslashes($row['telefone']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->whatsapp = htmlentities(stripslashes($row['whatsapp']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->email = htmlentities(stripslashes($row['email']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->endereco = htmlentities(stripslashes($row['endereco']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->bairro = htmlentities(stripslashes($row['bairro']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cidade = htmlentities(stripslashes($row['cidade']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->googlemaps = htmlentities(stripslashes($row['googlemaps']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->logotipo = htmlentities(stripslashes($row['logotipo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->sexo = htmlentities(stripslashes($row['sexo']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cpf = htmlentities(stripslashes($row['cpf']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->fantasia = htmlentities(stripslashes($row['fantasia']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->cnpj = htmlentities(stripslashes($row['cnpj']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone1 = htmlentities(stripslashes($row['telefone1']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone2 = htmlentities(stripslashes($row['telefone2']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->telefone3 = htmlentities(stripslashes($row['telefone3']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->oqueproduz = htmlentities(stripslashes($row['oqueproduz']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->realizaentrega = htmlentities(stripslashes($row['realizaentrega']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->formasdepagamento = htmlentities(stripslashes($row['formasdepagamento']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->atendeligacoes = htmlentities(stripslashes($row['atendeligacoes']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->frequenciaemail = htmlentities(stripslashes($row['frequenciaemail']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->autorizaosebrae = htmlentities(stripslashes($row['autorizaosebrae']),ENT_COMPAT, 'ISO-8859-1');
         $anunciante->liberado = htmlentities(stripslashes($row['liberado']),ENT_COMPAT, 'ISO-8859-1');


         return $anunciante;
      }

      $this->conex = null;

      //addLog('anunciante','listarOnde',0);
      return null;

     }catch ( PDOException $ex ){ 
        return null; 
      }

   } 
 
   function excluirOnde($param){ 
     try{
      $stmt = $this->conex->prepare("DELETE FROM anunciante where $param"); 
      $this->conex->beginTransaction();
      $stmt->execute();

      $this->conex->commit();
      $this->conex = null;

      if($stmt->errorCode()=='00000'){
        //addLog('anunciante','excluirOnde',$id);
        return true;
      }else
        return false;
     }catch ( PDOException $ex ){ 
        return false; 
      }

   } 
 

 } 
 
 ?>