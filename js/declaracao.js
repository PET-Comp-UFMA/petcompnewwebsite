const botaoDeclaracao = document.querySelectorAll("#btnEmissao button");
const paineisDeclaracao = document.querySelectorAll(".painel-declaracao");


function ativarBotaoDeclaracao(botaoSelecionado) {
    botaoDeclaracao.forEach((botao) => {
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

function resetarDeclaracao() {
    declaracaoCard.classList.add("hidden");
    cardFormEmissao.classList.remove("hidden");
    cardFormValidacao.classList.remove("hidden");
    resultadoErro.classList.add("hidden");
    validacaoErro.classList.add("hidden");
}

botaoDeclaracao.forEach((botao) => {
    botao.addEventListener("click", () => {
        ativarBotaoDeclaracao(botao);
        prepararTrocaComponenteDeclaracao(botao.dataset.declaracaoTab);
        resetarDeclaracao();
    });
});

function configurarValidacaoBotao(seletorForm, seletorBotao) {

    const form = document.querySelector(seletorForm);
    const botao = document.querySelector(seletorBotao);

    if (!form || !botao) {
        return;
    }

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

    verificarCampos();
}

const inputCpf = document.getElementById("cpf");

if (inputCpf) {

    inputCpf.addEventListener("input", (e) => {

        let valor = e.target.value.replace(/\D/g, "");

        valor = valor.slice(0, 11);

        valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
        valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
        valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

        e.target.value = valor;
    });


    inputCpf.addEventListener("keydown", (e) => {

        const teclasPermitidas = [
            "Backspace",
            "Delete",
            "ArrowLeft",
            "ArrowRight",
            "Tab"
        ];

        if (!/\d/.test(e.key) && !teclasPermitidas.includes(e.key)) {
            e.preventDefault();
        }
    });
}

const inputMatricula = document.getElementById("Matricula");

if (inputMatricula) {

    inputMatricula.addEventListener("input", (e) => {

        let valor = e.target.value.replace(/\D/g, "");

        valor = valor.slice(0, 11);

        e.target.value = valor;
    });


    inputMatricula.addEventListener("keydown", (e) => {

        const teclasPermitidas = [
            "Backspace",
            "Delete",
            "ArrowLeft",
            "ArrowRight",
            "Tab"
        ];

        if (!/\d/.test(e.key) && !teclasPermitidas.includes(e.key)) {
            e.preventDefault();
        }
    });
}

const inputCodigo = document.getElementById("numValidacao");

if (inputCodigo) {

    if (inputCodigo) {

        inputCodigo.addEventListener("input", (e) => {

            let valor = e.target.value;

            valor = valor.slice(0, 50);

            e.target.value = valor;
        });
    }
}

prepararTrocaComponenteDeclaracao("emissao");

configurarValidacaoBotao(
    "#form-emissao",
    "#btnverificar"
);

configurarValidacaoBotao(
    "#form-validacao",
    "#btnvalidar"
);

const cardFormEmissao = document.querySelector('[data-painel="emissao"] .card-form');
const cardFormValidacao = document.querySelector('[data-painel="validacao"] .card-form');
const btnBaixarDeclaracao = document.getElementById("btn-baixar-declaracao");
const formEmissao = document.getElementById("form-emissao");
const formValidacao = document.getElementById("form-validacao");
const validacaoErro = document.getElementById("validacao-erro");
const resultadoErro = document.getElementById("resultado-erro");
const declaracaoCard = document.getElementById("declaracao-card");
const declaracaoNome = document.getElementById("declaracao-nome");
const declaracaoEntrada = document.getElementById("declaracao-entrada");
const declaracaoSaida = document.getElementById("declaracao-saida");
const declaracaoHoras = document.getElementById("declaracao-horas");
const declaracaoCodigo =document.getElementById("declaracao-codigo");

if (formEmissao) {

    formEmissao.addEventListener("submit", async (event) => {

        event.preventDefault();

        const cpf = inputCpf.value.trim();
        const matricula = inputMatricula.value.trim();

        const cpfNumeros = cpf.replace(/\D/g, "");

        console.log("CPF:", cpf);
        console.log("Matrícula:", matricula);


        // Limpa possíveis resultados anteriores
        resultadoErro.classList.add("hidden");
        resultadoErro.textContent = "";


        // Validação do CPF
        if (cpfNumeros.length !== 11) {

            resultadoErro.textContent = "CPF ou Matrícula inválido.";
            resultadoErro.classList.remove("hidden");

            return;
        }


        // Validação da matrícula
        if (matricula === "") {

            resultadoErro.textContent = "CPF ou Matrícula inválido.";
            resultadoErro.classList.remove("hidden");

            return;
        }


        try {

            const resposta = await fetch(
                "api/verificarDeclaracao.php",
                {
                    method: "POST",

                    headers: {
                        "Content-Type": "application/json"
                    },

                    body: JSON.stringify({
                        cpf: cpfNumeros,
                        matricula: matricula
                    })
                }
            );


            const dados = await resposta.json();

            console.log(dados);


            // Erro da própria API
            if (!dados.sucesso) {

                resultadoErro.textContent = dados.mensagem;
                resultadoErro.classList.remove("hidden");

                return;
            }


            // =================================
            // ALUNO APROVADO
            // =================================

            if (dados.resultado.aprovado) {

                const aluno = dados.resultado.aluno;


                // Esconde o formulário
                cardFormEmissao.classList.add("hidden");
                btnBaixarDeclaracao.classList.remove("hidden");

                // Preenche os dados da declaração
                declaracaoNome.textContent = aluno.nome;

                declaracaoEntrada.textContent =
                    aluno.entrada || "--/--/--";

                declaracaoSaida.textContent =
                    aluno.saida || "--/--/--";

                declaracaoHoras.textContent =
                    aluno.horas_pet || "0";

                // Mostra a declaração
                declaracaoCard.classList.remove("hidden");

            }


            // =================================
            // ALUNO NÃO APROVADO
            // =================================

            else {

                resultadoErro.innerHTML = "";

                dados.resultado.erros.forEach((erro) => {

                    const mensagem = document.createElement("div");

                    mensagem.textContent = `• ${erro}`;

                    resultadoErro.appendChild(mensagem);

                });

                resultadoErro.classList.remove("hidden");
            }

        }

        catch (erro) {

            console.error(erro);

            resultadoErro.textContent =
                "Ocorreu um erro ao realizar a verificação.";

            resultadoErro.classList.remove("hidden");
        }

    });

}

if(formValidacao){

    formValidacao.addEventListener("submit", async (event) =>{

        event.preventDefault();
        const codigo = inputCodigo.value.trim();

        console.log("CPF:", codigo);
        validacaoErro.classList.add("hidden");
        validacaoErro.textContent = "";

        if (codigo === "") {

            validacaoErro.textContent = "Preencha o campo.";
            validacaoErro.classList.remove("hidden");

            return;
        }

        try {

            const resposta = await fetch(
                "api/validarDeclaracao.php",
                {
                    method: "POST",

                    headers: {
                        "Content-Type": "application/json"
                    },

                    body: JSON.stringify({
                        codigo: codigo
                        
                    })
                }
            );


            const dados = await resposta.json();

            console.log(dados);

            if (!dados.sucesso) {
                validacaoErro.textContent = dados.mensagem;
                validacaoErro.classList.remove("hidden");
                return;
            }

            if (!dados.valida) {
                validacaoErro.textContent = dados.mensagem || "Declaração não encontrada.";
                validacaoErro.classList.remove("hidden");
                return;
            }

            if (dados.sucesso) {
                console.log("encontrado");
                const declaracao = dados.declaracao;


                // Esconde o formulário
                cardFormValidacao.classList.add("hidden");
                btnBaixarDeclaracao.classList.add("hidden");

                // Preenche os dados da declaração
                declaracaoNome.textContent = declaracao.nome;

                declaracaoEntrada.textContent =
                    declaracao.entrada || "--/--/--";

                declaracaoSaida.textContent =
                    declaracao.saida || "--/--/--";

                declaracaoHoras.textContent =
                    declaracao.horas_pet || "0";

                // Mostra a declaração
                declaracaoCard.classList.remove("hidden");

            }

            else {

                validacaoErro.innerHTML = "";

                dados.resultado.erros.forEach((erro) => {

                    const mensagem = document.createElement("div");

                    mensagem.textContent = `• ${erro}`;

                    validacaoErro.appendChild(mensagem);

                });

                validacaoErro.classList.remove("hidden");
            }

        }

        catch (erro) {

            console.error(erro);

            validacaoErro.textContent =
                "Ocorreu um erro ao realizar a verificação.";

            validacaoErro.classList.remove("hidden");
        }
    });
}