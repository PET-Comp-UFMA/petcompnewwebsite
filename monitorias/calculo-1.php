<?php
/**
* Monitoria: Calculo 1
* Para adicionar aula: copie um bloco e troque o youtube_id pelo ID do vídeo.
 */

return [
        'id'        => 'calculo-1',
        'id_json'   => 'calculo1',
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
    ];