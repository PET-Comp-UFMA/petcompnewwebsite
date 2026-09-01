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
    const teclasPermitidas = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
    if (!/\d/.test(e.key) && !teclasPermitidas.includes(e.key)) {
        e.preventDefault();
    }
});

// Máscara e bloqueio de letras no campo Matrícula
const inputMatricula = document.getElementById('Matricula');

inputMatricula.addEventListener('input', (e) => {
    let valor = e.target.value.replace(/\D/g, ''); // remove tudo que não é número
    valor = valor.slice(0, 11); // limita a 11 dígitos
    e.target.value = valor;
});

inputMatricula.addEventListener('keydown', (e) => {
    const teclasPermitidas = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
    if (!/\d/.test(e.key) && !teclasPermitidas.includes(e.key)) {
        e.preventDefault();
    }
});

prepararTrocaComponenteDeclaracao("emissao");
configurarValidacaoBotao("#form-emissao", "#btnverificar");
configurarValidacaoBotao("#form-validacao", "#btnvalidar");