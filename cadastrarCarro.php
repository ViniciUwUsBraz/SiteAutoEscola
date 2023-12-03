<?php 

    include_once "conexao.php";
    $marca   = $_POST["marca"];
    $modelo  = $_POST["modelo"];
    $ano     = $_POST["ano"];
    $placa   = $_POST["placa"];
    $cap     = $_POST["capacidade"];

    $sql = "INSERT INTO CARROS(ID,MARCA,MODELO,ANO,PLACA,CAPACIDADE_PASSAGEIROS) VALUES(NULL, '$marca','$modelo','$ano','$placa','$cap')";

    $result = $conexao->query($sql);
    header("Location: carros.php")

?>