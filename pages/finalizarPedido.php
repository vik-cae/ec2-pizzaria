<?php

session_start();

require_once __DIR__ . '/../config/conexao.php';

if (
    !isset($_SESSION['carrinho']) ||
    count($_SESSION['carrinho']) == 0
) {

    header("Location: pedido.php");
    exit;
}

$total = 0;


/* calcular total */

foreach ($_SESSION['carrinho'] as $id) {

    $sql = "SELECT * FROM produtos
    WHERE id='$id'";

    $resultado = mysqli_query(
        $conexao,
        $sql
    );

    $produto = mysqli_fetch_assoc(
        $resultado
    );

    if ($produto) {

        $total += $produto['preco'];
    }
}


/* salvar pedido */

$sqlPedido = "INSERT INTO pedidos
(cliente,total)

VALUES

('Cliente',$total)";

mysqli_query(
    $conexao,
    $sqlPedido
);

$pedidoId =
    mysqli_insert_id(
        $conexao
    );

$_SESSION['ultimo_pedido'] = $pedidoId;


/* salvar produtos do pedido */

foreach ($_SESSION['carrinho'] as $id) {

    $sqlProduto = "INSERT INTO pedido_produtos
    (pedido_id,produto_id)

    VALUES

    ('$pedidoId','$id')";

    mysqli_query(
        $conexao,
        $sqlProduto
    );
}


/* limpar carrinho */

unset(
    $_SESSION['carrinho']
);

$_SESSION['mensagem'] =
    "Pedido realizado com sucesso!";


header(
    "Location: ../index.php"
);

exit;
