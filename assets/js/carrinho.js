
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
