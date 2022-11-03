<h1 style="text-align:center;">
    Cursos
</h1>
<hr>
<?php
$sqlselect = $conexao->PREPARE("SELECT * FROM categoria");
$sqlselect->execute();
$resultado = $sqlselect->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
if (isset($_POST['sucesso'])) {
    $sucesso = $_POST['sucesso'];
    if ($sucesso == "true") {
        print "
                <div style='width:60vw; margin:auto; font-size:1.2em; padding:5px; border: solid 2px green; border-radius:10px; background:lightgreen;'>
                    <p style='text-align:center; color:darkgreen; font-weight:900;'>
                        Cadastro realizado com sucesso!
                    </p>
                </div>
            ";
    }
}
?>
<div class="row col d-flex justify-content-center mb-4">
    <form method="POST">
        <input class="form-control" type="hidden" name="pagina" value="cadastro">
        <input class="form-control" type="hidden" name="cad" value="curso">
        <input class="form-control" type="hidden" name="sucesso" value="true">
        <?php
        if (isset($ratualiza)) {
            print "<input class='form-control' type='hidden' name='atualizar' value='" . $edicao . "'>";
        }
        ?>
        <div class="row">
            <div class="col">
                <label class="label-control">
                    Nome
                </label>
                <input class="form-control mb-2" type="text" name="nomeCurso">
            </div>
            <div class="col">
                <label class="label-control">
                    Categoria
                </label>
                <select class="form-control" name="categoria">
                    <?php
                    foreach ($resultado as $res) {
                        print "<option value=";
                        print $res['id'] . ">";
                        print $res['nome'] . " / " . $res['modalidade'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="label-control">
                    Data de Inicio
                </label>
                <input class="form-control" type="date" name="dataInicio">
            </div>
            <div class="col">
                <label class="label-control">
                    Data de Fim
                </label>
                <input class="form-control" type="date" name="dataFim">
            </div>
            <div class="col">
                <label class="label-control">
                    Carga Horária
                </label>
                <input class="form-control" type="number" name="cargahoraria">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="label-control">
                    Capacidade
                </label>
                <input class="form-control" type="number" name="capacidade">
            </div>
            <div class="col">
                <label class="label-control">
                    Disponilibidade
                </label>
                <select class="form-control" name="disponibilidade">
                    <option value="manha">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>
            </div>
            <div class="col d-flex justify-content-center align-items-end">
                <button class="btn btn-outline-primary">
                    Cadastrar
                </button>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Todos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Saúde</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Informática</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Administração</a>
            </li>
        </ul>
    </div>
    <div class="col-12">
        <?php
        $selectQtdCursos = $conexao->PREPARE("select count(*) AS 'qtd' from cursos");
        $selectQtdCursos->execute();
        $qtdCursos =  $selectQtdCursos->fetchAll(PDO::FETCH_ASSOC);
        $qCursos = $qtdCursos[0]["qtd"];
        if (($qCursos % QTDPAGINACAO) == 0) {
            $paginas = intval($qCursos / 10);
            print $paginas;
        } else {
            $paginas = intval($qCursos / 10) + 1;
            print $paginas;
        }
        $paginacao = isset($_GET["paginacao"]) ? $_GET["paginacao"] : "0";
        $selectCursos = $conexao->PREPARE("select cursos.id, cursos.nome, categoria.nome as 'categoria', categoria.modalidade FROM cursos join categoria ON cursos.categoria_id = categoria.id order by categoria.nome LIMIT " . QTDPAGINACAO . " OFFSET " . $paginacao);
        $selectCursos->execute();
        $cursos = $selectCursos->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table class="table table-striped">
            <thead>
                <tr style="font-weight:900; text-align:center;">
                    <td>id</td>
                    <td>Curso</td>
                    <td>Categoria</td>
                    <td>Modalidade</td>
                    <td>Ações</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $item = 1;
                foreach ($cursos as $curso) {
                    print
                        "
                            <tr style='text-align:center;'>
                                <td>" . ($item++) . "</td>
                                <td>" . $curso['nome'] . "</td>
                                <td>" . $curso['categoria'] . "</td>
                                <td>" . $curso['modalidade'] . "</td>
                                <td>" . "
                                    <a href='?pagina=cadastro&cad=curso&editar=" . $curso['id'] . "'><i style='color:orange;'class='fa-solid fa-pencil'></i></a>
                                    <a href='?pagina=cadastro&cad=curso&excluir=" . $curso['id'] . "'><i style='color:red;' class='fa-solid fa-trash'></i></a> 
                                    <a href='?pagina=cadastro&cad=curso&detalhes=" . $curso['id'] . "'><i style='color:blue;'class='fa-solid fa-eye'></i></a>" . "</td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-12 d-flex justify-content-center align-items-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                <?php

                $item = isset($_GET['paginacao'])?$_GET['paginacao']:0;
                for ($i = 0; $i < $paginas; $i++) {
                    $p = $i * QTDPAGINACAO;
                 
                ?>

                    <li class='page-item'>
                        <a class='page-link' 
                        <?php
                              print $p;
                              print $item;
                            if ($item == $p) {
                                print "active";
                        }

                        ?>

                            <?php
                                print
                                    "href='?pagina=cadastro&cad=curso&paginacao=" . $p . "'>
                                    ".($i+1)."
                            
                                </a>
                                </li>";
                            }
                                
                            ?> 
                        <li class="page-item"><a class="page-link" href="#">Próximo</a>
            </ul>
        </nav>
    </div>
</div>