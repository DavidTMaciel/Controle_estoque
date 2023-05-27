<?php

require_once __DIR__ . '/../vendor/autoload.php';

function formartarMoeda($valor){
    $decimais = 2;
    $separadorDecial = ',';
    $separadorMilhares = '.';
    $simbolo = "R$";

     // Formata o número como valor monetário
    $valorFormatado = number_format($valor, $decimais, $separadorDecial,$separadorMilhares);

    $valorFormatado = $simbolo.' '.$valorFormatado;

    return $valorFormatado;
}