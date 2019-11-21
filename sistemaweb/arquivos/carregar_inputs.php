<?php

include("config.php");

$query = "SELECT id_instituicao, nome FROM instituicao WHERE status = 'Ativo'"; 
$result = mysqli_query($connect, $query);

$instituicao = "<option value=''>-- Selecione -- </option>";

while($row = mysqli_fetch_array($result)) {
	$instituicao .= "<option value='".$row["id_instituicao"]."'>".$row["nome"]."</option>";
}

$instituicao .= "</select>";


$query = "SELECT id_curso, nome FROM curso WHERE status = 'Ativo'"; 
$result = mysqli_query($connect, $query);

$curso = "<option value=''>-- Selecione -- </option>";

while($row = mysqli_fetch_array($result)) {
	$curso .= "<option value='".$row["id_curso"]."'>".$row["nome"]."</option>";
}

$curso .= "</select>";

$response['instituicao'] = $instituicao;
$response['curso'] = $curso;

echo json_encode($response);

?>
