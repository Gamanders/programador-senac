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
        <div class="d-flex justify-content-around">
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
        </div>        
        <?php
            $mod = array(); 
            for($j=0;$j<=$i;$j++){
            print "
                <div class='modal fade' id='categoriaModal".$j."' tabindex='-1' aria-labelledby='categoriaModal".$j." aria-hidden='true'>
            ";            
            $selectModalidades = $conexao->PREPARE("SELECT id, modalidade from categoria where nome = :NOME");            
            $selectModalidades->bindParam(":NOME",$cat[$j]);
            $selectModalidades->execute();
            $modalidades=$selectModalidades->fetchAll(PDO::FETCH_ASSOC);            
            foreach ($modalidades as $modal){
                array("categoria"=>$cat[$j],"id"=>$modal['id'],"modalidade"=>$modal['modalidade']);
                array_push($mod,array("categoria"=>$cat[$j],"id"=>$modal['id'],"modalidade"=>$modal['modalidade']));
            }
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
                    <div class="modal-body text-center">
                        <p class="h6 text-center">
                            Modalidades
                        </p>
                        <?php
                            foreach($mod as $m){
                        ?>                     
                            <?php
                                if ($cat[$j] == $m["categoria"]){
                                    print "<hr>";
                                    print "<span class='btn btn-light'>";
                                    print $m["modalidade"];                                                                                          
                                    print"
                                        </span>
                                        <sup>                                        
                                            <a href='?cad=categoria&alterar=".$m["id"]."'><button type='button' class='btn btn-sm btn-warning'><i class='fa-solid fa-pencil'></i></button> </a>
                                            <a href='?cad=categoria&excluir=".$m["id"]."'><button type='button' class='btn btn-sm btn-danger'><i class='fa-solid fa-trash'></i></button> </a>
                                        </sup>";
                                } 
                            ?> 
                        <?php
                            }
                        ?>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
        <?php
            print "</div>";
        }
         ?>       
    </div>
</div>
<a href='?cat=categoria&excluir='.$m["id"]></a>