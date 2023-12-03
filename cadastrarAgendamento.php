<?php 
    include_once "conexao.php";

    $idA = $_POST["idA"];
    $idC = $_POST["idC"];
    $dt  = $_POST["dt"];
    $hr  = $_POST["hr"];

    $sql = "INSERT INTO AGENDAMENTOS(ID,ALUNO_ID,CARRO_ID,DATA_AULA,HORARIO_AULA) VALUES (NULL,'$idA','$idC','$dt','$hr')";

    $result = $conexao->query($sql);
    header("Location: agendamentos.php")

?>