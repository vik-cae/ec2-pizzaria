<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: ../pages/login.php");
    exit;
}

require_once __DIR__ . '/../config/conexao.php';

$id = $_GET['id'];


/* apagar vínculos do produto nos pedidos */

$sqlPedidoProduto = "DELETE FROM pedido_produtos
WHERE produto_id='$id'";

mysqli_query(
    $conexao,
    $sqlPedidoProduto
);


/* apagar produto */

$sqlProduto = "DELETE FROM produtos
WHERE id='$id'";

mysqli_query(
    $conexao,
    $sqlProduto
);

header("Location: produtos.php");

exit;

?>