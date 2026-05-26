<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: ../pages/login.php");
    exit;
}

require_once __DIR__ . '/../config/conexao.php';

$id = $_GET['id'];


/* Buscar produto */

$sql = "SELECT * FROM produtos
WHERE id='$id'";

$resultado = mysqli_query(
    $conexao,
    $sql
);

$produto = mysqli_fetch_assoc($resultado);


/* Atualizar */

if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sqlAtualizar = "UPDATE produtos SET

    nome='$nome',
    descricao='$descricao',
    preco='$preco'

    WHERE id='$id'";

    mysqli_query(
        $conexao,
        $sqlAtualizar
    );

    header("Location: produtos.php");
    exit;
}

$titulo = "Editar Produto";

include '../components/head.php';
?>

<body>

    <?php include '../components/nav.php'; ?>

    <section class="cadastro-produto">

        <div class="produto-container">

            <h1>Editar Produto</h1>

            <form method="POST">

                <div class="campo">

                    <label>Nome</label>

                    <input
                        type="text"
                        name="nome"
                        value="<?= $produto['nome'] ?>"
                        required>

                </div>


                <div class="campo">

                    <label>Descrição</label>

                    <textarea
                        name="descricao"
                        required><?= $produto['descricao'] ?></textarea>

                </div>


                <div class="campo">

                    <label>Preço</label>

                    <input
                        type="number"
                        step="0.01"
                        name="preco"
                        value="<?= $produto['preco'] ?>"
                        required>

                </div>


                <button type="submit"
                    class="btn-cadastrar">

                    Salvar Alterações

                </button>

            </form>

        </div>

    </section>

</body>

</html>