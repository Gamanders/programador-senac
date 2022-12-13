<?php    
    $selectcategoria = $conexao->PREPARE("SELECT * FROM categoria");
    $selectcategoria->execute();
    $categorias = $selectcategoria->fetchAll(PDO::FETCH_ASSOC);
    $selectci = $conexao->PREPARE("SELECT ci.* ,inte.contato ,inte.email ,inte.escolaridade ,inte.dtNasc as 'nascimento' ,inte.tpcontato as 'tipocontato' ,inte.nome as 'interessado' ,cur.nome as 'curso' ,cur.dtIni as 'inicio' ,cur.dtFim as 'fim' ,cur.cargaHoraria as 'ch' ,capacidade ,cat.nome as 'categoria' ,modalidade from cursosinteressados ci join interessados inte on ci.interessados_id = inte.id join cursos cur on cur.id = ci.cursos_id join categoria cat on cur.categoria_id = cat.id");
    $selectci->execute();
    $cursointeressados = $selectci->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
    if(isset($_SESSION["usuario"])){
        $tipo = $_SESSION["tipo"];        
        if($tipo == "admin"){
?>
<div style="border:gray solid 2px; border-radius:15px; border-shadow 5px 5px black; width: 80vw; text-align:center; padding:5px;">
    <h1 style="color: gray;">
        Interessados
        <sup>
            <small>
                Selecione Categoria/Modalidade :: Cursos >>>  visualizar
            </small>
        </sup>
    </h1>
    <hr>
    <?php
       // var_dump($categorias);
        $contador = 0;
        foreach($categorias as $c){
            print"
                    <a href='?pagina=interessados&categoria='".$c['id']."' class='caixa'>".
                        $c['nome']." - ".$c['modalidade']
                    ."</a>
                ";
                $contador++;
                if($contador == 4){
                    print "<br><br>";
                    $contador=0;
                }
        }       
    ?>
</div>
<?php            
        }
    }
    else{
        print 
        
        "<h1 style='color:red; text-align:center'>
            Sejá empresário da dança pra ter acesso aos privilegios que só Canhotin oferece
        </h1>";
    }
?>