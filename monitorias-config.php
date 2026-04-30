<?php
/**
 * ============================================================
 *  CONFIGURAÇÃO DAS MONITORIAS — REPOSITÓRIO EDUCACIONAL
 * ============================================================
 *
 *  Como os vídeos são exibidos:
 *  - Cada monitoria possui um array 'semestres' com os períodos disponíveis.
 *  - Cada monitoria possui um array 'aulas', onde cada aula tem um 'youtube_id'.
 *  - Na página de Vídeo Aula, o usuário seleciona um semestre via pills/botões.
 *  - A primeira aula da lista aparece em destaque (player principal).
 *  - As demais aulas ficam na lista lateral; clicar em uma delas a coloca em destaque.
 *  - O vídeo é embutido diretamente via iframe do YouTube usando o youtube_id.
 *
 *  Como adicionar uma nova aula:
 *  1. Suba o vídeo no YouTube como "Não listado"
 *  2. Copie o ID do vídeo (parte após "v=" na URL)
 *     Exemplo: https://youtube.com/watch?v=dQw4w9WgXcQ → ID = dQw4w9WgXcQ
 *  3. Adicione um novo item no array 'aulas' da monitoria correta
 *
 *  Como adicionar uma nova aula de um semestre diferente:
 *  - Adicione o semestre no array 'semestres' da monitoria (ex: '2025.2')
 *  - No array 'aulas', inclua o campo 'semestre' correspondente em cada aula
 *  - A página filtra automaticamente as aulas pelo semestre selecionado
 * ============================================================
 */
$monitorias = array_map(
    fn($file) => require $file,
    glob(__DIR__ . '/monitorias/*.php')
);

function get_monitoria(string $id): ?array {
    global $monitorias;
    foreach ($monitorias as $m) {
        if ($m['id'] === $id) return $m;
    }
    return null;
}