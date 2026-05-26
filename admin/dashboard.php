<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: ../pages/login.php");
    exit;
}

$titulo = "Dashboard";

include '../components/head.php';

?>

<body>

    <?php include '../components/nav.php'; ?>

    <div style="padding:100px;">

        <h1>Painel Administrativo</h1>

        <p>
            Bem-vindo,
            <?= $_SESSION['usuario']; ?>
        </p>

        <br>

        <div class="admin-menu">

            <a href="cadastrarProduto.php">

                Cadastrar Produto

            </a>

            <a href="produtos.php">

                Ver Produtos

            </a>

            <a href="pedidos-adm.php">

                Ver Pedidos

            </a>

            <a href="logout.php">

                Sair

            </a>

        </div>

    </div>

</body>

</html>