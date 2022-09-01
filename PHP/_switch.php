<?php

$diaDaSemana = 5;
$mesdoAno = 5;

function qualDiaDoMes($d,$m){
    echo "Você está alguma ";
    switch ($d) {
        case 1:
        echo "Domingo";
        break;
        case 2:
        echo "Segunda";
        break;
        case 3:
        echo "Terça";
        break;
        case 4:
        echo "Quarta";
        break;
        case 5:
        echo "Quinta";
        break;
        case 6:
        echo "Sexta";
        break;
        case 7:
        echo "Sábado";
        break;
        default:
        echo "Data inválida";
        break;
    }
    echo " do mês de ";
    switch ($m) {
        case 1:
        echo "Jan";
        break;
        case 2:
        echo "Fev";
        break;
        case 3:
        echo "Mar";
        break;
        case 4:
        echo "Abr";
        break;
        case 5:
        echo "Mai";
        break;
        case 6:
        echo "Jun";
        break;
        case 7:
        echo "Jul";
        break;
        case 8:
        echo "Ago";
        break;
        case 9:
        echo "Set";
        break;
        case 10:
        echo "Out";
        break;
        case 11:
        echo "Nov";
        break;
        case 12:
        echo "Dez";
        break;
        default:
        echo "Mês inválido";
        break;
    }
}

qualDiaDoMes($diaDaSemana,$mesdoAno);

?>