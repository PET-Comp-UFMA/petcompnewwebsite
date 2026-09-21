<?php
/**
 * Segue o mesmo padrão do conexao.php que já existe em produção:
 * credenciais vêm de variáveis de ambiente do servidor (DB_USER,
 * DB_PASSWORD), nunca em texto puro no código.
 */

/**
 * Credenciais do banco. Em produção (HostGator), o próprio site já
 * define DB_USER e DB_PASSWORD como variáveis de ambiente do servidor
 * — a gente só reaproveita, sem nunca ter a senha em texto no código.
 * O "?? " depois é só um fallback pro seu ambiente LOCAL (XAMPP), que
 * não tem essas variáveis configuradas — em produção, os valores
 * reais do $_ENV sempre vencem.
 */
$hostname = "localhost";
$bd       = "petcom59_petcomp_db";
$usuario  = $_ENV['DB_USER'] ?? 'root';
$senha    = $_ENV['DB_PASSWORD'] ?? '';

try {
    $mysqli = new mysqli($hostname, $usuario, $senha, $bd);
    $mysqli->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    error_log("Falha ao conectar ao banco: " . $e->getMessage());
    die(json_encode(['ok' => false, 'erro' => 'Erro de conexão com o banco.']));
}

// Tempo mínimo (em meses) no programa pra poder emitir a declaração.
// Ajuste pra regra real do PETComp.
define('MESES_MINIMOS_ELEGIBILIDADE', 6);

// Carga horária de cada semestre COMPLETO no PPC antigo.
// Semestre incompleto não conta (regra confirmada com o PETComp).
define('HORAS_POR_SEMESTRE_PPC_ANTIGO', 45);

/**
 * Valida CPF (formato + dígitos verificadores).
 * Retorna os 11 dígitos limpos, ou false se inválido.
 */
function validarCpf(string $cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += (int)$cpf[$i] * (($t + 1) - $i);
        }
        $digito = ((10 * $soma) % 11) % 10;
        if ((int)$cpf[$t] !== $digito) {
            return false;
        }
    }

    return $cpf;
}

/**
 * Calcula meses completos e horas totais (PPC antigo: 45h por
 * semestre completo, semestre incompleto não conta) entre duas datas.
 * Retorna ['meses' => int, 'semestres' => int, 'horas' => int].
 */
function calcularHorasPpcAntigo(DateTime $inicio, DateTime $fim): array {
    $meses = $inicio->diff($fim)->y * 12 + $inicio->diff($fim)->m;
    $semestresCompletos = intdiv($meses, 6);
    $horas = $semestresCompletos * HORAS_POR_SEMESTRE_PPC_ANTIGO;

    return [
        'meses'     => $meses,
        'semestres' => $semestresCompletos,
        'horas'     => $horas,
    ];
}
