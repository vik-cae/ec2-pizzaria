<?php
$titulo = "Login";
include '../components/head.php';
?>

<body>

    <?php include '../components/nav.php'; ?>

    <section class="login">

        <div class="login-container">

            <div class="login-img">

                <img src="../assets/img/backgr.jpg" alt="Pizza">

            </div>


            <div class="login-box">

                <span>Bem-vindo</span>

                <h2>Entrar</h2>

                <p>
                    Faça login para acompanhar seus pedidos.
                </p>

                <form id="formLogin">

                    <div class="input-login">

                        <i class='bx bx-envelope'></i>

                        <input
                            type="email"
                            placeholder="Email"
                            required>

                    </div>


                    <div class="input-login">

                        <i class='bx bx-lock-alt'></i>

                        <input
                            type="password"
                            placeholder="Senha"
                            required>

                    </div>

                    <button type="submit">
                        Entrar
                    </button>

                </form>

            </div>

        </div>

    </section>

    <?php include '../components/footer.php'; ?>

</body>

</html>