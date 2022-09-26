<h1>
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
                <div style='width:30vw; margin:auto; font-size:1.2em; background-color:light-green; margin: solid 2px darkgreen; border-radius:10px;'>
                    <p style='text-align:center; color:darkgreen;'>
                        Cadastro realizado com sucesso!
                    </p>
                </div>
            ";
        }
    }
?>
<?php
    print " 
        <div style='width:30vw; margin:auto; font-size:1.2em; background-color:light-green; margin'>
            <p style='text-align:center; color:darkgreen;'>
    ";

<<<<<<< HEAD

?>
<div style="width:30vw; margin:auto; font-size:1.2em">
=======
<div style="width:30vw; margin:auto; font-size:0.8em">
>>>>>>> c3c70cb2c83ff01e3a6574aee3062ad9c8a8dec0
    <form  method="POST">
        <input type="hidden" name="pagina" value="cadastro">
        <input type="hidden" name="cad" value="curso">
        <input type="hidden" name="sucesso" value="true">
        <label>
            Categoria
        </label>
        <select style="width:100%; margin-bottom:10px;" name="categoria" >
            <?php
<<<<<<< HEAD
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
=======
              foreach($resultado as $res){
                    print "<option value=";
                    print $res['id'].">";
                    print $res['nome']." / ".$res['modalidade'];
                    echo "</option>";
                }
            ?>
        </select>
        <label>
            Nome do Curso
        </label>
        <input style="width:100%; margin-bottom:10px; "type="text" name="nomeCurso">
        <br>
        <table style="width:100%;">
            <tr>
                <td>
                    <label>
                        Data de Inicio
>>>>>>> c3c70cb2c83ff01e3a6574aee3062ad9c8a8dec0
                    </label>
                </td>
                <td>
                    <label>
<<<<<<< HEAD
                        data de fim
                    </label>
                </td>
           </tr>
           <tr>
                <td>
                    <input style="width:100%; margin-bottom:10px; "type="date" name="dataInicio">
                   
=======
                        Data de Fim
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input style="width:100%; margin-bottom:10px; "type="date" name="dataInicio">
>>>>>>> c3c70cb2c83ff01e3a6574aee3062ad9c8a8dec0
                </td>
                <td>
                    <input style="width:100%; margin-bottom:10px; "type="date" name="dataFim">
                </td>
<<<<<<< HEAD
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
=======
            </tr>
        </table>
        <table style="width:100%;">
            <tr>
                <td>
                    <label>
                        Carga Horária
                    </label>
                </td>
                <td>
                    <label>
                        Capacidade
>>>>>>> c3c70cb2c83ff01e3a6574aee3062ad9c8a8dec0
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input style="width:100%; margin-bottom:10px; "type="number" name="cargaHoraria">
                </td>
                <td>
<<<<<<< HEAD
                     <input style="width:100%; margin-bottom:10px; "type="number" name="capacidade">
                </td>
            </tr>
        </table>

        <button>
            cadastrar
=======
                    <input style="width:100%; margin-bottom:10px; "type="number" name="capacidade">
                </td>
            </tr>
        </table>        
        <button>
            Cadastrar
>>>>>>> c3c70cb2c83ff01e3a6574aee3062ad9c8a8dec0
        </button>
    </form>
</div>
