const formulario = document.getElementById("formLogin");

formulario.addEventListener("submit", function (event) {

    event.preventDefault();

    const email = document.querySelector(
        'input[type="email"]'
    ).value;

    const senha = document.querySelector(
        'input[type="password"]'
    ).value;


    if (email === "" || senha === "") {

        alert("Preencha todos os campos");

        return;
    }


    if (senha.length < 6) {

        alert("A senha deve ter pelo menos 6 caracteres");

        return;
    }


    alert("Login realizado com sucesso!");

});