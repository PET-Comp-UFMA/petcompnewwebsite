<?php 

class declaracaoRules
{

    public function verificarSaida(array $aluno): ?string
    {
        if (empty($aluno['saida']) || $aluno['saida'] == '---') {
            return 'O aluno ainda está ativo.';
        }

        return null;
    }

    public function verificarDiasPet(array $aluno): ?string
    {
        
        $permanencia = (int) $aluno['permanencia'];

        if ($permanencia < 180) {
            return 'O aluno não possui horas suficientes no PET.';
        }

        return null;
    }

    public function verificar(array $aluno): array
    {
        $erros = [];

        $erro = $this->verificarDiasPet($aluno);
        if ($erro !== null) {
            $erros[] = $erro;
        }

        $erro = $this->verificarSaida($aluno);
        if ($erro !== null) {
            $erros[] = $erro;
        }

        return $erros;
    }
} 