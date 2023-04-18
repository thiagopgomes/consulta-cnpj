<?php

namespace App\Cnpj;

use App\Cnpj\Infra\Curl;

class ConsultaCNPJ
{
    private const URL_BASE = 'https://api-publica.speedio.com.br/buscarcnpj?cnpj=';
    private string $cnpj;

    public function __construct(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getCNPJ(): array
    {
        // endpoint
        $endpoint = self::URL_BASE . $this->preparaCNPJ($this->cnpj);

        //pega o crul
        $response = (new Curl($endpoint))->getCurl();

        $responseArray = json_decode($response, true);

        // validação para fazer o retorno
        return is_array($responseArray) ? $responseArray : [];
    }

    public function preparaCNPJ(string $cnpj): string
    {
        $cnpjSemPontuacao = str_replace([".", ",", "/", "-"], "", $cnpj);
        return $cnpjSemPontuacao;
    }
}
