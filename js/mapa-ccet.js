const map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -2,
    maxZoom: 2
}); 

const limitesDaImagem = [[0, 0], [2898, 2634]];

const marcadoresTerreo = L.layerGroup();
const marcadoresAndar1 = L.layerGroup();
const marcadoresAndar2 = L.layerGroup();

const dadosAndares = {
    'terreo': { url: 'img/mapa-ccet-T.svg', marcadores: marcadoresTerreo },
    '1': { url: 'img/mapa-ccet-1.svg', marcadores: marcadoresAndar1 },
    '2': { url: 'img/mapa-ccet-2.svg', marcadores: marcadoresAndar2 },
};

// icones dos pinos
const iconeLaboratorio = L.divIcon({
    className: 'pino-customizado pino-lab',
    html: '<svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
    iconSize: [32, 32],    
    iconAnchor: [16, 16],  
    popupAnchor: [0, -16]   
});
const iconeSala = L.divIcon({
    className: 'pino-customizado pino-sala',
    html: '<svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>',
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
    html: '<svg viewBox="0 0 32 32" width="16" height="16"><text x="16" y="21" font-family="Arial, Helvetica, sans-serif" font-weight="bold" font-size="18" fill="currentColor" text-anchor="middle">DA</text></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeCA = L.divIcon({
    className: 'pino-customizado pino-ca',
    html: '<svg viewBox="0 0 32 32" width="16" height="16"><text x="16" y="21" font-family="Arial, Helvetica, sans-serif" font-weight="bold" font-size="18" fill="currentColor" text-anchor="middle">CA</text></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconePET = L.divIcon({
    className: 'pino-customizado pino-pet',
    html: '<svg viewBox="0 0 32 32" width="16" height="16"><text x="16" y="21" font-family="Arial, Helvetica, sans-serif" font-weight="bold" font-size="18" fill="currentColor" text-anchor="middle">PET</text></svg>',
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
const iconeCoordenacao = L.divIcon({
    className: 'pino-customizado pino-coordenacao',
    html: '<svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 15.5C6 14.9477 6.44772 14.5 7 14.5H17C17.5523 14.5 18 14.9477 18 15.5C18 16.6046 17.1046 17.5 16 17.5H8C6.89543 17.5 6 16.6046 6 15.5Z" stroke="#ffffff" stroke-width="1.5"/><path d="M6.62825 6.76581C6.86962 4.75442 6.9903 3.74872 7.57198 3.06161C7.75659 2.84355 7.97139 2.65298 8.2099 2.49567C8.96141 2 9.97432 2 12.0001 2C14.026 2 15.0389 2 15.7904 2.49567C16.0289 2.65298 16.2437 2.84355 16.4283 3.06161C17.01 3.74872 17.1307 4.75442 17.372 6.76581L17.463 7.52342C17.7134 9.61087 17.8387 10.6546 17.2419 11.3273C16.6451 12 15.5939 12 13.4914 12H10.5088C8.40642 12 7.35521 12 6.7584 11.3273C6.1616 10.6546 6.28684 9.61087 6.53734 7.52342L6.62825 6.76581Z" stroke="#ffffff" stroke-width="1.5"/><path d="M12 12V14" stroke="#ffffff" stroke-width="1.5"/><path d="M12 22V20M12 20V17.5M12 20L12.4661 20.1165C13.4214 20.3554 14.1886 21.0658 14.5 22M12 20L11.5339 20.1165C10.5786 20.3554 9.81142 21.0658 9.5 22M6 16L5.13484 13.4045C5.06173 13.1852 5.02518 13.0755 4.95424 12.9225C4.8833 12.7695 4.85413 12.7215 4.79579 12.6256C4.33942 11.8752 3.7325 11.5 2 11.5M18 16L18.8652 13.4045C18.9383 13.1852 18.9748 13.0755 19.0458 12.9225C19.1167 12.7695 19.1459 12.7215 19.2042 12.6256C19.6606 11.8752 20.2675 11.5 22 11.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"/></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeProfessor = L.divIcon({
    className: 'pino-customizado pino-professor',
    html: '<svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.05 2.53004L4.03002 6.46004C2.10002 7.72004 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73004 19.98 6.47004L13.99 2.54004C12.91 1.82004 11.13 1.82004 10.05 2.53004Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.63 13.08L5.62 17.77C5.62 19.04 6.6 20.4 7.8 20.8L10.99 21.86C11.54 22.04 12.45 22.04 13.01 21.86L16.2 20.8C17.4 20.4 18.38 19.04 18.38 17.77V13.13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.4 15V9" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeRampa = L.divIcon({
    className: 'pino-customizado pino-rampa',
    html: '<svg width="24px" height="24px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#ffffff" fill="none"><path d="M49,50.21,40,38.16a.63.63,0,0,0-.51-.25H27.13a.64.64,0,0,1-.63-.57L24.91,22.83" stroke-linecap="round"/><line x1="41.03" y1="28.46" x2="25.53" y2="28.46" stroke-linecap="round"/><path d="M42.64,50.21a15.43,15.43,0,1,1-22-21.33" stroke-linecap="round"/><circle cx="23.51" cy="12.64" r="4.85" stroke-linecap="round"/></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});
const iconeOutros = L.divIcon({
    className: 'pino-customizado pino-outros',
    html: '<svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"></rect><rect x="14" y="3" width="7" height="7" rx="1"></rect><rect x="14" y="14" width="7" height="7" rx="1"></rect><rect x="3" y="14" width="7" height="7" rx="1"></rect></svg>',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [0, -16]
});

const locaisCCET = [
    // { id: '', bloco: '', sala: '', nome: '', andar: '1', categoria: '', imagem: '', descricao: '', coordenadas: [, ] },
    // TÉRREO
    { id: 'escada1', bloco: '1', sala: '', nome: 'Escada', andar: 'terreo', categoria: 'escada', imagem: '', descricao: '', coordenadas: [463, 1151] },
    { id: 'auditorio1', bloco: '1', sala: '', nome: 'Auditório 1', andar: 'terreo', categoria: 'auditorio', imagem: '', descricao: '', coordenadas: [607, 1324] },
    { id: '1', bloco: '1', sala: '108', nome: 'PET - Física', andar: 'terreo', categoria: 'pet', imagem: '', descricao: '', coordenadas: [320, 999] },
    { id: '2', bloco: '1', sala: '107', nome: 'Diretório Acadêmico de Matemática', andar: 'terreo', categoria: 'da', imagem: '', descricao: '', coordenadas: [389, 999] },
    { id: '3', bloco: '1', sala: '106', nome: 'Diretório Acadêmico de Química Industrial', andar: 'terreo', categoria: 'da', imagem: '', descricao: '', coordenadas: [452, 999] },
    { id: '4', bloco: '1', sala: '105', nome: 'Diretório Acadêmico de Física', andar: 'terreo', categoria: 'da', imagem: '', descricao: '', coordenadas: [510, 999] },
    { id: '5', bloco: '1', sala: '104', nome: 'DAComp (Diretório Acadêmico de Computação)', andar: 'terreo', categoria: 'da', imagem: '', descricao: '', coordenadas: [568, 999] },
    { id: '6', bloco: '1', sala: '103', nome: 'DA Elétrica (Diretório Acadêmico de Engenharia Elétrica)', andar: 'terreo', categoria: 'da', imagem: '', descricao: '', coordenadas: [626, 999] },
    { id: '7', bloco: '1', sala: '102',nome: 'CAD (Centro Acadêmico de Design)', andar: 'terreo', categoria: 'ca', imagem: '', descricao: '', coordenadas: [684, 999] },
    { id: '8', bloco: '1', sala: '101', nome: 'DAQM (Diretório Acâdemico de Química)', andar: 'terreo', categoria: 'da', imagem: '', descricao: '', coordenadas: [742, 999] },
    { id: '9', bloco: '1', sala: '100', nome: 'Sala', bloco: '1', sala: '100', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [824, 999] },
    { id: '10', bloco: '1', sala: '', nome: 'caeq (Centro Acadêmico de Engenharia Química)', andar: 'terreo', categoria: 'ca', imagem: '', descricao: '', coordenadas: [900, 999] },

    { id: '11', bloco: '2', sala: '101', nome: 'Sala do Mestrado em Matemática', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1095, 1008] },
    { id: '12', bloco: '2', sala: '102', nome: 'Sala do Mestrado Profissional em Energia & Ambiente e Mestrado em Computação', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1095, 917] },
    { id: '13', bloco: '2', sala: '103', nome: 'Coordenação e Secretaria da Pós-Graduação em Ciência da Computação', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [1095, 798] },
    { id: '14', bloco: '2', sala: '104', nome: 'Coordenação e Secretaria da Pós-Graduação em Energia e Ambiente', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [1095, 691] },
    { id: '15', bloco: '2', sala: '105', nome: 'Coordenação e Secretaria do Mestrado em Ensino de Física - PROFIS', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [1095, 624] },
    { id: 'rampa1', bloco: '2', sala: '', nome: 'Rampa', andar: 'terreo', categoria: 'rampa', imagem: '', descricao: '', coordenadas: [1236, 780] },

    { id: '16', bloco: '3', sala: '101', nome: 'Laboratório de Biofísica e Nanossistemas - LBN', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1812, 988] },
    { id: '17', bloco: '3', sala: '102', nome: 'Sala Nossos Saberes', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1812, 865] },
    { id: '18', bloco: '3', sala: '103', nome: 'Sala Forma & Ação', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1812, 759] },
    { id: '19', bloco: '3', sala: '104', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1812, 649] },
    { id: 'nca', bloco: '3', sala: '', nome: 'NCA (Núcleo de Computação Aplicada)', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1939, 387] },

    { id: '20', bloco: '4', sala: '101', nome: 'LABELETRO - Laboratório de Eletrotécnica (Prof. Lindberg Cavalcanti Conde)', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [2269, 980] },
    { id: '21', bloco: '4', sala: '102', nome: 'Laboratório de Sistema de Energia Elétrica', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [2512, 980] },
    { id: 'escada2', bloco: '4', sala: '', nome: 'Escada', andar: 'terreo', categoria: 'escada', imagem: '', descricao: '', coordenadas: [2396, 1150] },
    { id: 'inovtec', bloco: '4', sala: '', nome: 'INOVTEC', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [2307, 1319] },

    { id: 'escada3', bloco: '5', sala: '', nome: 'Escada', andar: 'terreo', categoria: 'escada', imagem: '', descricao: '', coordenadas: [1455, 981] },
    { id: 'banheiro1', bloco: '5', sala: '', nome: 'Banheiro Feminino', andar: 'terreo', categoria: 'wc-f', imagem: '', descricao: '', coordenadas: [1556, 979] },
    { id: 'biblioteca', bloco: '5', sala: '', nome: 'Biblioteca CCET', andar: 'terreo', categoria: 'biblioteca', imagem: '', descricao: '', coordenadas: [1445, 440] },
    { id: '22', bloco: '5', sala: '', nome: 'PETComp', andar: 'terreo', categoria: 'petcomp', imagem: '', descricao: '', coordenadas: [1279, 1130] },
    { id: '23', bloco: '5', sala: '101', nome: 'LAB 3 - Ciência da Computação', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1400, 1130] },
    { id: '24', bloco: '5', sala: '101', nome: 'LAB 4 - Ciência da Computação', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1583, 1130] },

    { id: '25', bloco: '6', sala: '', nome: 'Coordenação do Curso de Matemática (Licenciatura)', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [876, 1967] },
    { id: '26', bloco: '6', sala: '', nome: 'Coordenação do Curso de Física (Bacharelado)', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [876, 1814] },
    { id: '27', bloco: '6', sala: '', nome: 'Coordenação do Curso de Química (Licenciatura)', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [876, 1691] },
    { id: '28', bloco: '6', sala: '', nome: 'Portaria', andar: 'terreo', categoria: 'outros', imagem: '', descricao: '', coordenadas: [876, 1509] },
    { id: '29', bloco: '6', sala: '104', nome: 'Coordenação do Curso de Química Industrial', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [876, 1361] },
    { id: '30', bloco: '6', sala: '', nome: 'Coordenação do Curso de Design', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [876, 1285] },
    { id: '31', bloco: '6', sala: '', nome: 'Coordenação do Curso de Engenharia Elétrica', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [876, 1209] },
    { id: '32', bloco: '6', sala: '', nome: 'Coordenação do Curso de Engenharia Elétrica', andar: 'terreo', categoria: 'coord', imagem: '', descricao: '', coordenadas: [876, 1124] },
    { id: 'escada4', bloco: '6', sala: '', nome: 'Escada', andar: 'terreo', categoria: 'escada', imagem: '', descricao: '', coordenadas: [1030, 1491] },
    { id: 'banheiro2', bloco: '6', sala: '', nome: 'Banheiro Feminino', andar: 'terreo', categoria: 'wc-f', imagem: '', descricao: '', coordenadas: [1010, 1369] },
    { id: 'auditorio2', bloco: '6', sala: '', nome: 'Auditório 2', andar: 'terreo', categoria: 'auditorio', imagem: '', descricao: '', coordenadas: [1140, 1777] },

    { id: '33', bloco: '7', sala: '101', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1922] },
    { id: '34', bloco: '7', sala: '102', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1777] },
    { id: '35', bloco: '7', sala: '103', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1652] },
    { id: '36', bloco: '7', sala: '104', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1535] },
    { id: '37', bloco: '7', sala: '105', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1428] },
    { id: '38', bloco: '7', sala: '106', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1331] },
    { id: '39', bloco: '7', sala: '107', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1235] },
    { id: '40', bloco: '7', sala: '108', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [2012, 1132] },
    { id: 'escada5', bloco: '7', sala: '', nome: 'Escada', andar: 'terreo', categoria: 'escada', imagem: '', descricao: '', coordenadas: [1854, 1757] },
    { id: 'banheiro3', bloco: '7', sala: '', nome: 'Banheiro Masculino', andar: 'terreo', categoria: 'wc-m', imagem: '', descricao: '', coordenadas: [1862, 1893] },
    
    { id: '41', bloco: '8', sala: '104/105', nome: 'NEPP (Núcleo de Ergonomia em Processos e Produtos)', andar: 'terreo', categoria: 'outros', imagem: '', descricao: '', coordenadas: [1610, 1942] },
    { id: '42', bloco: '8', sala: '101', nome: 'LAB 2 - Ciência da Computação', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1463, 1942] },
    { id: '43', bloco: '8', sala: '101', nome: 'LAB 1 - Ciência da Computação', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1268, 1942] },
    { id: 'escada6', bloco: '8', sala: '', nome: 'Escada', andar: 'terreo', categoria: 'escada', imagem: '', descricao: '', coordenadas: [1246, 2069] },
    { id: 'banheiro4', bloco: '8', sala: '', nome: 'Banheiro Masculino', andar: 'terreo', categoria: 'wc-m', imagem: '', descricao: '', coordenadas: [1377, 2101] },
    
    { id: '44', bloco: '9', sala: '', nome: 'NDA', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1607, 2439] },
    { id: '45', bloco: '9', sala: '', nome: 'Sala de Professor', andar: 'terreo', categoria: 'prof', imagem: '', descricao: 'Prof. Dr. Nailton Martins Rodrigues, Profa. Dra. Rafaely Nascimento Lima, Prof. Dr. Tiago Gomes dos Santos, Prof. Dr. Ulisses Alves do Rego.', coordenadas: [1479, 2439] },
    { id: '46', bloco: '9', sala: '', nome: 'DEQUI (Departamento de Química)', andar: 'terreo', categoria: 'outros', imagem: '', descricao: '', coordenadas: [1374, 2439] },
    { id: '47', bloco: '9', sala: '', nome: 'lequim (Laboratório de Ensino de Química)', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1298, 2439] },
    { id: '48', bloco: '9', sala: '', nome: 'lequim (Laboratório de Ensino de Química)', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1236, 2439] },
    { id: '49', bloco: '9', sala: '104', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1096, 2432] },
    { id: '50', bloco: '9', sala: '103', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1096, 2332] },
    { id: '51', bloco: '9', sala: '102', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1096, 2234] },
    { id: '52', bloco: '9', sala: '101', nome: 'Sala', andar: 'terreo', categoria: 'sala', imagem: '', descricao: '', coordenadas: [1096, 2106] },

    { id: '53', bloco: '10', sala: '101', nome: 'Laboratório de Cerâmica', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1812, 2086] },
    { id: '54', bloco: '10', sala: '102', nome: 'LAB DESIGN', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1812, 2195] },
    { id: '55', bloco: '10', sala: '103', nome: 'Núcleo de Prototipagem e Design', andar: 'terreo', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [1812, 2283] },
    { id: '56', bloco: '10', sala: '104', nome: 'Oficina de Marcenaria', andar: 'terreo', categoria: 'outros', imagem: '', descricao: '', coordenadas: [1812, 2406] },
    { id: 'rampa2', bloco: '10', sala: '', nome: 'Rampa', andar: 'terreo', categoria: 'rampa', imagem: '', descricao: '', coordenadas: [1617, 2289] },


    // PRIMEIRO ANDAR
    { id: '57', bloco: '6', sala: '202', nome: 'Laboratório de Ensino de Matemática', andar: '1', categoria: 'laboratorio', imagem: '', descricao: '', coordenadas: [869, 1969] },
    { id: '58', bloco: '6', sala: '204', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Adecarlos Costa Carvalho, Prof. Anselmo B. Raposo Júnior, Prof. Cléber Araújo Cavalcanti', coordenadas: [869, 1852] },
    { id: '59', bloco: '6', sala: '205', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Marcos Araújo', coordenadas: [869, 1813] },
    { id: '60', bloco: '6', sala: '206', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Josenildo, Profa. Valeska, Prof. Wellington', coordenadas: [869, 1773] },
    { id: '61', bloco: '6', sala: '207', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Profa. Renata de F. Limeira Carvalho', coordenadas: [869, 1734] },
    { id: '62', bloco: '6', sala: '208', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Elivaldo Macedo, Prof. Ivaldo Paz, Prof. José Santana', coordenadas: [869, 1696] },
    { id: '63', bloco: '6', sala: '209', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Artur Silva, Prof. Jairo Santos, Prof. Luís Fernando', coordenadas: [869, 1655] },
    { id: '64', bloco: '6', sala: '210', nome: 'OBMEP', andar: '1', categoria: 'outros', imagem: '', descricao: '', coordenadas: [869, 1421] },
    { id: '65', bloco: '6', sala: '211', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Hilkias Jordão, Prof. Domício Magalhães, Prof. Ítalo Augusto, Prof. Gerard Morales, Prof. Afonso Amaral Filho', coordenadas: [869, 1382] },
    { id: '66', bloco: '6', sala: '212', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Mairton Barros', coordenadas: [869, 1343] },
    { id: '67', bloco: '6', sala: '213', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Profa. Vanessa Ribeiro Ramos, Prof. Antonio José da Silva', coordenadas: [869, 1305] },
    { id: '68', bloco: '6', sala: '214', nome: 'Sala', andar: '1', categoria: 'outros', imagem: '', descricao: '', coordenadas: [869, 1265] },
    { id: '69', bloco: '6', sala: '215', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Portela, Profa. Inêz C. Dantas, Prof. Adauto de S. Lima Neto, Prof. Samyr Béliche Vale', coordenadas: [869, 1225] },
    { id: '70', bloco: '6', sala: '216', nome: 'Coordenação e Secretaria do Mestrado em Design', andar: '1', categoria: 'coord', imagem: '', descricao: '', coordenadas: [869, 1177] },

    { id: '71', bloco: '1', sala: '218', nome: 'Sala de Professor', andar: '1', categoria: 'prof', imagem: '', descricao: 'Prof. Harvey Alexander', coordenadas: [841, 1115] },

];

const ControleCentralizar = L.Control.extend({
    options: {
        position: 'topleft'
    },

    onAdd: function (map) {
        const container = L.DomUtil.create('div', 'leaflet-bar leaflet-control');
        const botao = L.DomUtil.create('a', 'botao-centralizar', container);
        
        botao.href = '#';
        botao.title = 'Centralizar Mapa';
        
        botao.innerHTML = `<svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg>`;

        L.DomEvent.disableClickPropagation(botao);

        L.DomEvent.on(botao, 'click', function(e) {
            e.preventDefault(); // Evita que a página pule para o topo
            map.fitBounds(limitesDaImagem); 
        });

        return container;
    }
});

map.addControl(new ControleCentralizar());


const marcadoresLeaflet = [];
let andarAtual = 'terreo';
let categoriaAtual = 'todos';

function criarHTMLPopup(local) {
    let html = '<div class="popup-customizado">';

    if (local.imagem){
        html += `<img src="${local.imagem}" class="popup-img" alt="Foto de ${local.nome}">`;
    }

    html += '<div class="popup-conteudo">';

    html += `<h3 class="popup-titulo">${local.nome}</h3>`;

    let subtitulo = `Bloco ${local.bloco}`;
    if (local.sala) subtitulo += ` - Sala ${local.sala}`;
    html += `<p class="popup-subtitulo">${subtitulo}</p>`;

    if (local.descricao) {
        html += `<p class="popup-subtitulo">${local.descricao}</p>`;
    }

    html += '</div></div>';
    return html;
}

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
        else if (local.categoria === 'ca') {
            iconeEscolhido = iconeCA;
        }
        else if (local.categoria === 'pet') {
            iconeEscolhido = iconePET;
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
        else if(local.categoria === 'coord'){
            iconeEscolhido = iconeCoordenacao;
        }
        else if(local.categoria === 'prof'){
            iconeEscolhido = iconeProfessor;
        }
        else if(local.categoria === 'rampa'){
            iconeEscolhido = iconeRampa;
        }
        else{
            iconeEscolhido = iconeOutros;
        }

        let marker = L.marker(local.coordenadas, {icon: iconeEscolhido}).bindPopup( criarHTMLPopup(local) );
        
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

            const textoParaBusca = `${item.dados.nome} Bloco ${item.dados.bloco} ${item.dados.sala} ${item.dados.categoria}`.toLowerCase();
            const passaTexto = textoParaBusca.includes(textoDigitado);

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
// 5. rampa
// 6. icone coord
// 7. icone labs
// icone sala professor
// 8. resolver sobre Sala de Professor
// ver sobre hover dos pinos