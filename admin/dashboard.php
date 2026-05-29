<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: ../pages/login.php");
    exit;
}

require_once __DIR__ . '/../config/conexao.php';

$totalProdutos = mysqli_num_rows(
    mysqli_query($conexao, "SELECT * FROM produtos")
);

$totalPedidos = mysqli_num_rows(
    mysqli_query($conexao, "SELECT * FROM pedidos")
);

$totalPendentes = mysqli_num_rows(
    mysqli_query(
        $conexao,
        "SELECT * FROM pedidos WHERE status='Pendente'"
    )
);

$soma = mysqli_query(
    $conexao,
    "SELECT SUM(total) AS total_vendas FROM pedidos"
);

$totalVendas = mysqli_fetch_assoc($soma);

$titulo = "Dashboard ADM";

include '../components/head.php';

?>

<body>

    <?php include '../components/nav-adm.php'; ?>

    <section class="dashboard">

        <div class="dashboard-topo">

            <div>

                <span class="subtitulo">

                    Painel Administrativo

                </span>

                <h1>

                    Bem-vindo ao Dashboard

                </h1>

            </div>

            <a href="logout.php" class="btn-sair">

                Sair

            </a>

        </div>


        <div class="cards-dashboard">

            <div class="card-dashboard">

                <div class="icone-card">

                    <i class='bx bx-pizza'></i>

                </div>

                <div>

                    <span>Total Produtos</span>

                    <h2>

                        <?= $totalProdutos ?>

                    </h2>

                </div>

            </div>


            <div class="card-dashboard">

                <div class="icone-card">

                    <i class='bx bx-cart'></i>

                </div>

                <div>

                    <span>Total Pedidos</span>

                    <h2>

                        <?= $totalPedidos ?>

                    </h2>

                </div>

            </div>


            <div class="card-dashboard">

                <div class="icone-card">

                    <i class='bx bx-time'></i>

                </div>

                <div>

                    <span>Pedidos Pendentes</span>

                    <h2>

                        <?= $totalPendentes ?>

                    </h2>

                </div>

            </div>


            <div class="card-dashboard destaque">

                <div class="icone-card">

                    <i class='bx bx-dollar-circle'></i>

                </div>

                <div>

                    <span>Total em Vendas</span>

                    <h2>

                        R$ <?= number_format($totalVendas['total_vendas'] ?? 0, 2, ',', '.') ?>

                    </h2>

                </div>

            </div>

        </div>


        <div class="acoes-dashboard">

            <a href="./cadastrarProduto.php" class="box-acao">

                <i class='bx bx-plus-circle'></i>

                <h3>

                    Cadastrar Produto

                </h3>

                <p>

                    Adicione novas pizzas e bebidas.

                </p>

            </a>


            <a href="./produtos.php" class="box-acao">

                <i class='bx bx-food-menu'></i>

                <h3>

                    Ver Produtos

                </h3>

                <p>

                    Gerencie os produtos cadastrados.

                </p>

            </a>


            <a href="./pedidos-adm.php" class="box-acao">

                <i class='bx bx-package'></i>

                <h3>

                    Ver Pedidos

                </h3>

                <p>

                    Acompanhe os pedidos realizados.

                </p>

            </a>

        </div>

    </section>

</body>

</html>