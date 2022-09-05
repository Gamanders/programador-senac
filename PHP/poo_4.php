<?php
class Veiculo{
    private $velocidade;
    private $qtdPassageiros;
    public function getVelocidade()
    {
        return $this->velocidade;
    }      
    public function setVelocidade($velocidade)
    {
        if($velocidade < 200){
            $this->velocidade = $velocidade;
        }
        else{
            print "Velocidade maior que a permitida na via";
        }
        return $this;
    }
    public function aumentarVelocidade($acrescimo){
        $this->velocidade+=$acrescimo;
    }

    /**
     * Get the value of qtdPassageiros
     */ 
    public function getQtdPassageiros()
    {
        return $this->qtdPassageiros;
    }
}

class Carro extends Veiculo{
    public $porta;
    public function cavaloDePau($lado){
        print " 180º rodados ao lado ".$lado;
    }
}

class Moto extends Veiculo{    
    public $guidao;
    public function daroGrau($angulo){
        print " Roda dianteira levantado a ".$angulo." do chao";
    }
}

$pop = new Moto();
$pop->setVelocidade(60);
$pop->guidao = "triangular";
print $pop->daroGrau(20)." com o guidao ".$pop->guidao." na velo de ".$pop->getVelocidade();

print "\n";

$fusca = new Carro();
$fusca->setVelocidade(190);
$fusca->porta = 4;
print $fusca->cavaloDePau("esquerdo")." com ".$fusca->porta." portas na velo de ".$fusca->getVelocidade();

?>