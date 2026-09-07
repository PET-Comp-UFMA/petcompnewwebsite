const data = [
  {
    urlPodCast: 'https://open.spotify.com/embed-podcast/episode/7bWnBBXJ6i0STlHb4QYevH',
    descricao: 'Faala, Galera!! Vamos apresentar nosso novo projeto de PodCast, o PodComp... Eai, está interessado em saber quem somos nós? Vem com a gente.',
    hosts: ['Carlos Silva', 'Natasha Araújo']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/3XyvcJjWLTAE7KintWJ1Ep',
    descricao: 'Comunicação, Trabalho em equipe, falar em público... O quê? Não sabe o que é Soft Skill? Corre e vem saber com a gente.',
    hosts: ['Carlos Silva', 'Natasha Araújo', 'Alana Araújo']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/3bGiWmYFeTubKzABAm9P2N',
    descricao: 'Depois de entender o que é Soft Skill e quais são algumas das principais, chegou a hora de colocar a mão na massa. Partiu?',
    hosts: ['Carlos Silva', 'Natasha Araújo']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/4QtX69HqDoeO5IivXneRJR',
    descricao: 'Está difícil, né? Nesse episódio falamos sobre a dificuldade de mantermos a sanidade em meio a pandemia e a importância do lazer.',
    hosts: ['Carlos Silva', 'Natasha Araújo']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/2nn9D7D6vxI4Y7PvPv1raR',
    descricao: 'Já se perguntou se o que você faz pode ser totalmente substituído por uma máquina? Falamos sobre empregos em risco e empregos do futuro.',
    hosts: ['Carlos Silva', 'Natasha Araújo']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/2qjxoiUNEtDyLtDATpuKgK',
    descricao: 'Nesse episódio falamos sobre leitura, dados no Brasil, dicas para manter o hábito e também sobre o que é uma curadoria.',
    hosts: ['Carlos Silva', 'Kennedy Anderson']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/6gPbsFde3WRP2loEBhN2Q5',
    descricao: 'Ohaiooo!! Vem conhecer e saber alguns animes que falam sobre Tecnologia e Ciência com a gente!',
    hosts: ['Carlos Silva', 'Kennedy Anderson', 'André Filipe']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/0hVJqeAXKzyAjfBC9x02Ul',
    descricao: 'Bem vindos, Calouros!! Nesse episódio você irá saber mais sobre alguns prédios do Campus Bacanga, algumas dicas, experiências e mais.',
    hosts: ['Carlos Silva', 'André Filipe']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/0Ovw2X9sNC8dggp9Ht7EYM',
    descricao: 'Você já imaginou baixar sua série favorita inteira com menos de 5 minutos? Saiba que esse sonho já é quase realidade.',
    hosts: ['Carlos Silva', 'André Filipe']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/1ojUIAbpBZDtl5jDTH7zZa',
    descricao: 'Na universidade é imprescindível o contato com artigos científicos. Quer aprender como ler um artigo científico?',
    hosts: ['Carlos Vinicius', 'André Filipe', 'Thalisson Jon']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/3qVO8s24JVKJ3xvRkw4NkK',
    descricao: 'Os apresentadores falam sobre experiências com o ChatGPT, desmistificam a ideia de que roubará empregos e como usá-lo no aprendizado.',
    hosts: ['Ramille Santana', 'Thiago Augusto', 'William Martins']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/0F9f8Reg6bHXWGkOIsbnqb',
    descricao: 'Desafios em cibersegurança: malware, ransomware, engenharia social, Wi-Fi públicas e dicas de proteção como senhas fortes e autenticação de dois fatores.',
    hosts: ['André Ribeiro', 'Mikael Silva', 'Thiago Augusto']
  },
  {
    urlPodCast: 'https://open.spotify.com/embed/episode/758i4WcF47ZhgldSavGuf0',
    descricao: 'Uma visão abrangente das diversas áreas de atuação dentro da TI, tendências do mercado e habilidades essenciais para o sucesso profissional.',
    hosts: ['Breno Vidigal', 'Melquezedeque Costa', 'Paloma Santos', 'Thiago Augusto']
  }
];

