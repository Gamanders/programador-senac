<?php
/**
 * Classe Matematica
 * Atributos Privados valor1 e valor2
 * criar metodos get e set
 * criar metodos soma e subtração sem passagem de parâmetros
 */

 class Matematica{
    private $valor1;
    private $valor2;    
    /**
     * Get the value of valor1
     */ 
    public function getValor1()
    {
        return $this->valor1;
    }
    public function setValor1($valor1)
    {
        $this->valor1 = $valor1;
        return $this;
    }
    public function soma(){
        return $this->valor1+$this->valor2;
    }
    public function subtrair(){
        return $this->valor1-$this->valor2;
    }

    /**
     * Get the value of valor2
     */ 
    public function getValor2()
    {
        return $this->valor2;
    }

    /**
     * Set the value of valor2
     *
     * @return  self
     */ 
    public function setValor2($valor2)
    {
        $this->valor2 = $valor2;

        return $this;
    }
 }

 $conta = new Matematica;
 $conta->setValor1(20);
 $conta->setValor2(10);
 print "Resultado da Soma de ".$conta->getValor1()." mais ".$conta->getValor2()." eh ". $conta->soma();
 print "\n";
 print "Resultado da Subtração de ".$conta->getValor1()." mais ".$conta->getValor2()." eh ". $conta->subtrair(); 
?>