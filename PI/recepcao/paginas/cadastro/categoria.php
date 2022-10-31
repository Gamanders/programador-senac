<?php    
    if(isset($_GET['editar'])){
        $edicao = $_GET['editar'];
        $atualiza = $conexao->PREPARE("SELECT * FROM categoria WHERE id = :ID;");
        $atualiza->bindParam(":ID",$edicao);
        $atualiza->execute();
        $ratualiza = $atualiza->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<div class="row">
    <div class="col-12">
        <p class="h2 text-center">
            Categoria
        </p>
        <hr>
    </div>
    <div class="col-4">
        <p class="h4 text-center">
            Cadastro
        </p>    
        <form method="POST">
            <input type="hidden" name="pagina" value="cadastro">
            <input type="hidden" name="cad" value="categoria">
            <?php
                if(isset($ratualiza)){
                    print "<input type='hidden' name='atualizar' value='".$edicao."'>";                    
                }
            ?>
            <label class="control-label">
                Nome
            </label>
            <input class="form-control" type="text" name="nomeCategoria"
                <?php                    
                        if(isset($ratualiza)){
                            print "value='".$ratualiza[0]['nome']."'";
                        }
                ?>
            >
            <label class="control-label">
                Modalidade
            </label>
            <select class="form-control" name="modalidade">
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
            <button class="btn btn-primary">
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
    <div class="col-8">
        <p class="h4 text-center">
            Listagem
        </p>        
            <?php                    
                $sqlselect = $conexao->PREPARE("SELECT nome AS 'categoria' ,count(*) AS 'qtd' FROM categoria GROUP BY nome");
                $sqlselect->execute();
                $categorias = $sqlselect->fetchAll(PDO::FETCH_ASSOC);
                $cat = array();
                $i = 0;
                foreach($categorias as $categoria){                 
                    print "<button type='button' class='btn btn-outline-primary m-2' data-bs-toggle='modal' data-bs-target='#categoriaModal".$i."'>";
                            ++$i;      
                            array_push($cat,$categoria['categoria']);
                            print $categoria['categoria'];            
                    print "</button>";            
                }
            ?>
        <?php
            for($j=0;$j<=$i;$j++){
            print "
                <div class='modal fade' id='categoriaModal".$j."' tabindex='-1' aria-labelledby='categoriaModal".$j." aria-hidden='true'>
            ";
            print "<h1>".$j."</h1>";    
        ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <?php
                                print $cat[$j];
                            ?>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="h5 text-center">
                            Modalidades
                        </p>
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning">Alterar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
        <?php
            print "</div>";
        }
         ?>       
    </div>
</div>