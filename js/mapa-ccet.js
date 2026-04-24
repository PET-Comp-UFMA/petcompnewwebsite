// 1. Configurações Iniciais do Mapa
const map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -1,
    maxZoom: 2
});

const limitesDaImagem = [[0, 0], [800, 1000]]; 

// 2. Criando os Grupos de Camadas para cada andar
const marcadoresTerreo = L.layerGroup();
const marcadoresAndar1 = L.layerGroup();

// Organizando os dados dos andares para facilitar o acesso
const dadosAndares = {
    'terreo': { url: 'assets/svg/mapa-ccet1.svg', marcadores: marcadoresTerreo },
    'andar1': { url: 'plantas/1_andar.svg', marcadores: marcadoresAndar1 },
};

// Banco de dados das salas
const locaisCCET = [
    { id: 'b2', nome: 'Bloco 2 - Laboratório de Software', andar: 'terreo', categoria: 'laboratorio', coordenadas: [300, 250] },
    { id: 'b3', nome: 'Bloco 3 - Sala de Aula', andar: 'terreo', categoria: 'sala', coordenadas: [400, 300] },
    { id: 'b5', nome: 'Bloco 5 - Laboratório de Hardware', andar: 'terreo', categoria: 'laboratorio', coordenadas: [350, 450] },
    { id: 'sala101', nome: 'Sala 101 - Teórica', andar: 'andar1', categoria: 'sala', coordenadas: [300, 250] },
    { id: 'auditorioA', nome: 'Auditório Principal', andar: 'terreo', categoria: 'auditorio', coordenadas: [500, 400] }
];

const marcadoresLeaflet = [];
let andarAtual = 'terreo';
let categoriaAtual = 'todos';

// 3. Função para criar os marcadores e guardá-los nos GRUPOS (LayerGroups)
function inicializarMarcadores() {
    locaisCCET.forEach(local => {
        let marker = L.marker(local.coordenadas).bindPopup(`<b>${local.nome}</b>`);
        
        marcadoresLeaflet.push({
            dados: local,
            instanciaMarker: marker
        });

        // IMPORTANTE: Adiciona o pino ao grupo do andar correspondente (não direto no mapa)
        if (dadosAndares[local.andar]) {
            dadosAndares[local.andar].marcadores.addLayer(marker);
        }
    });
}

// Inicializa a imagem de fundo e adiciona o grupo do térreo ao mapa
let camadaImagemAtual = L.imageOverlay(dadosAndares['terreo'].url, limitesDaImagem).addTo(map);
map.fitBounds(limitesDaImagem);
marcadoresTerreo.addTo(map); 

// Chama a função para criar todos os pinos
inicializarMarcadores();

// 4. A Mágica da Busca (Agora trabalhando junto com os Grupos)
function executarBusca() {
    const inputElement = document.getElementById('input-busca');
    if (!inputElement) return;
    
    const textoDigitado = inputElement.value.toLowerCase();

    marcadoresLeaflet.forEach(item => {
        // Só analisa os pinos do andar atual
        if (item.dados.andar === andarAtual) {
            
            const grupoDoAndar = dadosAndares[andarAtual].marcadores;

            // REGRA 1: O nome da sala bate com o texto digitado?
            const passaTexto = item.dados.nome.toLowerCase().includes(textoDigitado);
            
            // REGRA 2: A categoria da sala bate com o filtro clicado? (Se for 'todos', passa direto)
            const passaCategoria = (categoriaAtual === 'todos' || item.dados.categoria === categoriaAtual);

            // Só mostra no mapa se passar nas DUAS regras
            if (passaTexto && passaCategoria) {
                grupoDoAndar.addLayer(item.instanciaMarker);
            } else {
                grupoDoAndar.removeLayer(item.instanciaMarker);
            }
        }
    });
}

window.filtrarCategoria = function(categoriaDesejada, elementoBotao) {
    // A. Atualiza a variável global
    categoriaAtual = categoriaDesejada;

    // B. Atualiza o visual dos botões (tira o azul de todos e bota no que foi clicado)
    document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('ativo'));
    elementoBotao.classList.add('ativo');

    // C. Re-executa a busca para aplicar a nova regra no mapa
    executarBusca();
};

// Ativa a busca toda vez que o usuário digita
document.getElementById('input-busca').addEventListener('input', executarBusca);

// 5. Função de Trocar Andar (Corrigida)
window.mudarAndar = function(idAndar, elementoBotao) {
    // A. Troca a planta baixa (imagem)
    camadaImagemAtual.setUrl(dadosAndares[idAndar].url);

    // B. Remove o grupo de pinos do andar antigo
    map.removeLayer(dadosAndares[andarAtual].marcadores);

    // C. ATUALIZA A VARIÁVEL GLOBAL 
    andarAtual = idAndar;

    // D. Adiciona o grupo de pinos do novo andar
    map.addLayer(dadosAndares[andarAtual].marcadores);

    // E. Re-executa a busca (caso o usuário tenha trocado de andar com texto já digitado na busca)
    executarBusca();

    // F. Atualiza as cores dos botões
    document.querySelectorAll('.btn-andar').forEach(btn => btn.classList.remove('ativo'));
    if(elementoBotao) {
        elementoBotao.classList.add('ativo');
    } else if (event && event.target) {
        event.target.classList.add('ativo');
    }
};

// comentarios feitos com ajuda do Gemini