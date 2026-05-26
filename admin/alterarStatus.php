<?php

session_start();

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

header("Location: pedidos.php");

exit;
