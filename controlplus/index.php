<?php
	session_start();
	if(isset($_SESSION['logado_controlplus'])){
		header("Location: home");
	}else{
		header("Location: login");	
	}
	
?>
