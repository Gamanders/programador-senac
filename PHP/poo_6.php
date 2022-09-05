<?php 
class Matematica{

    public static $valor;

    public static function som($valor1,$valor2){         
       return $valor1 + $valor2;
    }
    public static function sub($valor1,$valor2){         
        return $valor1 - $valor2;
     }
     public static function mul($valor1,$valor2){         
        return $valor1 * $valor2;
     }
     public static function div($valor1,$valor2){
        if($valor2 == 0){
            print "Divisão por zero não é permitida";
        }
        else{
            return $valor1 / $valor2;
        }
     }
}

Matematica::$valor = 30;
print Matematica::$valor;
print "\n";
print Matematica::som(10,15);
print "\n";
print Matematica::sub(60,12);
print "\n";
print Matematica::mul(6,5);
print "\n";
print Matematica::div(50,25);

?>
