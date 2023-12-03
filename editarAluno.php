<?php
    include_once "conexao.php";
    
    $nome  = $_POST["nome"];
    $cpf   = $_POST["cpf"];
    $dtNas = $_POST["dtNas"];
    $end   = $_POST["end"];
    $tel   = $_POST["tel"];
    $id    = $_POST["edtId"];

    $sql = "UPDATE ALUNOS SET NOME='$nome', CPF='$cpf', DATA_NASCIMENTO='$dtNas', ENDERECO='$end', TELEFONE=$tel WHERE id=$id";
    $result = $conexao->query($sql);
    header("Location: alunos.php")

?>
