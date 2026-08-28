const botoesDeclaracao = document.querySelectorAll("#btnEmissao button");
const paineisDeclaracao = document.querySelectorAll(".painel-declaracao");


function ativarBotaoDeclaracao(botaoSelecionado) {
    botoesDeclaracao.forEach((botao) => {
        botao.classList.toggle("ativado", botao === botaoSelecionado);
        botao.classList.toggle("desativado", botao !== botaoSelecionado);
    });
}

function prepararTrocaComponenteDeclaracao(tipoSelecionado) {
    paineisDeclaracao.forEach((painel) => {
            const visivel = painel.dataset.painel === tipoSelecionado;
            painel.classList.toggle("hidden", !visivel);
        });
}

botoesDeclaracao.forEach((botao) => {
    botao.addEventListener("click", () => {
        ativarBotaoDeclaracao(botao);
        prepararTrocaComponenteDeclaracao(botao.dataset.declaracaoTab);
    });
});

function configurarValidacaoBotao(seletorForm, seletorBotao) {
    const form = document.querySelector(seletorForm);
    const botao = document.querySelector(seletorBotao);
    const campos = form.querySelectorAll("input");

    function verificarCampos() {
        const todosPreenchidos = Array.from(campos).every(
            (campo) => campo.value.trim() !== ""
        );
        botao.classList.toggle("ativo", todosPreenchidos);
        botao.disabled = !todosPreenchidos;
    }

    campos.forEach((campo) => {
        campo.addEventListener("input", verificarCampos);
    });

    verificarCampos(); // estado inicial ao carregar a página
}

prepararTrocaComponenteDeclaracao("emissao");
configurarValidacaoBotao("#form-emissao", "#btnverificar");
configurarValidacaoBotao("#form-validacao", "#btnvalidar");
