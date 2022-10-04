<h1 style="text-align:center;">
    Interesses
</h1>
<hr>
<?php 
    $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
    $selectcursos = $conexao->PREPARE("SELECT cursos.*, categoria.nome as 'categoria', categoria.modalidade as 'modalidade' from cursos join categoria on cursos.categoria_id = categoria.id");
    $selectcursos->execute();
    $cursos = $selectcursos->fetchAll(PDO::FETCH_ASSOC);
    $selectinteressados = $conexao->PREPARE("SELECT * from interessados");
    $selectinteressados->execute();
    $interessados = $selectinteressados->fetchAll(PDO::FETCH_ASSOC);
?>
<div style="display: flex; justify-content:center;">
    <form>
        <input type="hidden" name="cad" value="interesses">    
        <label style="font-weight:900;">Cursos</label>   
        <select style="width=100%;" name="cursos">
            <?php
                foreach ($cursos as $c){
                    print 
                        "<option value='".$c['id']."' style='width:100%;'>".
                            $c['nome']." - ".$c['categoria']." - ".$c['modalidade'].
                        "</option>";                   
                }
            ?>
        </select>
        <label style="font-weight:900;">Interessados</label>   
        <select style="width=100%;" name="cursos">
            <?php
                foreach ($interessados as $i){
                    print 
                        "<option value='".$i['id']."' style='width:100%;'>".
                            $i['nome'].
                        "</option>";                   
                }
            ?>
        </select>
        <button>
            Registrar
        </button>
    </form>
</div>
<hr>
