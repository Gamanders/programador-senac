<?php
$idade = 68;
$crianca = 12;
$adulto = 18;
$coroa = 40;
$idoso = 65;
if ($idade < $crianca) {
    echo "Criança";
}
elseif($idade < $adulto){
    echo "Adolescente";
}
elseif($idade < $coroa){
    echo "Adulto";
}
elseif($idade < $idoso){
    echo "Coroa";
}
else{
    echo "Idoso";
}
echo "<br>";
// Aproveitando pra mostrar o operador ternário condicional
//echo "<br>";
// condição ? retorno qnd verdade : retorno qnd falso
$situacao = ($idade< $adulto)?"Menoridade":"Maioridade";
echo $situacao;
echo "<br>";
echo ($idade< $adulto)?"Menoridade":"Maioridade";

?>