<?php
$titulo = "PIDA";
include './components/head.php';
?>

<body>

    <?php include './components/nav.php'; ?>

    <!-- HOME -->
    <section id="home">
        <!-- banner -->
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


    <!-- CARDÁPIO -->
    <section id="cardapio" class="cardapio">

        <h2>Nosso Cardápio</h2>

        <div class="cards">

            <div class="pizza-card">

                <img src="./assets/img/calabre.jpg" alt="Pizza Calabresa">

                <div class="pizza-info">

                    <h3>Calabresa</h3>

                    <p>
                        Molho especial, queijo, cebola e calabresa.
                    </p>

                    <span>R$ 35,00</span>

                    <button class="btn-carrinho add-carrinho">
                        <i class='bx bx-cart-add'></i>
                        Adicionar
                    </button>

                </div>

            </div>


            <div class="pizza-card">

                <img src="./assets/img/portuguesa.jpg" alt="Pizza Portuguesa">

                <div class="pizza-info">

                    <h3>Portuguesa</h3>

                    <p>
                        Presunto, queijo, ovos, cebola e azeitonas.
                    </p>

                    <span>R$ 42,00</span>

                    <button class="btn-carrinho add-carrinho">
                        <i class='bx bx-cart-add'></i>
                        Adicionar
                    </button>

                </div>

            </div>


            <div class="pizza-card">

                <img src="./assets/img/frango.jpg" alt="Pizza Frango">

                <div class="pizza-info">

                    <h3>Frango Catupiry</h3>

                    <p>
                        Molho especial, frango desfiado, catupiry e queijo.
                    </p>

                    <span>R$ 40,00</span>

                    <button class="btn-carrinho add-carrinho">
                        <i class='bx bx-cart-add'></i>
                        Adicionar
                    </button>

                </div>

            </div>

        </div>

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

    <div id="mensagem-carrinho" class="mensagem-carrinho">

        <i class='bx bx-check-circle'></i>
        Produto adicionado ao carrinho!

    </div>

    <?php include './components/footer.php'; ?>

    <script src="./assets/js/carrinho.js"></script>
</body>