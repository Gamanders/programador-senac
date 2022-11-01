<h1 style="text-align:center;">
    Cursos
</h1>
<hr>
<?php    
    $sqlselect = $conexao->PREPARE("SELECT * FROM categoria");
    $sqlselect->execute();
    $resultado=$sqlselect->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
    if(isset($_POST['sucesso'])){
        $sucesso = $_POST['sucesso'];
        if($sucesso == "true"){
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
<div class="row col d-flex justify-content-center">
    <form  method="POST">
            <input class="form-control" type="hidden" name="pagina" value="cadastro">
            <input class="form-control" type="hidden" name="cad" value="curso">
            <input class="form-control" type="hidden" name="sucesso" value="true">
            <?php
                if(isset($ratualiza)){
                    print "<input class='form-control' type='hidden' name='atualizar' value='".$edicao."'>";                        
                }
            ?>            
            <label class="label-control">
                Categoria
            </label>
            <select class="form-control" name="categoria" >
                <?php
                    foreach($resultado as $res){
                        print "<option value=";
                        print $res['id'].">";
                        print $res['nome']." / ".$res['modalidade'];
                        echo "</option>";
                    } 
                ?>
            </select>            
            <label class="label-control">
                Nome
            </label>
            <input class="form-control" style="width:100%; margin-bottom:10px; "type="text" name="nomeCurso">
            <table class="table table-striped" style = "width:100%;">
            <tr>
                    <td>
                        <label class="label-control">
                            data de inicio
                        </label>
                    </td>
                    <td>
                        <label class="label-control">
                            data de fim
                        </label>
                    </td>
            </tr>
            <tr>
                    <td>
                        <input class="form-control" style="width:100%; margin-bottom:10px; "type="date" name="dataInicio">
                    
                    </td>
                    <td>
                        <input class="form-control" style="width:100%; margin-bottom:10px; "type="date" name="dataFim">
                    </td>
            </tr>
            </table>

            <table class="table table-striped" style="width:100%">
                <tr>
                    <td>
                        <label class="label-control">
                            carga horaria
                        </label>
                    </td>
                    <td>
                        <label class="label-control">
                            capacidade
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" style="width:100%; margin-bottom:10px; "type="number" name="cargahoraria">
                    </td>
                    <td>
                        <input class="form-control" style="width:100%; margin-bottom:10px; "type="number" name="capacidade">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label-control">
                            Disponilibidade
                        </label>    
                    </td>
                    <td>
                        <select class="form-control" name="disponibilidade">
                            <option value="manha">Manhã</option>
                            <option value="manha">Tarde</option>
                            <option value="manha">Noite</option>
                        </select>
                    </td>
                </tr>
            </table>

            <button>
                cadastrar
            </button>
        </form>
</div>
<div class="row col d-flex justify-content-center">
    <?php
        $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
        $selectCursos = $conexao->PREPARE("select cursos.id, cursos.nome, categoria.nome as 'categoria', categoria.modalidade FROM cursos join categoria ON cursos.categoria_id = categoria.id");
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
                foreach($cursos as $curso){
                    print 
                        "
                        <tr style='text-align:center;'>
                            <td>".$curso['id']."</td>
                            <td>".$curso['nome']."</td>
                            <td>".$curso['categoria']."</td>
                            <td>".$curso['modalidade']."</td>
                            <td>"."
                                <a href='?pagina=cadastro&cad=curso&editar=".$curso['id']."'><i style='color:orange;'class='fa-solid fa-pencil'></i></a>
                                <a href='?pagina=cadastro&cad=curso&excluir=".$curso['id']."'><i style='color:red;' class='fa-solid fa-trash'></i></a> 
                                <a href='?pagina=cadastro&cad=curso&detalhes=".$curso['id']."'><i style='color:blue;'class='fa-solid fa-eye'></i></a>"."</td>
                        </tr>";

                }
            ?>
        </tbody>
    </table>
</div>


