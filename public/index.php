<?php

use App\Cnpj\ConsultaCNPJ;

require __DIR__ . '/../vendor/autoload.php';

// verifica se o cnpj foi passado como argumento via terminal
if(!isset($argv[1])){
    die('Informe o cnpj via terminal');
}

$cnpj = $argv[1];

$consulta = (new ConsultaCNPJ($cnpj))->getCNPJ();

// verifica o resultado
if(empty($resultado)) {
    die('Problemas ao consultar CNPJ');
}

// array de dados que quero no retorno
$infoDesejadas = ['CNPJ', 'RAZAO SOCIAL', 'LOGRADOURO', 'NUMERO', 'COMPLEMENTO', 'CEP', 'BAIRRO'];

// imprime os dados
foreach ($infoDesejadas as $chave){
    echo $chave . " => " . $resultado[$chave] . PHP_EOL;
}
