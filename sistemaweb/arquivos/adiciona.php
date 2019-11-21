<?php

include("config.php");

$t = $_POST['t'];

if($t == "instituicao"){
	$nome = $_POST['nome_instituicao'];
	$cnpj = $_POST['cnpj_instituicao'];
	$status = $_POST['status_instituicao'];

	$sql = "INSERT INTO instituicao (nome, cnpj, status) VALUES ('$nome', '$cnpj', '$status')";

} else if ($t == "curso") {
	$nome = $_POST['nome_curso'];
	$duracao = $_POST['duracao_curso'];
	$status = $_POST['status_curso'];
	$id_instituicao = $_POST['instituicao_curso'];

	$sql = "INSERT INTO curso (nome, id_instituicao, duracao, status) VALUES ('$nome', '$id_instituicao', '$duracao', '$status')";

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
	$numero = $_POST['numero_aluno'];
	$status = $_POST['status_aluno'];

	$sql = "INSERT INTO 
				aluno 
					(nome, 
					cpf, 
					data_nasc, 
					id_curso, 
					email, 
					celular,
					bairro, 
					uf, 
					cidade, 
					endereco,
					numero, 
					status) 
				VALUES 
					('$nome', 
					'$cpf', 
					'$data_nasc', 
					'$curso', 
					'$email', 
					'$celular', 
					'$bairro', 
					'$uf', 
					'$cidade', 
					'$endereco', 
					'$numero',
					'$status')";
}

echo $sql;
if (!$result = mysqli_query($connect, $sql)) {
	exit(mysqli_error());
}


?>