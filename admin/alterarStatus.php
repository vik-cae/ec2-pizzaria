<?php

require_once __DIR__ . '/../config/conexao.php';

$id = $_POST['id'];

$status = $_POST['status'];

$sql = "UPDATE pedidos SET

status='$status'

WHERE id='$id'";

mysqli_query(
    $conexao,
    $sql
);

echo "Cliente avisado com sucesso!";
