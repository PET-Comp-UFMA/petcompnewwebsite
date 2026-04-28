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

$monitorias = [

    // -------------------------------------------------------
    //  MONITORIA 1 — Algoritmos 1
    // -------------------------------------------------------
    [
        'id'        => 'algoritmos-1',
        'titulo'    => 'Vídeo Aula de Algoritmos 1',
        'subtitulo' => 'Monitoria de Algoritmos 1',
        'descricao' => 'Nas vídeo aulas de Algoritmos 1 você pode assistir gravações de monitorias anteriores, permitindo revisar conteúdos e acompanhar o desenvolvimento da disciplina no seu próprio ritmo. A monitoria tem como objetivo auxiliar os alunos a compreender os fundamentos básicos de algoritmos, como lógica de programação, tipos de dados, variáveis, estruturas de controle e muito mais.',
        'cor'       => '#1a73e8',
        'icone'     => '🧮',
        'semestres' => ['2025.2', '2025.1', '2024.2', '2024.1'],
        'aulas'     => [
            [
                'titulo'     => 'Monitoria 01 - Introdução ao Python',
                'data'       => '08 de Outubro, 2025',
                'duracao'    => '2h 01 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
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
    ],

    // -------------------------------------------------------
    //  MONITORIA 2 — Cálculo 1
    // -------------------------------------------------------
    [
        'id'        => 'calculo-1',
        'titulo'    => 'Vídeo Aula de Cálculo 1',
        'subtitulo' => 'Monitoria de Cálculo 1',
        'descricao' => 'Nas vídeo aulas de Cálculo 1 você pode assistir gravações de monitorias anteriores, revisando limites, derivadas, integrais e suas aplicações. A monitoria oferece resolução de exercícios comentada e aprofundamento dos conceitos abordados em sala de aula.',
        'cor'       => '#e53935',
        'icone'     => '∫',
        'semestres' => ['2025.2', '2025.1', '2024.2'],
        'aulas'     => [
            [
                'titulo'     => 'Monitoria 01 - Limites e Continuidade',
                'data'       => '08 de Outubro, 2025',
                'duracao'    => '2h 20 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Monitoria 02 - Derivadas Básicas',
                'data'       => '15 de Outubro, 2025',
                'duracao'    => '1h 58 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

    // -------------------------------------------------------
    //  MONITORIA 3 — Estrutura de Dados 1
    // -------------------------------------------------------
    [
        'id'        => 'estrutura-de-dados-1',
        'titulo'    => 'Vídeo Aula de Estrutura de Dados 1',
        'subtitulo' => 'Monitoria de Estrutura de Dados 1',
        'descricao' => 'Nas vídeo aulas de Estrutura de Dados 1 você pode assistir gravações de monitorias anteriores, cobrindo estruturas fundamentais como listas encadeadas, pilhas, filas, árvores e grafos. A monitoria aborda implementação prática em C e análise de complexidade de algoritmos.',
        'cor'       => '#0f9d58',
        'icone'     => '🌲',
        'semestres' => ['2025.2', '2025.1', '2024.2', '2024.1', '2023.2'],
        'aulas'     => [
            [
                'titulo'     => 'Monitoria 01 - Introdução e Revisão de Ponteiros',
                'data'       => '08 de Outubro, 2025',
                'duracao'    => '1h 23 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Monitoria 02 - Listas Encadeadas',
                'data'       => '15 de Outubro, 2025',
                'duracao'    => '2h 05 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Monitoria 03 - Pilhas e Filas',
                'data'       => '22 de Outubro, 2025',
                'duracao'    => '1h 40 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Aula 01-Vetores, matrizes e pilhas',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 34 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2023.2',
                'youtube_id' => 'hUOK8LcYwxw',
            ],
            [
                'titulo'     => 'Aula 02 - Pilhas e filas',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 57 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2023.2',
                'youtube_id' => 'h1V6zZUaccg',
            ],
            [
                'titulo'     => 'Aula 03 - Resolução de Provas Anteriores',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 48 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2023.2',
                'youtube_id' => 'aSypgagn7So',
            ],
            [
                'titulo'     => 'Aula 04 - Resolução da Prova 1 de 2023',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 27 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2023.2',
                'youtube_id' => '3syKjzG_RMA',
            ],
            [
                'titulo'     => 'Aula 05 - Listas Encadeadas',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 11 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2023.2',
                'youtube_id' => '4kPO1zG983s',
            ],
            [
                'titulo'     => 'Aula 06 - Listas Encadeadas',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '21 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2023.2',
                'youtube_id' => '8F7ERIM7dXQ',
            ],
            [
                'titulo'     => 'Aula 07 - Resolução de Provas Anteriores',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 19 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2023.2',
                'youtube_id' => 'x6eILl6xxI4',
            ],
            [
                'titulo'     => 'Aula 08 - Resolução de Questões',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 18 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2023.2',
                'youtube_id' => 'FJKoXvIuBrY',
            ],
            [
                'titulo'     => 'Aula 09 - Resolução de Questões',
                'data'       => '27 de Fevereiro, 2023',
                'duracao'    => '1h 14 min',
                'modulo'     => 'Módulo 2',
                'semestre'   => '2023.2',
                'youtube_id' => 'gSfjyvaed-Y',
            ],
        ],
    ],

    // -------------------------------------------------------
    //  MONITORIA 4 — Linguagem de Programação 1
    // -------------------------------------------------------
    [
        'id'        => 'linguagem-de-programacao-1',
        'titulo'    => 'Vídeo Aula de Linguagem de Programação 1',
        'subtitulo' => 'Monitoria de Linguagem de Programação 1',
        'descricao' => 'Nas vídeo aulas de Linguagem de Programação 1 você pode assistir gravações de monitorias anteriores, explorando os fundamentos de linguagens de programação, paradigmas, sintaxe, semântica e boas práticas de codificação.',
        'cor'       => '#f57c00',
        'icone'     => '💻',
        'semestres' => ['2025.2', '2025.1', '2024.2'],
        'aulas'     => [
            [
                'titulo'     => 'Monitoria 01 - Paradigmas de Programação',
                'data'       => '08 de Outubro, 2025',
                'duracao'    => '1h 50 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Monitoria 02 - Sintaxe e Semântica',
                'data'       => '15 de Outubro, 2025',
                'duracao'    => '2h 10 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

    // -------------------------------------------------------
    //  MONITORIA 5 — Matemática Discreta e Lógica
    // -------------------------------------------------------
    [
        'id'        => 'matematica-discreta-e-logica',
        'titulo'    => 'Vídeo Aula de Matemática Discreta e Lógica',
        'subtitulo' => 'Monitoria de Matemática Discreta e Lógica',
        'descricao' => 'Nas vídeo aulas de Matemática Discreta e Lógica você pode assistir gravações de monitorias anteriores, abordando lógica proposicional, teoria dos conjuntos, relações, funções, combinatória e teoria dos grafos aplicada à computação.',
        'cor'       => '#7b1fa2',
        'icone'     => '∧',
        'semestres' => ['2025.2', '2025.1', '2024.2'],
        'aulas'     => [
            [
                'titulo'     => 'Monitoria 01 - Lógica Proposicional',
                'data'       => '08 de Outubro, 2025',
                'duracao'    => '1h 55 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Monitoria 02 - Teoria dos Conjuntos',
                'data'       => '15 de Outubro, 2025',
                'duracao'    => '1h 42 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

    // -------------------------------------------------------
    //  MONITORIA 6 — Cálculo Vetorial e Geometria Analítica
    // -------------------------------------------------------
    [
        'id'        => 'calculo-vetorial-e-geometria-analitica',
        'titulo'    => 'Vídeo Aula de Cálculo Vetorial e Geometria Analítica',
        'subtitulo' => 'Monitoria de Cálculo Vetorial e Geometria Analítica',
        'descricao' => 'Nas vídeo aulas de Cálculo Vetorial e Geometria Analítica você pode assistir gravações de monitorias anteriores, cobrindo vetores, retas e planos no espaço, curvas e superfícies, além de integrais de linha e superfície.',
        'cor'       => '#00838f',
        'icone'     => '→',
        'semestres' => ['2025.2', '2025.1', '2024.2'],
        'aulas'     => [
            [
                'titulo'     => 'Monitoria 01 - Vetores e Operações',
                'data'       => '08 de Outubro, 2025',
                'duracao'    => '2h 00 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'     => 'Monitoria 02 - Retas e Planos no Espaço',
                'data'       => '15 de Outubro, 2025',
                'duracao'    => '1h 48 min',
                'modulo'     => 'Módulo 1',
                'semestre'   => '2025.2',
                'youtube_id' => 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

];

/**
 * Função auxiliar: retorna dados de uma monitoria pelo ID
 * Uso: $m = get_monitoria('algoritmos-1');
 */
function get_monitoria(string $id): ?array {
    global $monitorias;
    foreach ($monitorias as $m) {
        if ($m['id'] === $id) return $m;
    }
    return null;
}