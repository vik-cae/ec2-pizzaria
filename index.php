<?php
session_start();

$titulo = "PIDA";
include './components/head.php';
?>

<body>

    <?php include './components/nav.php'; ?>

    <!-- HOME -->
    <section id="home">

        <div class="hero-text">

            <span>Pizzas artesanais</span>

            <h1>
                Pizzas frescas, feitas para você
            </h1>

            <p>
                Ingredientes selecionados e sabores preparados
                especialmente para cada pedido.
            </p>

            <a href="#" class="btn-home">
                Fazer Pedido
            </a>

        </div>

        <div class="hero-img">

            <img src="./assets/img/fundo.jpg">

        </div>

    </section>


    <!-- SOBRE -->
    <section id="sobre" class="sobre">

        <h1>Sobre a PIDA</h1>

        <p>
            A PIDA nasceu para oferecer pizzas artesanais
            com ingredientes frescos e sabor único.
        </p>

    </section>


    <h1>Cardapio</h1>
    
    <!-- CARDÁPIO -->
    <section id="cardapio" class="cardapio">

        <?php

        include './config/conexao.php';

        $sql = "SELECT * FROM produtos";

        $resultado = mysqli_query(
            $conexao,
            $sql
        );

        while ($produto = mysqli_fetch_assoc($resultado)) {

        ?>


            <div class="card">

                <img
                    src="./assets/img/<?= $produto['imagem']; ?>"
                    alt="<?= $produto['nome']; ?>">

                <h3>

                    <?= $produto['nome']; ?>

                </h3>

                <p>

                    <?= $produto['descricao']; ?>

                </p>

                <span>

                    R$ <?= number_format($produto['preco'], 2, ",", "."); ?>

                </span>


                <form action="./pages/adicionarCarrinho.php" method="POST">

                    <input
                        type="hidden"
                        name="id"
                        value="<?= $produto['id']; ?>">

                    <button
                        type="submit"
                        class="btn-carrinho">

                        Adicionar ao carrinho

                    </button>

                </form>

            </div>

        <?php } ?>

    </section>


    <!-- PROMOÇÕES -->
    <section id="promocoes" class="promocoes">

        <div class="promo-img">

            <img src="./assets/img/promo.jpg" alt="Promoção Pizza">

        </div>


        <div class="promo-info">

            <span>Oferta especial</span>

            <h2>Combo Família</h2>

            <p>
                Aproveite nossa promoção especial:
                2 pizzas grandes + refrigerante 2L
                por um preço exclusivo.
            </p>

            <h3>R$ 120,90</h3>

            <button class="btn-promo">

                Pedir agora

            </button>

        </div>

    </section>


    <!-- CONTATO -->
    <section id="contato" class="contato">

        <div class="contato-box">

            <div class="contato-info">

                <span>Fale conosco</span>

                <h2>Entre em contato</h2>

                <p>
                    Tem alguma dúvida, sugestão ou pedido especial?
                    Envie uma mensagem para nossa equipe.
                </p>

            </div>


            <form class="form-contato">

                <div class="input-group">

                    <i class='bx bx-user'></i>

                    <input
                        type="text"
                        placeholder="Seu nome"
                        required>

                </div>


                <div class="input-group">

                    <i class='bx bx-envelope'></i>

                    <input
                        type="email"
                        placeholder="Seu email"
                        required>

                </div>


                <div class="input-group">

                    <i class='bx bx-phone'></i>

                    <input
                        type="tel"
                        placeholder="Telefone"
                        minlength="11"
                        maxlength="11"
                        pattern="[0-9]{11}"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        required>

                </div>

                <div class="input-group textarea-group">

                    <i class='bx bx-message-detail'></i>

                    <textarea
                        placeholder="Digite sua mensagem"
                        required></textarea>

                </div>


                <button type="submit">

                    Enviar mensagem

                </button>

            </form>

        </div>

    </section>


    <!-- MENSAGEM CARRINHO -->

    <?php if (isset($_SESSION['mensagem'])) { ?>

        <div id="mensagem-carrinho" class="mensagem-carrinho ativo">

            <i class='bx bx-check-circle'></i>

            <?= $_SESSION['mensagem']; ?>

        </div>

        <?php unset($_SESSION['mensagem']); ?>

    <?php } ?>


    <?php include './components/footer.php'; ?>


    <script>
        setTimeout(() => {

            const mensagem =
                document.getElementById(
                    "mensagem-carrinho"
                );

            if (mensagem) {

                mensagem.style.opacity = "0";

                setTimeout(() => {

                    mensagem.style.display = "none";

                }, 500);

            }

        }, 3000);
    </script>

</body>

</html>