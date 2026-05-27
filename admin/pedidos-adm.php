<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: ../pages/login.php");
    exit;
}

require_once __DIR__ . '/../config/conexao.php';

$titulo = "Pedidos";

include '../components/head.php';

?>

<body>

    <?php include '../components/nav-adm.php'; ?>

    <section class="pedidos-admin">

        <h1>Pedidos Recebidos</h1>

        <div class="pedidos-grid">

            <?php

            $sql = "SELECT * FROM pedidos
    ORDER BY data_pedido DESC";

            $resultado = mysqli_query(
                $conexao,
                $sql
            );

            while ($pedido = mysqli_fetch_assoc($resultado)) {

            ?>

                <div class="pedido-card">

                    <h2>

                        Pedido #<?= $pedido['id']; ?>

                    </h2>

                    <p>

                        Cliente:
                        <?= $pedido['cliente']; ?>

                    </p>

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

                    <p>

                        Data:
                        <?= $pedido['data_pedido']; ?>

                    </p>

                    <form
                        action="alterarStatus.php"
                        method="POST">

                        <input
                            type="hidden"
                            name="id"
                            value="<?= $pedido['id']; ?>">

                        <select name="status">

                            <option
                                <?= $pedido['status'] == "Pendente" ? "selected" : "" ?>>

                                Pendente

                            </option>


                            <option
                                <?= $pedido['status'] == "Em preparo" ? "selected" : "" ?>>

                                Em preparo

                            </option>


                            <option
                                <?= $pedido['status'] == "Saiu para entrega" ? "selected" : "" ?>>

                                Saiu para entrega

                            </option>


                            <option
                                <?= $pedido['status'] == "Entregue" ? "selected" : "" ?>>

                                Entregue

                            </option>

                        </select>

                        <button
                            type="submit"
                            class="btn-status">

                            Atualizar

                        </button>

                    </form>

                </div>

            <?php } ?>

        </div>

    </section>

</body>

</html>