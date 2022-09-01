<?php
//usar variável conteúdo simples
define("BANCODEDADOS","MySQL");
// uso de array padrão
define("IDADES",array(16,17,18,19,20));
// uso de array associativo
define("CONFIGURACAO",array("cor"=>"Azul","tamanho"=>"Medio","intensidade"=>"Forte"));
$casa = array(["garagem","oficina","dispensa"],["suite","banheira","sauna"]);
$comodos = array("sala","cozinha","quarto");
$andares = array("subsolo","piso","andar");
array_push($casa,$comodos);
array_push($casa,$andares);
define("MORADA", $casa);
print MORADA[1][1];
//var_dump(MORADA);
//print BANCODEDADOS;
//print IDADES[3];
//print CONFIGURACAO[0];
?>