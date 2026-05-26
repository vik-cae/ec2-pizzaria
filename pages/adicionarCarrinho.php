<?php

session_start();

$id = $_POST['id'];

if (!isset($_SESSION['carrinho'])) {

    $_SESSION['carrinho'] = [];
}

$_SESSION['carrinho'][] = $id;

/* mensagem */

$_SESSION['mensagem'] = "Produto adicionado ao carrinho!";

header("Location: ../index.php");

exit;
