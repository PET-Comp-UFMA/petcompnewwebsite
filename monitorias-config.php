<?php
/**
 * ============================================================
 *  CONFIGURAÇÃO DAS MONITORIAS — REPOSITÓRIO EDUCACIONAL
 * ============================================================
 *
 *  Como adicionar uma nova aula:
 *  1. Suba o vídeo no YouTube como "Não listado"
 *  2. Copie o ID do vídeo (parte após "v=" na URL)
 *     Exemplo: https://youtube.com/watch?v=dQw4w9WgXcQ → ID = dQw4w9WgXcQ
 *  3. Adicione um novo item no array 'aulas' da monitoria correta
 *
 *  Como adicionar uma nova monitoria:
 *  1. Copie o bloco de uma monitoria existente
 *  2. Altere o 'id' (único, sem espaços), 'titulo', 'descricao', 'cor'
 *  3. Adicione as aulas no array 'aulas'
 * ============================================================
 */

$monitorias = [

    // -------------------------------------------------------
    //  MONITORIA 1 — Algoritmos
    // -------------------------------------------------------
    [
        'id'        => 'algoritmos',
        'titulo'    => 'Vídeo Aula de Algoritmos 1',
        'subtitulo' => 'Monitoria de Algoritmos',
        'descricao' => 'A monitoria de Algoritmos tem como objetivo auxiliar os alunos a compreender os fundamentos básicos de algoritmos, como lógica de programação, tipos de dados, variáveis, estruturas de controle e muito mais. Os encontros são realizados toda quarta-feira via Google Meet.',
        'cor'       => '#1a73e8',   // cor destaque (hex)
        'icone'     => '🧮',
        'semestres' => ['2025.1', '2024.2', '2024.1', '2023.2'],
        'aulas'     => [
            [
                'titulo'    => 'Monitoria 01 - Introdução ao Python',
                'data'      => '08 de Outubro, 2025',
                'duracao'   => '2h 01 min',
                'modulo'    => 'Módulo 1',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
                // Como pegar: youtube.com/watch?v=XXXXXXXXXXX → copie os X
            ],
            [
                'titulo'    => 'Monitoria 02 - Variáveis e Tipos',
                'data'      => '15 de Outubro, 2025',
                'duracao'   => '1h 45 min',
                'modulo'    => 'Módulo 1',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Monitoria 03 - Estruturas de Controle',
                'data'      => '22 de Outubro, 2025',
                'duracao'   => '1h 52 min',
                'modulo'    => 'Módulo 2',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Monitoria 04 - Funções',
                'data'      => '29 de Outubro, 2025',
                'duracao'   => '2h 10 min',
                'modulo'    => 'Módulo 2',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Monitoria 05 - Listas e Vetores',
                'data'      => '05 de Novembro, 2025',
                'duracao'   => '1h 38 min',
                'modulo'    => 'Módulo 3',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

    // -------------------------------------------------------
    //  MONITORIA 2 — Estrutura de Dados
    // -------------------------------------------------------
    [
        'id'        => 'estrutura-de-dados',
        'titulo'    => 'Estrutura de Dados',
        'subtitulo' => 'Monitoria de Estrutura de Dados',
        'descricao' => 'Monitoria focada em estruturas de dados fundamentais: listas, pilhas, filas, árvores e grafos. Aborda implementação prática em C e análise de complexidade.',
        'cor'       => '#0f9d58',
        'icone'     => '🌲',
        'semestres' => ['2025.1', '2024.2', '2024.1'],
        'aulas'     => [
            [
                'titulo'    => 'Aula 01 - Introdução e Revisão de Ponteiros',
                'data'      => '10 de Março, 2025',
                'duracao'   => '1h 55 min',
                'modulo'    => 'Módulo 1',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Aula 02 - Listas Encadeadas',
                'data'      => '17 de Março, 2025',
                'duracao'   => '2h 05 min',
                'modulo'    => 'Módulo 1',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Aula 03 - Pilhas e Filas',
                'data'      => '24 de Março, 2025',
                'duracao'   => '1h 40 min',
                'modulo'    => 'Módulo 2',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

    // -------------------------------------------------------
    //  MONITORIA 3 — Cálculo I
    // -------------------------------------------------------
    [
        'id'        => 'calculo',
        'titulo'    => 'Cálculo I',
        'subtitulo' => 'Monitoria de Cálculo I',
        'descricao' => 'Monitoria de apoio à disciplina de Cálculo Diferencial e Integral. Aborda limites, derivadas, integrais e aplicações com resolução de exercícios comentada.',
        'cor'       => '#e53935',
        'icone'     => '∫',
        'semestres' => ['2025.1', '2024.2'],
        'aulas'     => [
            [
                'titulo'    => 'Aula 01 - Limites e Continuidade',
                'data'      => '05 de Fevereiro, 2025',
                'duracao'   => '2h 20 min',
                'modulo'    => 'Módulo 1',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Aula 02 - Derivadas Básicas',
                'data'      => '12 de Fevereiro, 2025',
                'duracao'   => '1h 58 min',
                'modulo'    => 'Módulo 2',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

    // -------------------------------------------------------
    //  MONITORIA 4 — Programação Orientada a Objetos
    // -------------------------------------------------------
    [
        'id'        => 'poo',
        'titulo'    => 'Programação Orientada a Objetos',
        'subtitulo' => 'Monitoria de POO',
        'descricao' => 'Monitoria dedicada aos conceitos de POO: classes, objetos, herança, polimorfismo, encapsulamento e padrões de projeto. Exemplos práticos em Java.',
        'cor'       => '#f57c00',
        'icone'     => '☕',
        'semestres' => ['2025.1', '2024.2', '2024.1'],
        'aulas'     => [
            [
                'titulo'    => 'Aula 01 - Classes e Objetos',
                'data'      => '03 de Abril, 2025',
                'duracao'   => '1h 30 min',
                'modulo'    => 'Módulo 1',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Aula 02 - Herança e Polimorfismo',
                'data'      => '10 de Abril, 2025',
                'duracao'   => '2h 15 min',
                'modulo'    => 'Módulo 2',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
            [
                'titulo'    => 'Aula 03 - Interfaces e Classes Abstratas',
                'data'      => '17 de Abril, 2025',
                'duracao'   => '1h 50 min',
                'modulo'    => 'Módulo 2',
                'youtube_id'=> 'SUBSTITUA_PELO_ID_DO_YOUTUBE',
            ],
        ],
    ],

];

/**
 * Função auxiliar: retorna dados de uma monitoria pelo ID
 * Uso: $m = get_monitoria('algoritmos');
 */
function get_monitoria(string $id): ?array {
    global $monitorias;
    foreach ($monitorias as $m) {
        if ($m['id'] === $id) return $m;
    }
    return null;
}