<?php
	header("Content-Type: text/html; charset=ISO-8859-1",true);
	
	if(isset($_POST['valida-compra'])){
		
		$nome = addslashes(utf8_decode($_POST['nome']));
		$telefone = addslashes(utf8_decode($_POST['telefone']));
		$email = addslashes(utf8_decode($_POST['email']));
		$endereco = addslashes(utf8_decode($_POST['endereco']));
		$num = addslashes(utf8_decode($_POST['num']));
		$bairro = addslashes(utf8_decode($_POST['bairro']));
		$cep = addslashes(utf8_decode($_POST['cep']));
		$uf = addslashes(utf8_decode($_POST['estado']));
		$cidade = addslashes(utf8_decode($_POST['cidade']));
		
		$tabela = $_POST['tabela'];
		$chave = $_POST['chave'];
		$qtd = $_POST['qtd'];
		$parcelas = $_POST['parcelas'];
		$preco = $_POST['preco'];
		
		if($nome == "" || $telefone == "" || $email == "" || $endereco == "" || $num == "" || $bairro == "" || $cep == "" || $uf == "" || $cidade == "" || $parcelas == "" || $qtd == ""){
			echo "mp*0*Você deve preencher todos os campos";
			return;
		}
		
		
		if(!is_numeric($qtd)){
			echo "mp*0*Campo -Quantidade- deve ser numérico";
			return; 
		}
		
		if($qtd < 1){
			echo "mp*0*Campo -Quantidade- deve ser maior que zero";
			return; 
		}
		
		if(!is_numeric($parcelas)){
			echo "mp*0*Campo -Parcelas- deve ser numérico";
			return; 
		}
		
		if($parcelas < 1 || $parcelas > 3){
			echo "mp*0*Campo -Parcelas- deve ser entre 1 e 3";
			return; 
		}
		
		@require_once("controller/ClienteController.class.php");
		$clienteController = new ClienteController();
		$cliente->nome = $nome;
		$cliente->telefone = $telefone;
		$cliente->email = $email;
		$cliente->endereco = $endereco . ', '.$num;
		$cliente->bairro = $bairro;
		$cliente->cep = $cep;
		$cliente->estado = $uf;
		$cliente->cidade = $cidade;
		
		$str = $clienteController->salvar($cliente);
		$arr = explode("*", $str);
		$idcliente = $arr[1];
		
		echo "mp*1*".$idcliente."*".money_reverse(money($preco)*$qtd)."*".$parcelas;
		
		
	}