<?php
    $estado = "RJ";

    /*
    if($estado == "PE"){
        print("Pernambuco");        
    }
    elseif($estado == "BA"){
        print("Bahia");        
    }
    elseif($estado == "RN"){
        print("Rio Grande do Norte");
    }
    elseif($estado == "PB"){
        print("Paraiba");        
    }
    elseif($estado == "PI"){
        print("Piaui");        
    }
    elseif($estado == "AL"){
        print("Alagoas");        
    }
    elseif($estado == "CE"){
        print("Ceará");        
    }
    else{
        print("Maranhão");
    }
    */
    switch($estado){
        case 'PE':
            print "Pernambuco";
            break;
        case 'BA':
            print "Bahia";
            break;
        case 'PI':
            print "Piaui";
            break;
        case 'SE':
            print "Sergipe";
            break;
        case 'CE':
            print "Ceará";
            break;
        default:
            print "Estado fora do Nordeste";
            break;
    }

?>