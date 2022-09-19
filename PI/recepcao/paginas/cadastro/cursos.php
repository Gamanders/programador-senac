<h1>
    Cursos
</h1>
<?php
    $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
    $sqlselect = $conexao->PREPARE("SELECT * FROM categoria");
    $sqlselect->execute();
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
