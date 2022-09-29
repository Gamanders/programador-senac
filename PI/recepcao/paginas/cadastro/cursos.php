<h1 style="text-align:center;">
    Cursos
</h1>
<?php
    $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
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
<div style="display:flex; justify-content:center;">
    <div style="width:30vw; margin:auto; font-size:1.2em">
        <form  method="POST">
            <input type="hidden" name="pagina" value="cadastro">
            <input type="hidden" name="cad" value="curso">
            <input type="hidden" name="sucesso" value="true">
            <label>
                Categoria
            </label>
            <select style="width:100%; margin-bottom:10px;" name="categoria" >
                <?php
                foreach($resultado as $res){
                    print "<option value=";
                    print $res['id'].">";
                    print $res['nome']." / ".$res['modalidade'];
                    echo "</option>";
                } 
                ?>
            </select>
            <label>
                nome cursos
            </label>
            <input style="width:100%; margin-bottom:10px; "type="text" name="nomeCurso">
            <table style = "width:100%;">
            <tr>
                    <td>
                        <label>
                            data de inicio
                        </label>
                    </td>
                    <td>
                        <label>
                            data de fim
                        </label>
                    </td>
            </tr>
            <tr>
                    <td>
                        <input style="width:100%; margin-bottom:10px; "type="date" name="dataInicio">
                    
                    </td>
                    <td>
                        <input style="width:100%; margin-bottom:10px; "type="date" name="dataFim">
                    </td>
            </tr>
            </table>

            <table style="width:100%">
                <tr>
                    <td>
                        <label>
                            carga horaria
                        </label>
                    </td>
                    <td>
                        <label>
                            capacidade
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="width:100%; margin-bottom:10px; "type="number" name="cargahoraria">
                    </td>
                    <td>
                        <input style="width:100%; margin-bottom:10px; "type="number" name="capacidade">
                    </td>
                </tr>
            </table>

            <button>
                cadastrar
            </button>
        </form>
    </div>
    <div style="width:40vw; margin:auto; font-size:0.9em">
         <?php
            $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
            $selectCursos = $conexao->PREPARE("select cursos.id, cursos.nome, categoria.nome as 'categoria', categoria.modalidade FROM cursos join categoria ON cursos.categoria_id = categoria.id");
            $selectCursos->execute();
            $cursos = $selectCursos->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($cursos);
         ?>
        <table>
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
                                    <a href=''><i style='color:orange;'class='fa-solid fa-pencil'></i></a>
                                    <a href=''><i style='color:red;' class='fa-solid fa-trash'></i></a> 
                                    <a href=''><i style='color:blue;'class='fa-solid fa-eye'></i></a>"."</td>
                            </tr>";

                    }
                ?>
            </tbody>
        </table>
    </div>
</div>


