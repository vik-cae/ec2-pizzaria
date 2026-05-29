<?php

session_start();

require_once __DIR__ . '/../config/conexao.php';

$titulo = "Meu Pedido";

include '../components/head.php';

?>

<body>

    <?php include '../components/nav.php'; ?>

    <section class="acompanhar-pedido">

        <h1>

            Acompanhar Pedido

        </h1>

        <?php

        if (isset($_SESSION['ultimo_pedido'])) {

            $id = $_SESSION['ultimo_pedido'];

            $sql = "SELECT * FROM pedidos
WHERE id='$id'";

            $resultado = mysqli_query(
                $conexao,
                $sql
            );

            $pedido = mysqli_fetch_assoc(
                $resultado
            );

        ?>

            <div class="pedido-status-card">

                <h2>

                    Pedido #<?= $pedido['id']; ?>

                </h2>

                <p>

                    Total:
                    R$
                    <?= number_format(
                        $pedido['total'],
                        2,
                        ",",
                        "."
                    ); ?>

                </p>

                <div class="status-box">

                    <?= $pedido['status']; ?>

                </div>

            </div>

        <?php } else { ?>

            <div class="sem-pedido">

                <i class='bx bx-cart'></i>

                <h2>

                    Nenhum pedido em andamento

                </h2>

                <p>

                    Faça um pedido para acompanhar o status aqui.

                </p>

            </div>

        <?php } ?>

    </section>

</body>

</html>