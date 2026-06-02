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

        <li>
            <a href="/ec2-pizzaria/index.php">
                Home
            </a>
        </li>

        <li>
            <a href="/ec2-pizzaria/index.php#sobre">
                Sobre
            </a>
        </li>

        <li>
            <a href="/ec2-pizzaria/index.php#cardapio">
                Cardápio
            </a>
        </li>

        <li>
            <a href="/ec2-pizzaria/index.php#promocoes">
                Promoções
            </a>
        </li>

        <li>
            <a href="/ec2-pizzaria/index.php#contato">
                Contato
            </a>
        </li>

        <li>
            <a href="/ec2-pizzaria/pages/meuPedido.php">
                Acompanhar Pedido
            </a>
        </li>

    </ul>

    <div class="nav-right">

        <a
            href="/ec2-pizzaria/pages/pedido.php"
            class="carrinho">

            <i class='bx bx-cart'></i>

            <span id="contador-carrinho">

                <?= $totalCarrinho ?>

            </span>

        </a>

        <div class="nav-btn">

            <a
                href="/ec2-pizzaria/pages/login.php"
                class="btn-login">

                LOGIN

            </a>

            <a
                href="#"
                class="btn-pedido"
                onclick="abrirMenuPedido(); return false;">

                PEÇA AGORA

            </a>

        </div>

    </div>

</nav>


<!-- MODAL PEDIDO -->

<div id="menuPedido" class="modal-pedido">

    <div class="modal-pedido-conteudo">

        <span
            class="fechar-modal"
            onclick="fecharMenuPedido()">

            &times;

        </span>

        <h2>O que deseja fazer?</h2>

        <a
            href="/ec2-pizzaria/index.php#cardapio"
            class="opcao-menu">

            🍕 Ver Cardápio

        </a>

        <a
            href="/ec2-pizzaria/pages/pedido.php"
            class="opcao-menu">

            🛒 Meu Carrinho

        </a>

        <a
            href="/ec2-pizzaria/pages/meuPedido.php"
            class="opcao-menu">

            📦 Acompanhar Pedido

        </a>

    </div>

</div>


<script>
    function abrirMenuPedido() {

        document
            .getElementById("menuPedido")
            .style.display = "flex";
    }

    function fecharMenuPedido() {

        document
            .getElementById("menuPedido")
            .style.display = "none";
    }

    window.onclick = function(event) {

        const modal =
            document.getElementById("menuPedido");

        if (event.target === modal) {

            fecharMenuPedido();
        }
    }
</script>