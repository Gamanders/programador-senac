<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <ul class="nav nav-tabs">
            <?php
                if(isset($_GET['catcurso'])){
            ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="?pagina=cdisponiveis">Todos</a>
                </li>            
            <?php
                }
                else{
            ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?pagina=cdisponiveis">Todos</a>
                </li>
            <?php
                }
            ?>
            <?php
                $sqlselect = $conexao->PREPARE("SELECT categoria.nome AS 'categoria' ,count(*) AS 'qtd' FROM categoria join cursos on cursos.categoria_id = categoria.id GROUP BY categoria.nome");
                $sqlselect->execute();
                $categorias = $sqlselect->fetchAll(PDO::FETCH_ASSOC);
                $categoria=isset($_GET['catcurso'])?$_GET['catcurso']:"0";
                foreach($categorias as $cat){
                    $catn = $cat["categoria"];
                    if($catn==$categoria){
                        print "
                            <li class='nav-item'>
                                <a class='nav-link active' href='?pagina=cdisponiveis&catcurso=$catn'>".$cat["categoria"]."</a>
                            </li>
                        ";
                    }
                    else{
                        print "
                            <li class='nav-item'>
                                <a class='nav-link' href='?pagina=cdisponiveis&catcurso=$catn'>".$cat["categoria"]."</a>
                            </li>
                        ";
                    }
                }
            ?>   
        </ul>
    </div>
    <div class="col-12">
        <?php
            $selectQtdCursos = $conexao->PREPARE("select count(*) AS 'qtd' from cursos");
            $selectQtdCursos->execute();
            $qtdCursos =  $selectQtdCursos->fetchAll(PDO::FETCH_ASSOC);
            $qCursos = $qtdCursos[0]["qtd"];
            $paginacao = "0";
            $paginacao=isset($_GET["paginacao"])?$_GET["paginacao"]:"0";
            if(isset($_GET['catcurso'])){
                $selectCursos = $conexao->PREPARE("select cursos.id, cursos.descricao, cursos.imagem, cursos.nome, categoria.nome as 'categoria', categoria.modalidade FROM cursos join categoria ON cursos.categoria_id = categoria.id WHERE categoria.nome ='".$categoria."' order by categoria.nome LIMIT ".limitDisponiveis ." OFFSET ".$paginacao);
            }
            else{
                $selectCursos = $conexao->PREPARE("select cursos.*, categoria.nome as 'categoria', categoria.modalidade FROM cursos join categoria ON cursos.categoria_id = categoria.id order by categoria.nome LIMIT ".limitDisponiveis ." OFFSET ".$paginacao);
            }
            $selectCursos->execute();
            $cursos = $selectCursos->fetchAll(PDO::FETCH_ASSOC);            
            if(isset($_GET['catcurso'])){
                $selectQtdCursos = $conexao->PREPARE("select count(*) AS 'qtd' from cursos join categoria on cursos.categoria_id = categoria.id WHERE categoria.nome ='".$categoria."'");
                $selectQtdCursos->execute();
                $qtdCursos =  $selectQtdCursos->fetchAll(PDO::FETCH_ASSOC);
                $qCursos = $qtdCursos[0]["qtd"];
            }
            if(($qCursos%limitDisponiveis)==0){
                $paginas = intval($qCursos/limitDisponiveis);    
            }
            else{
                $paginas = intval($qCursos/limitDisponiveis)+1;
            }
            if ($qCursos!=0){        
        $item = 1;
        print "<div class='row p-5'>";
        foreach ($cursos as $curso) {
            if ($curso['imagem']==null){  
                print "
                <div class='col-4 col-md-3 col-lg-2'>
                    <div class='card m-1' style='width: 12em;'>
                        <img class='img-fluid mx-auto pt-2' src='img/Curso-online.jpg' style='width:10em; height:10em;'>               
                        <div class='card-body'>
                            <div class='cx-curso'>
                                <p class='h6 card-title'>".$curso['nome']."</p>
                            </div>
                            <div class='cx-descricao'>
                                <p class='card-text'>".$curso['descricao']."</p>
                            </div>
                            <div class='d-flex justify-content-around align-items-center'>
                                <a href='?pagina=teminteresse&curso=".$curso['nome']."&id=".$curso['id']."' class='btn btn-sm btn-primary'>Interesse | <i class='fa-sharp fa-solid fa-heart'></i></a>                                
                                <a class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop". $curso['id']."'><i style='color:white;'class='fa-solid fa-eye'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            else {
                print "
                <div class='col-4 col-md-3 col-lg-2'    >
                    <div class='card m-1' style='width: 12em;'>
                        <img class='img-fluid mx-auto pt-2' src='img/".$curso['imagem']."' style='width:10em; height:10em;'>               
                        <div class='card-body'>
                            <div class='cx-curso'>
                                <p class='h6 card-title'>".$curso['nome']."</p>
                            </div>
                            <div class='cx-descricao'>
                                <p class='card-text'>".$curso['descricao']."</p>
                            </div>
                            <div class='d-flex justify-content-around align-items-center'>
                                <a href='?pagina=teminteresse&curso=".$curso['nome']."&id=".$curso['id']."' class='btn btn-sm btn-primary'>Interesse | <i class='fa-sharp fa-solid fa-heart'></i></a>
                                ".
                                "
                                <a class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop". $curso['id']."'><i style='color:white;'class='fa-solid fa-eye'></i></a>
                                ".
                                "
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
        ?>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center align-items-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $lim = $paginacao-limitDisponiveis;
                if(isset($_GET['catcurso'])){
                    if($paginacao==0){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cdisponiveis&catcurso=$categoria&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cdisponiveis&catcurso=$categoria&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                }
                else{
                    if($paginacao==0){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cdisponiveis&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cdisponiveis&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                }
                ?>
                <?php
                    for($i = 0; $i<$paginas ;$i++){
                        $p = limitDisponiveis * $i;
                        if(isset($_GET['catcurso'])){    
                            if($p==$paginacao){
                                print
                                "<li class='page-item active'>
                                    <a class='page-link' href='?pagina=cdisponiveis&catcurso=$categoria&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                            else{
                                print 
                                "<li class='page-item'>
                                    <a class='page-link' href='?pagina=cdisponiveis&catcurso=$categoria&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                        }
                        else{
                            if($p==$paginacao){
                                print
                                "<li class='page-item active'>
                                    <a class='page-link' href='?pagina=cdisponiveis&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                            else{
                                print 
                                "<li class='page-item'>
                                    <a class='page-link' href='?pagina=cdisponiveis&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                        }
                    
                    }
                ?>                
                <?php
                $lim = $paginacao+limitDisponiveis;
                $posicao = (intval($qCursos/limitDisponiveis))*limitDisponiveis;
                if(isset($_GET['catcurso'])){
                    if($paginacao==$posicao){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cdisponiveis&catcurso=$categoria&paginacao=$lim'>Proximo</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cdisponiveis&catcurso=$categoria&paginacao=$lim'>Proximo</a></li>
                        ";
                    }
                }
                else{
                    if($paginacao==$posicao){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cdisponiveis&paginacao=$lim'>Proximo</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cdisponiveis&paginacao=$lim'>Proximo</a></li>
                        ";
                    }
                }
                ?>
            </ul>
            <?php
            }
            else{
                print "<p class='h4 text-center text-danger mt-4'>Não há cursos para essa categoria</p>";
            }
            ?>
        </nav>        
    </div>
    <?php
        foreach($cursos as $curso){
            // Modal 
            print "
            <div class='modal fade' id='staticBackdrop". $curso['id']."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <p class='h4 modal-title fs-6' id='staticBackdropLabel'>Detalhes de ".$curso['nome']."</p>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-5 d-flex justify-content-center align-items-center'>
                                    <img class='img-fluid' src='img/".$curso['imagem']."'' alt='não encontrado'>
                                </div>
                                <div class='col-7'>
                                    <p> <span class='text-capitalize fw-bold fst-italic'>categoria: </span> " . $curso['categoria'] . "</p>
                                    <p> <span class='text-capitalize fw-bold fst-italic'>modalidade: </span> " . $curso['modalidade'] . "</p>
                                    <p> <span class='text-capitalize fw-bold fst-italic'>data de inicio: </span> " . $curso['dtIni'] . "</p>
                                    <p> <span class='text-capitalize fw-bold fst-italic'>data de fim: </span> " . $curso['dtFim'] . "</p>
                                    <p> <span class='text-capitalize fw-bold fst-italic'>carga horaria: </span> " . $curso['cargaHoraria'] . "</p>
                                    <p> <span class='text-capitalize fw-bold fst-italic'>capacidade: </span> " . $curso['capacidade'] . "</p>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>                        
                        </div>
                    </div>
                </div>
            </div>";
        }
    ?>
</div>