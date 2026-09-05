<?php

class declaracaoRegistro
{
    private string $arquivo;

    public function __construct()
    {
        $this->arquivo = __DIR__ . '/../data/registroDeclaracao.json';

        if (!file_exists($this->arquivo)) {
            file_put_contents($this->arquivo, '[]');
        }
    }

    public function buscarPorAluno(
        string $cpf,
        string $matricula
    ): ?array {

        $declaracoes = $this->ler();

        foreach ($declaracoes as $declaracao) {

            if (
                $declaracao['cpf'] === $cpf &&
                $declaracao['matricula'] === $matricula
            ) {
                return $declaracao;
            }
        }

        return null;
    }

    public function criar(array $aluno): string
    {
        $cpf = preg_replace('/\D/', '', $aluno['cpf']);
        $matricula = trim($aluno['matricula']);

        $declaracaoExistente = $this->buscarPorAluno(
            $cpf,
            $matricula
        );

        if ($declaracaoExistente !== null) {
            return $declaracaoExistente['codigo'];
        }

        $declaracoes = $this->ler();

        do {
            $codigo = $this->gerarCodigo();
        } while ($this->codigoExiste($declaracoes, $codigo));

        $declaracao = [
            'codigo' => $codigo,
            'nome' => $aluno['nome'],
            'matricula' => $aluno['matricula'],
            'cpf' => $aluno['cpf'],
            'entrada' => $aluno['entrada'],
            'saida' => $aluno['saida'],
            'horas_pet' => $aluno['horas_pet'],
            'emitida_em' => date('Y-m-d H:i:s')
        ];

        $declaracoes[] = $declaracao;

        $this->salvar($declaracoes);

        return $codigo;
    }

    private function gerarCodigo(): string
    {
        $ano = date('Y');

        $parteAleatoria = strtoupper(
            bin2hex(random_bytes(4))
        );

        return "PET-{$ano}-{$parteAleatoria}";
    }

    private function codigoExiste(
        array $declaracoes,
        string $codigo
    ): bool {

        foreach ($declaracoes as $declaracao) {
            if ($declaracao['codigo'] === $codigo) {
                return true;
            }
        }

        return false;
    }

    private function ler(): array
    {
        $conteudo = file_get_contents($this->arquivo);

        $dados = json_decode($conteudo, true);

        return is_array($dados) ? $dados : [];
    }

    private function salvar(array $declaracoes): void
    {
        file_put_contents(
            $this->arquivo,
            json_encode(
                $declaracoes,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            ),
            LOCK_EX
        );
    }

    public function buscarPorCodigo(string $codigo): ?array
    {
        $declaracoes = $this->ler();

        foreach ($declaracoes as $declaracao) {
            if ($declaracao['codigo'] === $codigo) {
                return $declaracao;
            }
        }

        return null;
    }
}