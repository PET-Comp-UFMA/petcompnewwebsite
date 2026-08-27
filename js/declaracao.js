const botoesDeclaracao = document.querySelectorAll("#btnEmissao button");

function ativarBotaoDeclaracao(botaoSelecionado) {
    botoesDeclaracao.forEach((botao) => {
        botao.classList.toggle("ativado", botao === botaoSelecionado);
        botao.classList.toggle("desativado", botao !== botaoSelecionado);
    });
}

function prepararTrocaComponenteDeclaracao(tipoSelecionado) {
    // TODO: implementar a troca do componente exibido abaixo da selecao.
    // tipoSelecionado pode ser "emissao" ou "validacao".
}

botoesDeclaracao.forEach((botao) => {
    botao.addEventListener("click", () => {
        ativarBotaoDeclaracao(botao);
        prepararTrocaComponenteDeclaracao(botao.dataset.declaracaoTab);
    });
});
