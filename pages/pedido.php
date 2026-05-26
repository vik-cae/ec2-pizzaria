<?php

session_start();

require_once __DIR__ . '/../config/conexao.php';

$titulo = "Carrinho";

include '../components/head.php';

$total = 0;

?>

<body>

    <?php include '../components/nav.php'; ?>

    <section class="carrinho-container">

        <h1>Meu Carrinho</h1>

        <?php

        if (
            isset($_SESSION['carrinho']) &&
            count($_SESSION['carrinho']) > 0
        ) {

            foreach ($_SESSION['carrinho'] as $key => $id) {

                $sql = "SELECT * FROM produtos
WHERE id='$id'";

                $resultado = mysqli_query(
                    $conexao,
                    $sql
                );

                $produto = mysqli_fetch_assoc(
                    $resultado
                );

                if (!$produto) {

                    continue;
                }

                $total += $produto['preco'];

        ?>

                <div class="item-carrinho">

                    <img
                        src="../assets/img/<?= $produto['imagem']; ?>"
                        alt="<?= $produto['nome']; ?>">

                    <div class="item-info">

                        <h3>

                            <?= $produto['nome']; ?>

                        </h3>

                        <p>

                            <?= $produto['descricao']; ?>

                        </p>

                        <span>

                            R$ <?= number_format(
                                    $produto['preco'],
                                    2,
                                    ",",
                                    "."
                                ); ?>

                        </span>

                    </div>

                    <a
                        href="removerCarrinho.php?id=<?= $key ?>"
                        class="btn-remover">

                        Remover

                    </a>

                </div>

            <?php } ?>

            <div class="total">

                <h2>

                    Total:
                    R$
                    <?= number_format(
                        $total,
                        2,
                        ",",
                        "."
                    ); ?>

                </h2>

                <form action="finalizarPedido.php" method="POST">

                    <button
                        type="submit"
                        class="btn-finalizar">

                        Finalizar Pedido

                    </button>

                </form>

            </div>

        <?php } else { ?>

            <h2>

                Seu carrinho está vazio

            </h2>

        <?php } ?>

    </section>

</body>

</html>