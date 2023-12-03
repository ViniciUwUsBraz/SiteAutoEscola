<?php 

    include_once "conexao.php";

    $nome  = $_POST["nome"];
    $cpf   = $_POST["cpf"];
    $dtNas = $_POST["dtNas"];
    $end   = $_POST["end"];
    $tel   = $_POST["tel"];

    $sql = "INSERT INTO ALUNOS(ID,NOME,CPF,DATA_NASCIMENTO,ENDERECO,TELEFONE) VALUES(NULL, '$nome','$cpf','$dtNas','$end','$tel')";

    $result = $conexao->query($sql);
    header("Location: alunos.php")
?>