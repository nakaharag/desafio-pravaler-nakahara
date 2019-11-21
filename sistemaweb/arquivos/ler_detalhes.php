<?php
include("config.php");

if(isset($_POST['id']) && isset($_POST['id']) != "")
{

    $id = $_POST['id'];
    $type = $_POST['type'];

    if($type == "instituicao"){
        $query = "SELECT * FROM instituicao WHERE id_instituicao = '$id'";
    } else if($type == "curso"){
        $query = "SELECT 
                    t1.id_curso,
                    t1.nome,
                    t1.duracao,
                    t1.status
                FROM
                    curso t1 
                INNER JOIN 
                    instituicao t2 on t1.id_instituicao = t2.id_instituicao
                where t1.id_curso = '$id' ";
    } else {
        $query = "SELECT * FROM aluno t1 inner join curso t2 on t1.id_curso = t2.id_curso WHERE t1.id_aluno = '$id'";
    }

    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Dados não encontrados!";
    }

    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Requisição inválida!";
}