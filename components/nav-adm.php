<?php

if (session_status() === PHP_SESSION_NONE) {

    session_start();
}

$totalCarrinho = 0;

if (isset($_SESSION['carrinho'])) {

    $totalCarrinho = count(
        $_SESSION['carrinho']
    );
}

?>

<nav class="navbar">

    <div class="logo">
        <h1>PIDA</h1>
        <span>Pizzaria Artesanal</span>
    </div>

    <ul class="menu">
        <li><a href="./../admin/dashboard.php">Home</a></li>
        <li><a href="./../admin/cadastrarProduto.php">Cadastrar Produto</a></li>
        <li><a href="./../admin/produtos.php">Ver Produtos</a></li>
        <li><a href="./../admin/pedidos-adm.php">Ver Pedidos</a></li>
        <li><a href="./../admin/logout.php">Sair</a></li>
    </ul>

   
</nav>