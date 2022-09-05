<?php
class Veiculo{
    private $velocidade = 0;
    public $qtdPassageiros = 0;
    public function getVelocidade()
    {
        return $this->velocidade;
    }
    public function setVelocidade($velocidade)
    {
        $this->velocidade = $velocidade;
        return $this;
    }
}

$carro = new Veiculo();
$carro->qtdPassageiros = 5;
print $carro->qtdPassageiros;
print "\n";
print $carro->getVelocidade();
$carro->setVelocidade(100);
print "\n";
print $carro->getVelocidade();
?>
