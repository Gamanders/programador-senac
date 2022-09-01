<?php
function troco($valor){
    $notas = array(100,50,20,10,5,2,1,0.50,0.25,0.10,0.05,0.01);
    print $valor."\n";
    for ($i = 0; $i<=11; $i++){
        $resto = fmod($valor, $notas[$i]);
        print (($valor-$resto)/$notas[$i]);    
        print (($i<=6)?(" nota(s) de R$ ".$notas[$i].",00"):(" moedas(s) de R$ ".$notas[$i]));    
        $valor = $resto;
        print "\n";
    }
}
function idadeEmDias($dias){
    print intval($dias/365)." anos \n";
    $dias = fmod($dias,365);
    print intval($dias/30)." meses \n";
    $dias = fmod($dias,365);
    print $dias." dias \n";
}
function idadeEmAnos($anos){
    print $anos." anos\n";
    print ($anos*12)." meses\n";
    print ($anos*48)." semanas\n";
    print ($anos*365)." dias\n";
}
?>