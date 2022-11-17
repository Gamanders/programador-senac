<p class="h2 text-center mt-5">
    Interesses
</p>
<hr>
<?php
$conexao = new PDO("mysql:dbname=recepcao;host=localhost", "root", "");
$selectcursos = $conexao->PREPARE("SELECT cursos.*, categoria.nome as 'categoria', categoria.modalidade as 'modalidade' from cursos join categoria on cursos.categoria_id = categoria.id");
$selectcursos->execute();
$cursos = $selectcursos->fetchAll(PDO::FETCH_ASSOC);
$selectinteressados = $conexao->PREPARE("SELECT * from interessados");
$selectinteressados->execute();
$interessados = $selectinteressados->fetchAll(PDO::FETCH_ASSOC);
$selectci = $conexao->PREPARE("SELECT ci.* ,inte.contato ,inte.email ,inte.escolaridade ,inte.dtNasc as 'nascimento' ,inte.tpcontato as 'tipocontato' ,inte.nome as 'interessado' ,cur.nome as 'curso' ,cur.dtIni as 'inicio' ,cur.dtFim as 'fim' ,cur.cargaHoraria as 'ch' ,capacidade ,cat.nome as 'categoria' ,modalidade from cursosinteressados ci join interessados inte on ci.interessados_id = inte.id join cursos cur on cur.id = ci.cursos_id join categoria cat on cur.categoria_id = cat.id");
$selectci->execute();
$cursointeressados = $selectci->fetchAll(PDO::FETCH_ASSOC);
//var_dump($interessados);
?>
<div style="display: flex; justify-content:center;">
    <form method="POST">
        <input class="form-control" type="hidden" name="cadcurso" value="interesses">
        <input type="hidden" name="cadinteressado" value="cadastro">
        <label style="font-weight:900;">Cursos</label>
        <select class="form-control" name="cadcurso">
            <?php
            foreach ($cursos as $c) {
                print
                    "<option value='" . $c['id'] . "' style='width:100%;'>" .
                    $c['nome'] . " - " . $c['categoria'] . " - " . $c['modalidade'] .
                    "</option>";
            }
            ?>
        </select>
        <label style="font-weight:900;">Interessados</label>
        <select class="form-control" name="cadinteressado">
            <?php
            foreach ($interessados as $i) {
                print
                    "<option value='" . $i['id'] . "' style='width:100%;'>" .
                    $i['nome'] .
                    "</option>";
            }
            ?>
        </select>
        <button class="btn btn-outline-dark">
            Registrar
        </button>
    </form>
</div>
<hr>
<hr>
<table style="width:100%">
    <thead>
        <tr style="font-weight:900; text-align:center;">
            <td>id</td>
            <td>Categoria/Modalidade</td>
            <td>Curso</td>
            <td>Interessado</td>
            <td>Contato</td>
            <td>Email</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($cursointeressados as $ci) {
            print "
                    <tr style='text-align:center;'>
                        <td>"
                . $ci['cursos_id'] . " - " . $ci['interessados_id'] .
                "</td>
                        <td>"
                . $ci['categoria'] . " / " . $ci['modalidade'] .
                "</td>
                        <td>"
                . $ci['curso'] .
                "</td>
                        <td>"
                . $ci['interessado'] .
                "</td>
                        <td>"
                . $ci['contato'] .
                "</td>
                        <td>"
                . $ci['email'] .
                "</td>
                    </tr>
                    ";
        }
        ?>
    </tbody>
</table>
<div style="display:flex; justify-content:center; margin-top: 30px ;">

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

</div> 