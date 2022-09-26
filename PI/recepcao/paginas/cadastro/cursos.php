<h1>
    Cursos
</h1>
<<<<<<< HEAD

=======
>>>>>>> 4223898847eeebcb0bdb391c34c260656cfbe979
<?php
    $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
    $sqlselect = $conexao->PREPARE("SELECT * FROM categoria");
    $sqlselect->execute();
<<<<<<< HEAD
    $resultado=$sqlselect->fetchAll(PDO::FETCH_ASSOC);

?>

<div style="width:30vw; margin:auto; font-seize:1.2em">
    <form  method="POST">
        <label>
            Categoria
        </label>
        <select style="width:100%; margin-bottom:10px;" name="modalidade" >
            <?php
             foreach($resultado as $res){
                print "<option value";
                print $res['id'].">";
                print $res['nome']."/".$res['modalidade'];
                echo "</option>";
            }
                print "<option value"; 
            ?>
        </select>
        <input style="width:100%; margin-bottom:10px; "type="text" name="nome do curso">
        <br>
        <input style="width:100%; margin-bottom:10px; "type="date" name="data de inicio">
        <br>
        <input style="width:100%; margin-bottom:10px; "type="date" name="data de fim">
        <br> 
        <input style="width:100%; margin-bottom:10px; "type="number" name="carga horaria">
        <br>
        <input style="width:100%; margin-bottom:10px; "type="number" name="capacidade">
        <br>
        <button>
            cadastrar
        </button>
    </form>
</div>
=======
    $resultado = $sqlselect->fetchAll(PDO::FETCH_ASSOC); 
    echo "<hr>";    
?>
<div style="width: 30vw; margin:auto;">
    <form method="POST">               
        <label>
           Categoria
        </label>
        <select style="width:100%; margin-bottom:10px;" name="modalidade">            
            <?php
                foreach($resultado as $res){
                    print "<option value='";
                    print $res['id']."'>";
                    print $res['nome']." / ".$res['modalidade'];
                    print "</option>";
                }
            ?>
        </select>        
        <button>
            Cadastrar
        </button>
    </form> 
</div> 
>>>>>>> 4223898847eeebcb0bdb391c34c260656cfbe979
