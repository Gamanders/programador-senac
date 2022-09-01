<?php

$nota1 = 8;
$nota2 = 8;
$media = ($nota1 + $nota2)/2;
print $media;
print "<br>";

do{
    $media = $media + 1;
    print $media;
    print "<br>";
}while($media<7);


if($media >=7){
    print "Aprovado";
    print "<br>";
    }
else{
    print $media;
    print "<br>";   
}