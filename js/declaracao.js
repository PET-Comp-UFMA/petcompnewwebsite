const botoesDeclaracao = document.querySelectorAll("#btnEmissao button");
const paineisDeclaracao = document.querySelectorAll(".painel-declaracao");

// NOVO: guarda as funções verificarCampos de cada formulário,
// pra conseguir reavaliar o estado dos botões depois de limpar os campos.
const verificadoresDeCampos = [];

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

// NOVO: limpa campos e mensagens das duas abas.
function limparDeclaracao() {
    document.getElementById("form-emissao").reset();
    document.getElementById("form-validacao").reset();

    document.getElementById("msg-emissao").textContent = "";
    document.getElementById("msg-validacao").textContent = "";

    // reset() não dispara o evento "input", então reavaliamos manualmente
    // pra os botões "Verificar" voltarem a ficar desabilitados.
    verificadoresDeCampos.forEach((verificar) => verificar());
}

botoesDeclaracao.forEach((botao) => {
    botao.addEventListener("click", () => {
        // NOVO: só limpa se realmente estiver trocando de aba
        // (clicar na aba que já está aberta não apaga o que a pessoa digitou)
        const trocouDeAba = !botao.classList.contains("ativado");

        ativarBotaoDeclaracao(botao);
        prepararTrocaComponenteDeclaracao(botao.dataset.declaracaoTab);

        if (trocouDeAba) {
            limparDeclaracao();
        }
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

    // NOVO: registra pra poder ser chamada ao limpar os campos
    verificadoresDeCampos.push(verificarCampos);
}

// Máscara e bloqueio de letras no campo CPF
const inputCpf = document.getElementById('cpf');

inputCpf.addEventListener('input', (e) => {
    let valor = e.target.value.replace(/\D/g, ''); // remove tudo que não é número
    valor = valor.slice(0, 11); // limita a 11 dígitos

    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    e.target.value = valor;
});

inputCpf.addEventListener('keydown', (e) => {
    if (e.ctrlKey || e.metaKey) return; 

    const teclasPermitidas = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
    if (!/\d/.test(e.key) && !teclasPermitidas.includes(e.key)) {
        e.preventDefault();
    }
});

// Máscara e bloqueio de letras no campo Matrícula
const inputMatricula = document.getElementById('Matricula');

inputMatricula.addEventListener('input', (e) => {
    let valor = e.target.value.replace(/\D/g, ''); // remove tudo que não é número
    valor = valor.slice(0, 15); // limita a 11 dígitos
    e.target.value = valor;
});

inputMatricula.addEventListener('keydown', (e) => {
    if (e.ctrlKey || e.metaKey) return; // libera Ctrl+V, Ctrl+C, Ctrl+A, etc.

    const teclasPermitidas = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
    if (!/\d/.test(e.key) && !teclasPermitidas.includes(e.key)) {
        e.preventDefault();
    }
});

prepararTrocaComponenteDeclaracao("emissao");
configurarValidacaoBotao("#form-emissao", "#btnverificar");
configurarValidacaoBotao("#form-validacao", "#btnvalidar");