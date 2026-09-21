// Inclua este arquivo DEPOIS do declaracao.js na página:
// <script src="js/declaracao-backend.js" defer></script>
//
// Requer 2 <div> novas no HTML (uma em cada painel) pra mostrar feedback:
//   painel emissao:   <div id="msg-emissao"></div>
//   painel validacao: <div id="msg-validacao"></div>

document.addEventListener('DOMContentLoaded', () => {

    // ---------------- EMISSÃO ----------------
    const inputCpf       = document.getElementById('cpf');
    const inputMatricula = document.getElementById('Matricula');
    const btnVerificar   = document.getElementById('btnverificar');
    const msgEmissao     = document.getElementById('msg-emissao');

    function mostrarMsg(el, texto, tipo) {
        if (!el) return;
        el.textContent = texto;
        el.style.color = tipo === 'erro' ? '#d92d20' : '#027a48';
        el.style.marginTop = '12px';
        el.style.textAlign = 'center';
    }

    btnVerificar?.addEventListener('click', async (e) => {
        e.preventDefault();
        if (btnVerificar.disabled) return; // respeita a validação de campos preenchidos que já existe

        const cpf = inputCpf.value;
        const matricula = inputMatricula.value;

        const textoOriginal = btnVerificar.textContent;
        btnVerificar.disabled = true;
        btnVerificar.textContent = 'Verificando...';
        mostrarMsg(msgEmissao, '', 'ok');

        try {
            const respElegibilidade = await fetch('api/verificar_elegibilidade.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ cpf, matricula }),
            });
            const elegibilidade = await respElegibilidade.json();

            if (!elegibilidade.ok) {
                mostrarMsg(msgEmissao, elegibilidade.erro || 'Não foi possível verificar a elegibilidade.', 'erro');
                return;
            }

            // Elegível: já dispara a geração e download do PDF
            btnVerificar.textContent = 'Gerando declaração...';
            const respPdf = await fetch('api/gerar_declaracao.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ cpf, matricula }),
            });

            if (!respPdf.ok) {
                mostrarMsg(msgEmissao, await respPdf.text(), 'erro');
                return;
            }

            const blob = await respPdf.blob();
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'declaracao.pdf';
            a.click();
            URL.revokeObjectURL(url);

            mostrarMsg(msgEmissao, `Declaração gerada com sucesso, ${elegibilidade.nome.split(' ')[0]}!`, 'ok');

        } catch (err) {
            mostrarMsg(msgEmissao, 'Erro de conexão. Tente novamente.', 'erro');
        } finally {
            btnVerificar.disabled = false;
            btnVerificar.textContent = textoOriginal;
        }
    });

    // ---------------- VALIDAÇÃO ----------------
    const inputNumValidacao = document.getElementById('numValidacao');
    const btnValidar        = document.getElementById('btnvalidar');
    const msgValidacao      = document.getElementById('msg-validacao');

    btnValidar?.addEventListener('click', async (e) => {
        e.preventDefault();
        if (btnValidar.disabled) return;

        const numero = inputNumValidacao.value;
        const textoOriginal = btnValidar.textContent;
        btnValidar.disabled = true;
        btnValidar.textContent = 'Verificando...';

        try {
            const resp = await fetch('api/validar_documento.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ numero }),
            });
            const data = await resp.json();

            if (!data.ok) {
                mostrarMsg(msgValidacao, data.erro || 'Erro ao validar.', 'erro');
            } else if (data.valido) {
                mostrarMsg(msgValidacao, `Documento autêntico — emitido para ${data.nome} em ${data.emitido_em}.`, 'ok');
            } else {
                mostrarMsg(msgValidacao, 'Documento não encontrado. Confira o número digitado.', 'erro');
            }
        } catch (err) {
            mostrarMsg(msgValidacao, 'Erro de conexão. Tente novamente.', 'erro');
        } finally {
            btnValidar.disabled = false;
            btnValidar.textContent = textoOriginal;
        }
    });
});
