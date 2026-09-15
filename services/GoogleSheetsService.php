<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetsService
{
    private Sheets $service;

    public function __construct()
    {
        $client = new Client();

        $client->setAuthConfig(
            'C:/xampp/credencial/pet-declaracao-910516b2d321.json'
        );

        $client->addScope(Sheets::SPREADSHEETS_READONLY);

        $this->service = new Sheets($client);
    }

    public function buscarDados(
        string $spreadsheetId,
        string $range
    ): array {
        $response = $this->service
            ->spreadsheets_values
            ->get($spreadsheetId, $range);

        return $response->getValues() ?? [];
    }

    public function buscarAluno(
        string $spreadsheetId,
        string $cpf,
        string $matricula
    ): ?array {

        $dados = $this->buscarDados(
            $spreadsheetId,
            'Pagina1!B6:M'
        );

        // Normaliza os dados recebidos
        $cpf = preg_replace('/\D/', '', $cpf);
        $matricula = trim($matricula);

        foreach ($dados as $linha) {

            $nome = trim((string) ($linha[0] ?? ''));

            $matriculaPlanilha = trim(
                (string) ($linha[6] ?? '')
            );

            $cpfPlanilha = preg_replace(
                '/\D/',
                '',
                (string) ($linha[7] ?? '')
            );

            if (
                $matriculaPlanilha === $matricula &&
                $cpfPlanilha === $cpf
            ) {
                return [
                    'nome' => $nome,
                    'matricula' => $matriculaPlanilha,
                    'cpf' => $cpfPlanilha,

                    'entrada' => $linha[1] ?? '',
                    'saida' => $linha[2] ?? '',
                    'permanenciaDias' => $linha[3] ?? '',
                    'permanenciaMes' => $linha[4] ?? '',
                    'horas_pet' => $linha[5] ?? '',

                    'aniversario' => $linha[8] ?? '',
                    'telefone' => $linha[9] ?? '',
                    'email' => $linha[10] ?? '',
                    'codigo' => $linha[11] ?? ''
                ];
            }
        }

        return null;
    }
}