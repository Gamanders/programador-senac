<?php
$condicao=true;
$j = 4;
//While: Só faz se a condição for verdadeira
while($condicao){
    echo $j."<br>";
    if($j===3){
        $condicao = false;
        echo "<br>Bingo nro 3 sorteado ";
        echo $j;
    }
    $j=random_int(1,20);
}
//Do: Faz pelo menos uma vez ainda que a condição seja falsa!
do{
    echo "Bingo Do".$j."<br>";
    if($j===3){
        $condicao = false;
        echo "<br>Bingo Do nro 3 sorteado ";
        echo $j;
    }
    $j=random_int(1,20);
}
while($condicao);
?>

