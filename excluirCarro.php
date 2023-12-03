<?php 
    include_once "conexao.php";
    $id = $_GET['id'];
    
    $sql = "DELETE FROM CARROS WHERE ID = $id";
    
    $result = $conexao->query($sql);
    header("Location: carros.php") 
?>