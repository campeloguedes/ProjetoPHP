<?php 
class PDOConnectionFactory{

public $con = null;
public $dbType = "mysql"; 
public $host = "localhost"; 
public $user = "sebrae_mysql_2017"; 
public $senha = "Sebrae@2017"; 
public $db = "feitonotocantins"; 
public $persistent = false; 

public function PDOConnectionFactory( $persistent=false ){ 
if( $persistent != false){ $this->persistent = true; }  } 

public function getConnection(){ 
try{ 
$this->con = new PDO($this->dbType.":host=".$this->host.";dbname=".$this->db, $this->user, $this->senha, 
array( PDO::ATTR_PERSISTENT => $this->persistent ) ); 
return $this->con; 
}catch ( PDOException $ex ){ echo "Erro: getConnection() ".$ex->getMessage();  
} 
} 

public function Close(){ 
if( $this->con != null ) 
$this->con = null;
}
}
?>