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
        <li><a href="#home">Home</a></li>
        <li><a href="#sobre">Sobre</a></li>
        <li><a href="#cardapio">Cardápio</a></li>
        <li><a href="#promocoes">Promoções</a></li>
        <li><a href="#contato">Contato</a></li>
    </ul>

    <div class="nav-right">

        <a href="./pages/pedido.php" class="carrinho">

            <i class='bx bx-cart'></i>

            <span id="contador-carrinho">
                <?= $totalCarrinho ?>
            </span>

        </a>

        <div class="nav-btn">

            <a href="./pages/login.php" class="btn-login">
                LOGIN
            </a>

            <a href="#" class="btn-pedido">
                PEÇA AGORA
            </a>


        </div>

    </div>
</nav>