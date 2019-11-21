<?php
include("config.php");

$id = $_POST['hidden_instituicao_id'];
$type = $_POST['t'];

if($type == "instituicao"){
    $id = $_POST['hidden_instituicao_id'];
    $query = "DELETE FROM instituicao WHERE id_instituicao = '$id'";
} else if($type == "curso"){
    $id = $_POST['hidden_curso_id'];
    $query = "DELETE FROM curso WHERE id_curso = '$id'";
} else {
    $id = $_POST['hidden_aluno_id'];
    $query = "DELETE FROM  aluno WHERE id_aluno = '$id'";
}

if (!$result = mysqli_query($connect, $query)) {
    exit(mysqli_error());
}