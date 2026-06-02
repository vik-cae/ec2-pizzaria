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
                        type="button"
                        class="btn-finalizar"
                        onclick="abrirModal()">

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

    <div id="modalPedido" class="modal">

        <div class="modal-content">

            <span
                class="fechar"
                onclick="fecharModal()">

                &times;

            </span>

            <h2>Dados da Entrega</h2>

            <form
                action="finalizarPedido.php"
                method="POST">

                <input
                    type="text"
                    name="nome"
                    placeholder="Nome completo"
                    required>

                <input
                    type="tel"
                    placeholder="Telefone"
                    minlength="11"
                    maxlength="11"
                    pattern="[0-9]{11}"
                    oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                    required>


                <input
                    type="text"
                    name="endereco"
                    placeholder="Endereço completo"
                    required>

                <select
                    name="pagamento"
                    required>

                    <option value="">
                        Forma de pagamento
                    </option>

                    <option value="Pix">
                        Pix
                    </option>

                    <option value="Cartão">
                        Cartão
                    </option>

                    <option value="Dinheiro">
                        Dinheiro
                    </option>

                </select>

                <button
                    type="submit"
                    class="btn-confirmar">

                    Confirmar Pedido

                </button>

            </form>

        </div>

    </div>

    <script>
        function abrirModal() {

            document
                .getElementById("modalPedido")
                .style.display = "flex";
        }

        function fecharModal() {

            document
                .getElementById("modalPedido")
                .style.display = "none";
        }
    </script>

</body>