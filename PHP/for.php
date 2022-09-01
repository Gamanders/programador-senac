<?php 
    for($i=0;$i<10;$i++){
        
        if($i == 5) 
        {
            continue; // Pula o restante do código posterior onde se encontra a instrução continue e vai para o novo ciclo 
            //break; // Interrompe todos os ciclos; 
        }
         
        //print $i;
        //print " ::: ";
        
    }

    $comidaBrasileira = array(['nome'=>'Feijoada','tipo'=>'carioca','valor'=>30]);
    array_push($comidaBrasileira,['nome'=>'Buchada','tipo'=>'nordestina','valor'=>20]);
    array_push($comidaBrasileira,['nome'=>'Mugunza','tipo'=>'nordestina','valor'=>2]);
    array_push($comidaBrasileira,['nome'=>'Vatapa','tipo'=>'nordestina','valor'=>15]);
    array_push($comidaBrasileira,['nome'=>'Pizza','paulista','valor'=>70]);
    array_push($comidaBrasileira,['nome'=>'Macorrene','paulista','valor'=>25]);
    array_push($comidaBrasileira,['nome'=>'Torta','paulista','valor'=>30]);

    for($i=0;$i<=5;$i++){
        print $comidaBrasileira[$i]['nome'];
    }

    echo "<br>";

    foreach($comidaBrasileira as $comida){
        print ($comida['nome']);
    }
?>