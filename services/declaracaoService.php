<?php

require_once __DIR__ . '/GoogleSheetsService.php';
require_once __DIR__ . '/../DeclaracaoRegra/declaracaoRules.php';
require_once __DIR__ . '/declaracaoRegistro.php';

class declaracaoService
{
    private GoogleSheetsService $googleSheets;
    private declaracaoRules $rules;
    private declaracaoRegistro $registry;

    public function __construct()
    {
        $this->googleSheets = new GoogleSheetsService();
        $this->rules = new declaracaoRules();
        $this->registry = new declaracaoRegistro();
    }

    public function validarDeclaracao(string $codigo): ?array
    {
        return $this->registry->buscarPorCodigo($codigo);
    }

    public function verificarAluno(
        string $spreadsheetId,
        string $cpf,
        string $matricula
    ): array {

        $aluno = $this->googleSheets->buscarAluno(
            $spreadsheetId,
            $cpf,
            $matricula
        );

        if ($aluno === null) {
            return [
                'aprovado' => false,
                'erros' => [
                    'Aluno não encontrado.'
                ]
            ];
        }

        $erros = $this->rules->verificar($aluno);

        if (!empty($erros)) {
            return [
                'aprovado' => false,
                'aluno' => $aluno,
                'erros' => $erros
            ];
        }

        $codigo = $this->registry->criar($aluno);

        return [
            'aprovado' => true,
            'aluno' => $aluno,
            'codigo' => $codigo,
            'erros' => []
        ];
    }
}