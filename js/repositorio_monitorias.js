// esse javaScript tem como objetivo nao recarregar a pagina toda vez que um video for selecionado. :)
document.querySelectorAll('.rep-item').forEach(function(item) {
    item.addEventListener('click', function(e) {
        e.preventDefault();

        const url = new URL(this.href, location.origin);
        const aula = url.searchParams.get('aula');
        const monitoria = url.searchParams.get('monitoria');
        const semestre = url.searchParams.get('semestre');

        history.pushState({}, '', this.href);
       
        fetch(this.href)
            .then(r => r.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                
                const novoIframe = doc.querySelector('.rep-player-wrap iframe');
                const iframeAtual = document.querySelector('.rep-player-wrap iframe');
                if (novoIframe && iframeAtual) {
                    iframeAtual.src = novoIframe.src;
                }

                
                const novaInfo = doc.querySelector('.rep-aula-info');
                const infoAtual = document.querySelector('.rep-aula-info');
                if (novaInfo && infoAtual) {
                    infoAtual.innerHTML = novaInfo.innerHTML;
                }

                
                document.querySelectorAll('.rep-item').forEach(i => i.classList.remove('ativo'));
                this.classList.add('ativo');

            });
    });
});