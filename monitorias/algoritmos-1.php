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

return [
        'id'        => 'algoritmos-1',
        'id_json'   => 'algoritmos1',
        'titulo'    => 'Vídeo Aula de Algoritmos 1',
        'subtitulo' => 'Monitoria de Algoritmos 1',
        'descricao' => 'Nas vídeo aulas de Algoritmos 1 você pode assistir gravações de monitorias anteriores, permitindo revisar conteúdos e acompanhar o desenvolvimento da disciplina no seu próprio ritmo. A monitoria tem como objetivo auxiliar os alunos a compreender os fundamentos básicos de algoritmos, como lógica de programação, tipos de dados, variáveis, estruturas de controle e muito mais.',
        'cor'       => '#1a73e8',
        'icone'     => '🧮',
        'semestres' => ['2025.2', '2025.1', '2024.2', '2024.1',],
        'aulas'     => [
            [
                'titulo'     => 'Monitoria 01 - Introdução ao Python',
                'data'       => '08 de Outubro, 2025',
                'duracao'    => '2h 01 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => '42UBFf1UYKs',
            ],
            [
                'titulo'     => 'Monitoria 02 - Variáveis e Tipos de Dados',
                'data'       => '15 de Outubro, 2025',
                'duracao'    => '1h 45 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Monitoria 03 - Estruturas de Controle',
                'data'       => '22 de Outubro, 2025',
                'duracao'    => '1h 52 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            
        ],
    ];