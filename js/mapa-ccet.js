const map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -1,
    maxZoom: 2
});

const limitesDaImagem = [[0, 0], [800, 1000]]; 

const marcadoresTerreo = L.layerGroup();
const marcadoresAndar1 = L.layerGroup();

L.marker([400, 500]).bindPopup("<b>Sala 001</b>").addTo(marcadoresTerreo);
L.marker([300, 600]).bindPopup("<b>Lab. Info 1</b>").addTo(marcadoresTerreo);
L.marker([450, 550]).bindPopup("<b>Sala 104</b>").addTo(marcadoresAndar1);

const dadosAndares = {
    'terreo': { url: 'assets/svg/mapa-ccet1.svg', marcadores: marcadoresTerreo },
    'andar1': { url: 'plantas/1_andar.svg', marcadores: marcadoresAndar1 },
};

let camadaImagemAtual = L.imageOverlay(dadosAndares['terreo'].url, limitesDaImagem).addTo(map);
map.fitBounds(limitesDaImagem);
marcadoresTerreo.addTo(map);    

window.mudarAndar = function(idAndar) {

    camadaImagemAtual.setUrl(dadosAndares[idAndar].url);

    map.removeLayer(marcadoresTerreo);
    map.removeLayer(marcadoresAndar1);

    dadosAndares[idAndar].marcadores.addTo(map);

    document.querySelectorAll('.btn-andar').forEach(btn => btn.classList.remove('ativo'));
    event.target.classList.add('ativo');
};