<?php

	include("config.php");
	
    $type = $_GET['t'];

	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	if($type == "instituicao"){
		$columns = array( 
			0 => 'id_instituicao',
			1 => 'nome',
			2 => 'cnpj',
			3 => 'status'
		);

		$sql = "SELECT
					*
				FROM 
					instituicao";

	} else if ($type == "curso") {
		$columns = array( 
			0 => 'id_curso',
			1 => 'nome',
			2 => 'duracao',
			3 => 'id_instituicao',
			4 => 'status'
		);

		$sql = "SELECT 
				    t1.id_curso,
				    t1.nome,
				    t1.duracao,
				    t2.nome as 'instituicao',
				    t1.status
				FROM
				    curso t1 
				INNER JOIN 
					instituicao t2 on t1.id_instituicao = t2.id_instituicao";
	} else {
		$columns = array( 
			0 => 'id_aluno',
			1 => 'nome',
			2 => 'cpf',
			3 => 'data_nasc',
			4 => 'email',
			5 => 'celular',
			6 => 'endereco',
			7 => 'bairro',
			8 => 'cidade',
			9 => 'uf',
			10 => 'curso',
			11 => 'status'
		);
		$sql = "SELECT 
					t1.id_aluno,
					t1.nome,
				    t1.cpf,
				    t1.data_nasc,
				    t1.email,
				    t1.celular,
				    concat(t1.endereco, t1.numero) ,
				    t1.bairro,
				    t1.cidade,
				    t1.uf,
				    t2.nome as 'curso',
				    t1.status
				FROM
				    aluno t1
				        INNER JOIN
				    curso t2 ON t1.id_curso = t2.id_curso";
	}

	$queryTot = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($connect, $sql) or die("Nenhum cliente encontrado");

	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data
			);
	echo json_encode($json_data);

?>