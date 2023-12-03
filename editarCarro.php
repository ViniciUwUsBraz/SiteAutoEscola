<?php

    include_once "conexao.php";
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $ano = $_POST["ano"];
    $placa = $_POST["placa"];
    $cap = $_POST["capacidade"];
    $id = $_POST["edtId"];

    $sql = "UPDATE CARROS SET MARCA='$marca', MODELO='$modelo', ANO=$ano, PLACA='$placa', CAPACIDADE_PASSAGEIROS=$cap WHERE id=$id";
    
    $result = $conexao->query($sql);
    header("Location: carros.php")

?>