<?php

include("config.php");

$t = $_POST['t'];

if($t == "instituicao"){
	$nome = $_POST['nome_instituicao'];
	$cnpj = $_POST['cnpj_instituicao'];
	$status = $_POST['status_instituicao'];
	$id = $_POST['hidden_instituicao_id'];

	$sql = "UPDATE 
				instituicao 
			SET 
				nome = '$nome',
				cnpj = '$cnpj', 
				status = '$status'
			WHERE id_instituicao = '$id'";

} else if ($t == "curso") {
	$nome = $_POST['nome_curso'];
	$duracao = $_POST['duracao_curso'];
	$status = $_POST['status_curso'];
	$id_instituicao = $_POST['instituicao_curso'];
	$id = $_POST['hidden_curso_id'];

	$sql = "UPDATE 
				curso 
			SET 
				nome = '$nome', 
				id_instituicao = '$id_instituicao', 
				duracao = '$duracao', 
				status = '$status'
			WHERE id_curso = '$id'";

} else {
	$nome = $_POST['nome_aluno'];
	$cpf = $_POST['cpf_aluno'];
	$data_nasc = $_POST['nascimento_aluno'];
	$curso = $_POST['curso_aluno'];
	$email = $_POST['email_aluno'];
	$celular = $_POST['celular_aluno'];
	$bairro = $_POST['bairro_aluno'];
	$uf = $_POST['uf_aluno'];
	$cidade = $_POST['cidade_aluno'];
	$endereco = $_POST['endereco_aluno'];
	$numero =  $_POST['numero_aluno'];
	$status = $_POST['status_aluno'];
	$id = $_POST['hidden_aluno_id'];

	$sql = "UPDATE 
				aluno 
			SET
				nome = '$nome',
				cpf = '$cpf',
				data_nasc = '$data_nasc',
				id_curso = '$curso',
				email = '$email', 
				celular = '$celular', 
				bairro = '$bairro', 
				uf = '$uf', 
				cidade = '$cidade', 
				endereco = '$endereco', 
				numero = '$numero',
				status = '$status'
			WHERE id_aluno = '$id'";
}

if (!$result = mysqli_query($connect, $sql)) {
	exit(mysqli_error());
}


?>