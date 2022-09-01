<?php
$fruta = "Maça";
$fruta = "Pera";

// Indice Numérico >> Padrão
$frutasTropicais = array("Maça","Pera","Uva");
$frutasExoticas = array("Pitaya","Carambola","Pistache");
$frutasVermelhas = array("Morango","Cereja","Tomate");
$frutas = array($frutasTropicais,$frutasExoticas);
array_push($frutas,$frutasVermelhas);
//print $frutas[0][0];
$comida = "Feijão";
//print $comida;

$comidas = array("Legumes","Cuscuz");

array_push($comidas,"Feijão");
array_push($comidas,"Arroz");
array_push($comidas,"Macarrão");

//print $comidas[1];

$bebidas[0] = "Água";
$bebidas[1] = "Refrigerante";
$bebidas[2] = "Suco";

//print $bebidas[1];

$gelados = [["Sorvete","Picolé","Geladinho"],["Pizza","Cuscuz","Pirão"],["a","b","c"]];

//print $gelados[2][2];

//$frutasAssociativo(["fruta1"=>"Maça"],["fruta2"=>"Pera"]);
//print $fruta;
//print $frutas[2];
//print $frutasAssociativo[0]["fruta1"];

$comidaBrasileira = array(['nome'=>'Feijoada','tipo'=>'carioca','valor'=>30]);
array_push($comidaBrasileira,['nome'=>'Buchada','tipo'=>'nordestina','valor'=>20]);
array_push($comidaBrasileira,['nome'=>'Mugunza','tipo'=>'nordestina','valor'=>2]);
array_push($comidaBrasileira,['nome'=>'Vatapa','tipo'=>'nordestina','valor'=>15]);
array_push($comidaBrasileira,['nome'=>'Pizza','paulista','valor'=>70]);
print $comidaBrasileira[4]['tipo'];
?>