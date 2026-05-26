<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: ../pages/login.php");
    exit;
}

require_once __DIR__ . '/../config/conexao.php';

$titulo = "Produtos";

include '../components/head.php';

?>

<body>

    <?php include '../components/nav.php'; ?>

    <section class="produtos-admin">

        <h1>Produtos Cadastrados</h1>

        <div class="produtos-grid">

            <?php

            $sql = "SELECT * FROM produtos";
            $resultado = mysqli_query(
                $conexao,
                $sql
            );

            if (!$resultado) {

                die("Erro SQL: " . mysqli_error($conexao));
            }
            while ($produto = mysqli_fetch_assoc($resultado)) {

            ?>

                <div class="produto-card">

                    <img
                        src="../assets/img/<?= $produto['imagem']; ?>"
                        alt="<?= $produto['nome']; ?>">

                    <div class="produto-info">

                        <h3>

                            <?= $produto['nome']; ?>

                        </h3>

                        <p>

                            <?= $produto['descricao']; ?>

                        </p>

                        <span>

                            R$ <?= number_format($produto['preco'], 2, ",", "."); ?>

                        </span>

                        <div class="acoes">

                            <a
                                href="editarProduto.php?id=<?= $produto['id']; ?>"
                                class="editar">

                                Editar

                            </a>


                            <a
                                href="excluirProduto.php?id=<?= $produto['id']; ?>"
                                class="excluir">

                                Excluir

                            </a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </section>

</body>

</html>