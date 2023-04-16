<?php

namespace App\Cnpj;

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
        $endpoint = self::URL_BASE . $this->cnpj;

        // inicia o curl
        $curl = curl_init();

        // configurações do curl
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        // executa a requisição
        $response = curl_exec($curl);

        // fecha o curl
        curl_close($curl);

        $responseArray = json_decode($response, true);

        // validação para fazer o retorno
        return is_array($responseArray) ? $responseArray : [];
    }
}
