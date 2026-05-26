<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: ../pages/login.php");
    exit;
}

require_once __DIR__ . '/../config/conexao.php';

if (isset($_POST['nome']) && isset($_FILES['imagem'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $imagem = $_FILES['imagem']['name'];

    $caminhoTemporario = $_FILES['imagem']['tmp_name'];

    move_uploaded_file(
        $caminhoTemporario,
        "../assets/img/" . $imagem
    );


    $sql = "INSERT INTO produtos
    (nome, descricao, preco, imagem)

    VALUES

    ('$nome','$descricao','$preco','$imagem')";

    mysqli_query(
        $conexao,
        $sql
    );

    echo "<script>

    alert('Produto cadastrado com sucesso');

    </script>";
}

$titulo = "Cadastrar Produto";

include '../components/head.php';

?>

<body>

    <?php include '../components/nav.php'; ?>

    <section class="cadastro-produto">

        <div class="produto-container">

            <h1>Cadastrar Produto</h1>

            <form method="POST" enctype="multipart/form-data">
                <div class="campo">

                    <label>Nome</label>

                    <input
                        type="text"
                        name="nome"
                        required>

                </div>


                <div class="campo">

                    <label>Descrição</label>

                    <textarea
                        name="descricao"
                        required></textarea>

                </div>


                <div class="campo">

                    <label>Preço</label>

                    <input
                        type="number"
                        step="0.01"
                        name="preco"
                        required>

                </div>


                <div class="campo">

                    <label>Imagem</label>

                    <input
                        type="file"
                        name="imagem"
                        accept="image/*"
                        required>

                </div>


                <button type="submit" class="btn-cadastrar">

                    Cadastrar Produto

                </button>
            </form>

        </div>

    </section>

</body>

</html>