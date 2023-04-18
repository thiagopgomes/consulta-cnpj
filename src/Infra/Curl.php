<?php

namespace App\Cnpj\Infra;

class Curl
{
    private string $endpoint;

    public function __construct(string $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getCurl(): string
    {
        // inicia o curl
        $curl = curl_init();

        // configurações do curl
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        // executa a requisição
        $response = curl_exec($curl);

        // fecha o curl
        curl_close($curl);

        return $response;
    }
}
