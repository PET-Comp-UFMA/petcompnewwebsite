const tabs = document.querySelectorAll("[data-documentos-tab]");
const title = document.querySelector("#title-documents");
const list = document.querySelector("#documentos-lista");

const config = {
  planejamento: {
    title: "Planejamentos Anuais",
    pageTitle: "Planejamento",
    url: "planejamento",
    json: "data/planejamentos.json",
  },
  relatorio: {
    title: "Relatórios Anuais",
    pageTitle: "Relatorio",
    url: "relatorio",
    json: "data/relatorios.json",
  },
};

function renderDocumentos(documentos) {
  list.innerHTML = documentos
    .map(
      (documento) => `
    <div class="planejamento-card">
      <div class="planejamento-left">
        <span class="documents-icon">
          <img src="assets/svg/iconDocuments.svg" alt="">
        </span>
        <div class="planejamento-info">
          <h2>${documento.titulo}</h2>
          <p>Publicado em ${documento.dataPublicacao}</p>
        </div>
      </div>

      <div>
        <a href="${documento.arquivo}" target="_blank" class="btn-documento">
          Ver documento
        </a>
      </div>
    </div>
  `,
    )
    .join("");
}

async function trocarTipo(tipo, atualizarUrl = true) {
  const item = config[tipo];
  if (!item) return;

  const response = await fetch(item.json);
  const documentos = await response.json();

  title.textContent = item.title;
  document.title = item.pageTitle;

  renderDocumentos(documentos);

  tabs.forEach((tab) => {
    tab.classList.toggle("active", tab.dataset.tipo === tipo);
  });

  if (atualizarUrl) {
    history.pushState({ tipo }, "", item.url);
  }
}

tabs.forEach((tab) => {
  tab.addEventListener("click", (event) => {
    event.preventDefault();
    trocarTipo(tab.dataset.tipo);
  });
});

window.addEventListener("popstate", () => {
  const path = window.location.pathname;
  const tipo = path.includes("relatorio") ? "relatorio" : "planejamento";
  trocarTipo(tipo, false);
});
