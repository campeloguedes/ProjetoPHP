<?php

header("Content-Type: application/json");

if(	!empty($_POST) ){

	@require_once("controller/AnuncianteController.class.php");
	$anunciante = new Anunciante();

	$anunciante->liberado = 0;
	$anunciante->titulo = addslashes(utf8_decode($_POST[ 'titulo' ])); 
	$anunciante->telefone = addslashes(utf8_decode($_POST[ 'telefone' ])); 
	$anunciante->whatsapp = addslashes(utf8_decode($_POST[ 'whatsapp' ])); 
	$anunciante->email = addslashes(utf8_decode($_POST[ 'email' ])); 
	$anunciante->endereco = addslashes(utf8_decode($_POST[ 'endereco' ])); 
	$anunciante->bairro = addslashes(utf8_decode($_POST[ 'bairro' ])); 
	$anunciante->cidade = addslashes(utf8_decode($_POST[ 'cidade' ])); 
	$anunciante->googlemaps = addslashes(utf8_decode($_POST[ 'googlemaps' ])); 
	$anunciante->logotipo = addslashes(utf8_decode($_POST[ 'logotipo' ])); 
	$anunciante->cpf = addslashes(utf8_decode($_POST[ 'cpf' ])); 
	$anunciante->sexo = addslashes(utf8_decode($_POST[ 'sexo' ])); 
	$anunciante->fantasia = addslashes(utf8_decode($_POST[ 'fantasia' ])); 
	$anunciante->cnpj = addslashes(utf8_decode($_POST[ 'cnpj' ])); 
	$anunciante->telefone1 = addslashes(utf8_decode($_POST[ 'telefone1' ])); 
	$anunciante->telefone2 = addslashes(utf8_decode($_POST[ 'telefone2' ])); 
	$anunciante->telefone3 = addslashes(utf8_decode($_POST[ 'telefone3' ])); 
	$anunciante->oqueproduz = addslashes(utf8_decode($_POST[ 'oqueproduz' ])); 
	$anunciante->realizaentrega = addslashes(utf8_decode($_POST[ 'realizaentrega' ])); 
	$anunciante->formasdepagamento = addslashes(utf8_decode( join(",",$_POST[ 'formasdepagamento' ]) )); 
	$anunciante->atendeligacoes = addslashes(utf8_decode($_POST[ 'atendeligacoes' ])); 
	$anunciante->atendeligacoes = addslashes(utf8_decode($_POST[ 'atendeligacoes' ])); 
	$anunciante->frequenciaemail = addslashes(utf8_decode($_POST[ 'frequenciaemail' ])); 
	$anunciante->autorizaosebrae = addslashes(utf8_decode($_POST[ 'autorizaosebrae' ])); 
	

	$AnuncianteController = new AnuncianteController();
	$status = $AnuncianteController->salvar($anunciante);	
	$recup = explode("*",$status);
	
	if( !empty($recup[0]) ){

		$dados = array(
			'error' => '',
			'message' => 'Cadastro efetuado com sucesso!',
			'complement' => 'Clique abaixo para sair.',
			'callback' => $callback
		);

	} else {

		$dados = array(
			'error' => '1',
			'message' => 'Falha no cadastro.',
			'complement' => 'Verifique seus dados',
			'callback' => ''
		);

	}

	echo json_encode($dados);

}

?>