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
 *  3. No phpMyAdmin, abra a tabela "monitorias_aulas" e insira uma nova linha
 *
 *  Como adicionar uma nova monitoria:
 *  1. No phpMyAdmin, abra a tabela "monitorias" e insira uma nova linha
 *  2. No campo "semestres", separe os períodos por vírgula (ex: 2025.2,2025.1)
 * ============================================================
 */

require_once 'conexao.php';

// -------------------------------------------------------
//  Busca todas as monitorias
// -------------------------------------------------------
$result = $mysqli->query("SELECT * FROM monitorias");
$monitorias = [];

while ($row = $result->fetch_assoc()) {

    // Converte semestres de string "2025.2,2025.1" para array
    $row['semestres'] = array_map('trim', explode(',', $row['semestres']));

    // Busca as aulas desta monitoria
    $id = $mysqli->real_escape_string($row['id']);
    $res_aulas = $mysqli->query(
        "SELECT * FROM monitorias_aulas WHERE monitoria_id = '$id' ORDER BY id ASC"
    );

    $aulas = [];
    while ($aula = $res_aulas->fetch_assoc()) {
        $aulas[] = [
            'titulo'     => $aula['titulo'],
            'data'       => $aula['data'],
            'duracao'    => $aula['duracao'],
            'modulo'     => $aula['modulo'],
            'semestre'   => $aula['semestre'],
            'youtube_id' => $aula['youtube_id'],
        ];
    }

    $row['aulas'] = $aulas;
    $monitorias[] = $row;
}

// -------------------------------------------------------
//  Função auxiliar: retorna dados de uma monitoria pelo ID
//  Uso: $m = get_monitoria('algoritmos-1');
// -------------------------------------------------------
function get_monitoria(string $id, array $lista_monitorias): ?array
{
    foreach ($lista_monitorias as $m) {
        if (trim($m['id']) === $id) return $m;
    }
    return null;
}
