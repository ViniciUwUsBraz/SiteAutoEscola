<?php 
    include_once "conexao.php";
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM CARROS WHERE ID = $id";

    $result = $conexao->query($sql);
    echo $result[0];

    //header("Location: carros.php") 
?>