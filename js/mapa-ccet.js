const mapaPanZoom = svgPanZoom('#mapa-ccet', {
    zoomEnabled: true,         // Permite dar zoom (scroll do mouse)
    controlIconsEnabled: true, // Adiciona botões de + e - no canto da tela
    fit: true,                 // Faz o mapa caber na tela ao carregar
    center: true,              // Centraliza o mapa ao carregar
    minZoom: 0.5,              // O mínimo que a pessoa pode afastar
    maxZoom: 5                 // O máximo que a pessoa pode aproximar
});