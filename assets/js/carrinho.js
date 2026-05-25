let contador = 0;

const botoes = document.querySelectorAll(".add-carrinho");

const contadorCarrinho = document.getElementById("contador-carrinho");

const mensagem = document.getElementById("mensagem-carrinho");


botoes.forEach(botao => {

    botao.addEventListener("click", () => {

        contador++;

        contadorCarrinho.innerText = contador;


        // mostra mensagem
        mensagem.classList.add("ativo");


        // esconde depois de 3 segundos
        setTimeout(() => {

            mensagem.classList.remove("ativo");

        }, 3000);

    });

});