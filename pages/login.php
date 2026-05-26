<?php
session_start();

$titulo = "Login";

include '../components/head.php';
require_once __DIR__ . '/../config/conexao.php';

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios
            WHERE email='$email'
            AND senha='$senha'";

    $resultado = mysqli_query(
        $conexao,
        $sql
    );


    if (mysqli_num_rows($resultado) > 0) {

        $_SESSION['usuario'] = $email;

        header("Location: ../admin/dashboard.php");

        exit;
    } else {

        echo "<script>

        alert('Email ou senha inválidos');

        </script>";
    }
}
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


                <form id="formLogin" method="POST">

                    <div class="input-login">

                        <i class='bx bx-envelope'></i>

                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            required>

                    </div>


                    <div class="input-login">

                        <i class='bx bx-lock-alt'></i>

                        <input
                            type="password"
                            name="senha"
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