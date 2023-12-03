<?php 
    include_once "conexao.php";
    $id = $_GET['id'];
    
    $sql = "DELETE FROM ALUNOS WHERE ID = $id";
    
    $result = $conexao->query($sql);
    header("Location: alunos.php") 
?>