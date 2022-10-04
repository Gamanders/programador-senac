<?php
    $conexao = new PDO("mysql:dbname=recepcao;host:localhost","root","");
    if(isset($_GET['editar'])){
        $edicao = $_GET['editar'];
        $atualiza = $conexao->PREPARE("SELECT * FROM categoria WHERE id = :ID;");
        $atualiza->bindParam(":ID",$edicao);
        $atualiza->execute();
        $ratualiza = $atualiza->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<h1 style="text-align:center;">
    Categoria
</h1>
<hr>
<div style="display:flex; justify-content:center;">
    <div style="width: 30vw; margin:auto;">
        <form method="POST">
            <input type="hidden" name="pagina" value="cadastro">
            <input type="hidden" name="cad" value="categoria">
            <?php
                if(isset($ratualiza)){
                    print "<input type='hidden' name='atualizar' value='".$edicao."'>";                    
                }
            ?>
            <label>
                Nome
            </label>
            <input style="width:100%; margin-bottom:10px;" type="text" name="nomeCategoria"
                <?php                    
                        if(isset($ratualiza)){
                            print "value='".$ratualiza[0]['nome']."'";
                        }
                ?>
            >
            <label>
                Modalidade
            </label>
            <select style="width:100%; margin-bottom:10px;" name="modalidade">
                <option value="ead"
                        <?php
                            if(isset($ratualiza)){
                                if($ratualiza[0]['modalidade']=="ead"){
                                    print "selected";
                                }
                            }
                        ?>
                    >
                    Ensino à Distância
                </option>
                <option value="presencial"
                        <?php
                            if(isset($ratualiza)){
                                if($ratualiza[0]['modalidade']=="presencial"){
                                    print "selected";
                                }
                            }
                        ?>
                    >
                    Presencial
                </option>
                <option value="hibrido"
                        <?php
                            if(isset($ratualiza)){
                                if($ratualiza[0]['modalidade']=="semi-presencial"){
                                    print "selected";
                                }
                            }
                        ?>
                    >
                    Híbrido
                </option>
            </select>
            <br>
            <button>
                <?php
                    if(isset($ratualiza)){
                        print "Atualizar";
                    }
                    else{
                        print "Cadastrar";
                    }
                ?>
            </button>
        </form> 
    </div>
    <div style="width: 30vw;">
        <h4 style="text-align:center;">
            Listagem de Categorias
        </h4>        
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Modalidade</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
                <?php                    
                    $sqlselect = $conexao->PREPARE("SELECT * FROM categoria");
                    $sqlselect->execute();
                    $categorias = $sqlselect->fetchAll(PDO::FETCH_ASSOC);
                    foreach($categorias as $categoria){
                        print "
                            <tr>
                                <td>".$categoria['id']."</td>
                                <td>".$categoria['nome']."</td>
                                <td>".$categoria['modalidade']."</td>
                                <td> <a href='?pagina=cadastro&cad=categoria&editar=".$categoria['id']."'> <i style='color:orange;'class='fa-solid fa-pencil'> </a> | <a href='?pagina=cadastro&cad=categoria&excluir=".$categoria['id']."'><i style='color:red;' class='fa-solid fa-trash'></a></td>
                            </tr>
                        ";
                    }
                ?>              
            </tbody>
        </table>
    </div>
</div>

<?php
  //  print isset($_GET['excluir'])?$_GET['excluir']:"sem info";
?>
    

