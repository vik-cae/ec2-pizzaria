<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: ../pages/login.php");
    exit;
}

require_once __DIR__ . '/../config/conexao.php';

$titulo = "Pedidos Recebidos";

include '../components/head.php';

?>

<body>

    <?php include '../components/nav-adm.php'; ?>

    <section class="pedidos-admin">

        <div class="topo-pedidos">

            <div>

                <span class="subtitulo">

                    Painel de Pedidos

                </span>

                <h1>

                    Pedidos Recebidos

                </h1>

            </div>

        </div>


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

                    <div class="pedido-topo">

                        <h2>

                            Pedido #<?= $pedido['id']; ?>

                        </h2>

                        <span class="status">

                            <?= $pedido['status']; ?>

                        </span>

                    </div>


                    <div class="pedido-info">

                        <p>

                            <strong>Cliente:</strong>

                            <?= $pedido['cliente']; ?>

                        </p>

                        <p>

                            <strong>Total:</strong>

                            R$
                            <?= number_format(
                                $pedido['total'],
                                2,
                                ",",
                                "."
                            ); ?>

                        </p>

                        <p>

                            <strong>Data:</strong>

                            <?= date(
                                "d/m/Y H:i",
                                strtotime($pedido['data_pedido'])
                            ); ?>

                        </p>

                    </div>


                    <form
                        action="./alterarStatus.php"
                        method="POST"
                        class="form-status">

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

                            Atualizar Status

                        </button>

                    </form>

                </div>

            <?php } ?>

        </div>

    </section>


    <script>
        const formularios = document.querySelectorAll(".form-status");

        formularios.forEach(form => {

            form.addEventListener("submit", async (e) => {

                e.preventDefault();

                const formData = new FormData(form);

                const resposta = await fetch(
                    "./alterarStatus.php", {
                        method: "POST",
                        body: formData
                    }
                );

                const texto = await resposta.text();

                mostrarMensagem(texto);

            });

        });


        function mostrarMensagem(msg) {

            const div = document.createElement("div");

            div.classList.add("msg-status");

            div.innerText = msg;

            document.body.appendChild(div);

            setTimeout(() => {

                div.remove();

            }, 4000);

        }
    </script>

</body>

</html>
