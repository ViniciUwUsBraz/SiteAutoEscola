<?php
include_once "conexao.php";
$id = $_GET['id'];

$sql = "DELETE FROM AGENDAMENTOS WHERE ID = $id";
$result = $conexao->query($sql);
header("Location: agendamentos.php"); 


