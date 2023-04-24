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
if(empty($consulta)) {
    die('Problemas ao consultar CNPJ');
}

// interrope a execução caso o CNPJ não seja encontrado
if(isset($consulta['error'])){
    die($consulta['error']);
}

// array de dados que quero no retorno
$infoDesejadas = ['CNPJ', 'RAZAO SOCIAL', 'LOGRADOURO', 'NUMERO', 'COMPLEMENTO', 'BAIRRO', 'CEP', 'MUNICIPIO'];

// imprime os dados
foreach ($infoDesejadas as $chave){
    echo $chave . " => " . $consulta[$chave] . PHP_EOL;
}
