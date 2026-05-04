const map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -2,
    maxZoom: 2
}); 

const limitesDaImagem = [[0, 0], [2898, 2634]];

const marcadoresTerreo = L.layerGroup();
const marcadoresAndar1 = L.layerGroup();

const dadosAndares = {
    'terreo': { url: 'img/mapa-ccet-T.svg', marcadores: marcadoresTerreo },
    'andar1': { url: 'img/mapa_ccet-1.jpg', marcadores: marcadoresAndar1 },
    'andar2': { url: 'img/mapa-ccet-2.jpg', marcadores: marcadoresAndar1 },
};

const iconeLaboratorio = L.divIcon({
    className: 'pino-customizado pino-lab',
    html: '<svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
    iconSize: [32, 32],    
    iconAnchor: [16, 16],  
    popupAnchor: [0, -16]   
});
const iconeSala = L.divIcon({
    className: 'pino-customizado pino-sala',
    html: '<svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeAuditorio = L.divIcon({
    className: 'pino-customizado pino-auditorio',
    html: '<svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeDA = L.divIcon({
    className: 'pino-customizado pino-da',
    html: '<svg viewBox="0 0 32 32" width="16" height="16"><text x="16" y="21" font-family="Arial, Helvetica, sans-serif" font-weight="bold" font-size="17" fill="currentColor" text-anchor="middle">DA</text></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconePETComp = L.divIcon({
    className: 'pino-customizado pino-petcomp',
    html: '<svg width="16" height="14.4" viewBox="0 0 600 540" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M75.7412 540L0 407.755L157.591 134.694L207.678 221.632L100.174 408.98L175.915 540H75.7412Z" fill="white"/><path d="M600 366.123L523.037 498.368H207.9L260.501 408H474.3L551.135 279.184L600 366.123Z" fill="white"/><path d="M183.176 0H335.88L492.249 273.061H393.296L284.572 86.9388H133.089L183.176 0Z" fill="white"/><path d="M261.3 134.694H157.591L236.928 273.061L157.522 410.204L207.9 498.368L287.015 362.449H435.9L492.249 273.061L337.101 273.061L261.3 134.694Z" fill="white"/></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeBiblioteca = L.divIcon({
    className: 'pino-customizado pino-biblioteca',
    html: '<svg width="16px" height="16px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title>ionicons-v5-l</title><rect x="32" y="96" width="64" height="368" rx="16" ry="16" style="fill:none;stroke:#ffffff;stroke-linejoin:round;stroke-width:32px"/><line x1="112" y1="224" x2="240" y2="224" style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><line x1="112" y1="400" x2="240" y2="400" style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><rect x="112" y="160" width="128" height="304" rx="16" ry="16" style="fill:none;stroke:#ffffff;stroke-linejoin:round;stroke-width:32px"/><rect x="256" y="48" width="96" height="416" rx="16" ry="16" style="fill:none;stroke:#ffffff;stroke-linejoin:round;stroke-width:32px"/><path d="M422.46,96.11l-40.4,4.25c-11.12,1.17-19.18,11.57-17.93,23.1l34.92,321.59c1.26,11.53,11.37,20,22.49,18.84l40.4-4.25c11.12-1.17,19.18-11.57,17.93-23.1L445,115C443.69,103.42,433.58,94.94,422.46,96.11Z" style="fill:none;stroke:#ffffff;stroke-linejoin:round;stroke-width:32px"/></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeEscada = L.divIcon({
    className: 'pino-customizado pino-escada',
    html: '<svg width="16px" height="16px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="0.5" fill="none" fill-rule="evenodd"><g id="Dribbble-Light-Preview" transform="translate(-60.000000, -7959.000000)" fill="#ffffff"><g id="icons" transform="translate(56.000000, 160.000000)"><path d="M22,7816 C22,7816.552 21.552,7817 21,7817 L7,7817 C6.448,7817 6,7816.552 6,7816 L6,7802 C6,7801.448 6.448,7801 7,7801 L9,7801 C9.552,7801 10,7801.448 10,7802 L10,7805 C10,7806.105 10.896,7807 12,7807 L15,7807 C15.552,7807 16,7807.448 16,7808 L16,7811 C16,7812.105 16.896,7813 18,7813 L21,7813 C21.552,7813 22,7813.448 22,7814 L22,7816 Z M22,7811 L19,7811 C18.448,7811 18,7810.552 18,7810 L18,7807 C18,7805.895 17.104,7805 16,7805 L12,7805 L12,7801 C12,7799.895 11.104,7799 10,7799 L6,7799 C4.896,7799 4,7799.895 4,7801 L4,7817 C4,7818.105 4.896,7819 6,7819 L22,7819 C23.104,7819 24,7818.105 24,7817 L24,7813 C24,7811.895 23.104,7811 22,7811 L22,7811 Z" id="stairs-[#58]"></path></g></g></g></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeWC_M = L.divIcon({
    className: 'pino-customizado pino-wc_m',
    html: '<svg fill="#ffffff" width="24px" height="24px" viewBox="1 0 16 32" xmlns="http://www.w3.org/2000/svg"><path d="M 9 4 C 6.800781 4 5 5.800781 5 8 C 5 9.113281 5.476563 10.117188 6.21875 10.84375 C 4.886719 11.746094 4 13.285156 4 15 L 4 20.625 L 6 21.625 L 6 28 L 12 28 L 12 21.625 L 14 20.625 L 14 15 C 14 13.285156 13.113281 11.746094 11.78125 10.84375 C 12.523438 10.117188 13 9.113281 13 8 C 13 5.800781 11.199219 4 9 4 Z M 9 6 C 10.117188 6 11 6.882813 11 8 C 11 9.117188 10.117188 10 9 10 C 7.882813 10 7 9.117188 7 8 C 7 6.882813 7.882813 6 9 6 Z M 9 12 C 10.65625 12 12 13.34375 12 15 L 12 19.375 L 10 20.375 L 10 26 L 8 26 L 8 20.375 L 6 19.375 L 6 15 C 6 13.34375 7.34375 12 9 12 Z"/></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeWC_F = L.divIcon({
    className: 'pino-customizado pino-wc_f',
    html: '<svg fill="#ffffff" width="24px" height="24px" viewBox="14 0 16 32" xmlns="http://www.w3.org/2000/svg"><path d="M 22 4 C 19.800781 4 18 5.800781 18 8 C 18 9.152344 18.523438 10.175781 19.3125 10.90625 C 18.40625 11.585938 17.746094 12.597656 17.53125 13.8125 C 17.53125 13.824219 17.53125 13.832031 17.53125 13.84375 L 16.03125 21.8125 L 15.78125 23 L 19 23 L 19 28 L 25 28 L 25 23 L 28.21875 23 L 27.96875 21.8125 L 26.46875 13.84375 C 26.46875 13.832031 26.46875 13.824219 26.46875 13.8125 C 26.253906 12.597656 25.59375 11.585938 24.6875 10.90625 C 25.476563 10.175781 26 9.152344 26 8 C 26 5.800781 24.199219 4 22 4 Z M 22 6 C 23.117188 6 24 6.882813 24 8 C 24 9.117188 23.117188 10 22 10 C 20.882813 10 20 9.117188 20 8 C 20 6.882813 20.882813 6 22 6 Z M 22 12 C 23.230469 12 24.277344 12.816406 24.5 14.15625 L 24.5 14.1875 L 24.53125 14.1875 L 25.8125 21 L 23 21 L 23 26 L 21 26 L 21 21 L 18.1875 21 L 19.46875 14.1875 L 19.5 14.1875 L 19.5 14.15625 C 19.722656 12.816406 20.769531 12 22 12 Z"/></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});

const locaisCCET = [
    { id: 'b1', nome: 'Bloco 1 - Auditório 1', andar: 'terreo', categoria: 'auditorio', coordenadas: [607, 1324] },
    { id: 'b6', nome: 'Bloco 6 - Auditório 2', andar: 'terreo', categoria: 'auditorio', coordenadas: [1140, 1777] },

    { id: 'b1', nome: 'Bloco 1 - DA 1', andar: 'terreo', categoria: 'da', coordenadas: [320, 999] },
    { id: 'b1', nome: 'Bloco 1 - DA 2', andar: 'terreo', categoria: 'da', coordenadas: [389, 999] },
    { id: 'b1', nome: 'Bloco 1 - DA 3', andar: 'terreo', categoria: 'da', coordenadas: [452, 999] },
    { id: 'b1', nome: 'Bloco 1 - DA 4', andar: 'terreo', categoria: 'da', coordenadas: [510, 999] },
    { id: 'b1', nome: 'Bloco 1 - DA 5', andar: 'terreo', categoria: 'da', coordenadas: [568, 999] },
    { id: 'b1', nome: 'Bloco 1 - DA 6', andar: 'terreo', categoria: 'da', coordenadas: [626, 999] },
    { id: 'b1', nome: 'Bloco 1 - DA 7', andar: 'terreo', categoria: 'da', coordenadas: [684, 999] },
    { id: 'b1', nome: 'Bloco 1 - DA 8', andar: 'terreo', categoria: 'da', coordenadas: [742, 999] },

    { id: 'b5', nome: 'Bloco 5 - PETComp', andar: 'terreo', categoria: 'petcomp', coordenadas: [1279, 1130] },
    { id: 'b5', nome: 'Bloco 5 - Biblioteca CCET', andar: 'terreo', categoria: 'biblioteca', coordenadas: [1445, 440] },

    { id: 'b1', nome: 'Bloco 1 - Escada', andar: 'terreo', categoria: 'escada', coordenadas: [463, 1151] },
    { id: 'b4', nome: 'Bloco 4 - Escada', andar: 'terreo', categoria: 'escada', coordenadas: [2396, 1150] },
    { id: 'b5', nome: 'Bloco 5 - Escada', andar: 'terreo', categoria: 'escada', coordenadas: [1455, 981] },
    { id: 'b6', nome: 'Bloco 6 - Escada', andar: 'terreo', categoria: 'escada', coordenadas: [1030, 1491] },
    { id: 'b7', nome: 'Bloco 7 - Escada', andar: 'terreo', categoria: 'escada', coordenadas: [1854, 1757] },
    { id: 'b8', nome: 'Bloco 8 - Escada', andar: 'terreo', categoria: 'escada', coordenadas: [1246, 2069] },

    { id: 'b6', nome: 'Bloco 6 - Banheiro Feminino', andar: 'terreo', categoria: 'wc-f', coordenadas: [1010, 1369] },
    { id: 'b5', nome: 'Bloco 5 - Banheiro Feminino', andar: 'terreo', categoria: 'wc-f', coordenadas: [1556, 979] },
    { id: 'b7', nome: 'Bloco 7 - Banheiro Masculino', andar: 'terreo', categoria: 'wc-m', coordenadas: [1862, 1893] },
    { id: 'b8', nome: 'Bloco 8 - Banheiro Masculino', andar: 'terreo', categoria: 'wc-m', coordenadas: [1377, 2101] },
    
];

const marcadoresLeaflet = [];
let andarAtual = 'terreo';
let categoriaAtual = 'todos';

function inicializarMarcadores() {
    locaisCCET.forEach(local => {
        let iconeEscolhido;

        if(local.categoria === 'laboratorio'){
            iconeEscolhido = iconeLaboratorio;
        }
        else if(local.categoria === 'sala'){
            iconeEscolhido = iconeSala;
        }
        else if(local.categoria === 'auditorio'){
            iconeEscolhido = iconeAuditorio;
        }
        else if (local.categoria === 'da') {
            iconeEscolhido = iconeDA;
        }
        else if(local.categoria === 'petcomp'){
            iconeEscolhido = iconePETComp;
        }
        else if(local.categoria === 'biblioteca'){
            iconeEscolhido = iconeBiblioteca;
        }
        else if(local.categoria === 'escada'){
            iconeEscolhido = iconeEscada;
        }
        else if(local.categoria === 'wc-m'){
            iconeEscolhido = iconeWC_M;
        }
        else if(local.categoria === 'wc-f'){
            iconeEscolhido = iconeWC_F;
        }

        let marker = L.marker(local.coordenadas, {icon: iconeEscolhido}).bindPopup(`<b>${local.nome}</b>`);
        
        marcadoresLeaflet.push({
            dados: local,
            instanciaMarker: marker
        });

        if (dadosAndares[local.andar]) {
            dadosAndares[local.andar].marcadores.addLayer(marker);
        }
    });
}

let camadaImagemAtual = L.imageOverlay(dadosAndares['terreo'].url, limitesDaImagem).addTo(map);
map.fitBounds(limitesDaImagem);
marcadoresTerreo.addTo(map); 

inicializarMarcadores();

function executarBusca() {
    const inputElement = document.getElementById('input-busca');
    if (!inputElement) return;
    
    const textoDigitado = inputElement.value.toLowerCase();

    marcadoresLeaflet.forEach(item => {

        if (item.dados.andar === andarAtual) {
            
            const grupoDoAndar = dadosAndares[andarAtual].marcadores;

            const passaTexto = item.dados.nome.toLowerCase().includes(textoDigitado);

            const passaCategoria = (categoriaAtual === 'todos' || item.dados.categoria === categoriaAtual);

            if (passaTexto && passaCategoria) {
                grupoDoAndar.addLayer(item.instanciaMarker);
            } else {
                grupoDoAndar.removeLayer(item.instanciaMarker);
            }
        }
    });
}

window.filtrarCategoria = function(categoriaDesejada, elementoBotao) {
    categoriaAtual = categoriaDesejada;

    document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('ativo'));
    elementoBotao.classList.add('ativo');

    executarBusca();
};

document.getElementById('input-busca').addEventListener('input', executarBusca);

window.mudarAndar = function(idAndar, elementoBotao) {

    camadaImagemAtual.setUrl(dadosAndares[idAndar].url);

    map.removeLayer(dadosAndares[andarAtual].marcadores);

    andarAtual = idAndar;

    map.addLayer(dadosAndares[andarAtual].marcadores);

    executarBusca();

    document.querySelectorAll('.btn-andar').forEach(btn => btn.classList.remove('ativo'));
    if(elementoBotao) {
        elementoBotao.classList.add('ativo');
    }
};

// pegar coord quando clica
map.on('click', function(e) {

    const y = Math.round(e.latlng.lat);
    const x = Math.round(e.latlng.lng);
    const coordenada = `[${y}, ${x}]`;

    L.popup()
        .setLatLng(e.latlng)
        .setContent(`<b>${coordenada}</b>`)
        .openOn(map);
});


// 1. configurar categoria outros
// 2. trocar tamanho pin no zoom minimo
// 3. mudar pop up.
// 4. colocar botao de centralizar
// 5. rampa
// 6. icone coord
// 7. icone labs