// ── CARROSSEL ──
const track = document.getElementById('pc-track');
const dotsEl = document.getElementById('pc-dots');
const prevBtn = document.getElementById('pc-prev');
const nextBtn = document.getElementById('pc-next');
let current = 0;

// Altura do embed do Spotify: menor no mobile (modo compacto), maior no desktop
const isMobile = window.matchMedia('(max-width: 600px)').matches;
const iframeHeight = isMobile ? 152 : 232;

data.forEach((item, i) => {
  const slide = document.createElement('div');
  slide.className = 'pc-slide' + (i === 0 ? ' active' : '');

  // Só o primeiro slide carrega o iframe de cara (src).
  // Os demais ficam com data-src e só carregam quando o usuário chegar neles.
  const iframeAttr = i === 0
    ? `src="${item.urlPodCast}"`
    : `data-src="${item.urlPodCast}"`;

  slide.innerHTML = `<div class="episodio"><div class="texto">
    <iframe ${iframeAttr} width="100%" height="${iframeHeight}" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    <p>${item.descricao}</p>
    <p style="display:flex;align-items:center;gap:6px;color:#fff;font-size:13px;font-weight:300;margin-top:8px">
      <img src="./assets/svg/mic_white_24dp.svg" style="width:20px"> ${item.hosts.join(', ')}
    </p>
  </div></div>`;
  track.appendChild(slide);

  const dot = document.createElement('button');
  dot.className = 'pc-dot' + (i === 0 ? ' active' : '');
  dot.setAttribute('aria-label', 'Episódio ' + (i + 1));
  dot.addEventListener('click', () => goTo(i));
  dotsEl.appendChild(dot);
});

// Estado explícito de quais slides estão com o iframe carregado.
// Evita depender de ler o atributo src do DOM (que é frágil e causava
// o bug de não recarregar ao voltar o carrossel).
const loaded = data.map((_, i) => i === 0);

function getIframe(n) {
  const slide = track.querySelectorAll('.pc-slide')[n];
  return slide ? slide.querySelector('iframe') : null;
}

// Carrega (ou recarrega) o iframe do slide n
function loadSlideIframe(n) {
  if (n < 0 || n >= data.length) return;
  const iframe = getIframe(n);
  if (!iframe) return;
  if (!loaded[n]) {
    iframe.src = data[n].urlPodCast;
    loaded[n] = true;
  }
}

// Para a reprodução do slide n, jogando o iframe pra about:blank
// (isso derruba o player de vez e o áudio para na hora)
function stopSlideIframe(n) {
  if (n < 0 || n >= data.length) return;
  const iframe = getIframe(n);
  if (!iframe) return;
  if (loaded[n]) {
    iframe.src = 'about:blank';
    loaded[n] = false;
  }
}

function goTo(n) {
  if (n === current || n < 0 || n >= data.length) return;

  stopSlideIframe(current); // para o áudio do slide que estamos deixando

  track.querySelectorAll('.pc-slide')[current].classList.remove('active');
  dotsEl.querySelectorAll('.pc-dot')[current].classList.remove('active');
  current = n;
  track.querySelectorAll('.pc-slide')[current].classList.add('active');
  dotsEl.querySelectorAll('.pc-dot')[current].classList.add('active');

  loadSlideIframe(current);       // carrega o atual (se ainda não carregou)
  loadSlideIframe(current + 1);   // pré-carrega o próximo, pra ficar suave
  loadSlideIframe(current - 1);   // pré-carrega o anterior também

  prevBtn.disabled = current === 0;
  nextBtn.disabled = current === data.length - 1;
}

prevBtn.addEventListener('click', () => { if (current > 0) goTo(current - 1); });
nextBtn.addEventListener('click', () => { if (current < data.length - 1) goTo(current + 1); });
prevBtn.disabled = true;