<?php
class Carro{
    private $velocidade;
   // function __construct($velo){
   //     $this->velocidade = $velo;
   //     print "Partida com Velocidade Inicial de ".$this->velocidade;        
   // }
    function __construct(){
        $this->velocidade = 0;
        print "Partida com Velocidade Inicial de ".$this->velocidade;        
    }    
    function __destruct(){        
        print "Carro Destruido";        
    }    
}

$calhambeque = new Carro(15);
print "\n";
$fusca = new Carro(30);
print "\n";
$camaro = new Carro(200);
print "\n";

?>