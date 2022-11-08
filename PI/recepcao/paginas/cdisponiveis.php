<div class="row">
    <div class="col-12">
        <p class="h2 text-primary text-center mt-3">
            Cursos Disponíveis
        </p>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <ul class="nav nav-tabs">
            <?php
                if(isset($_GET['catcurso'])){
            ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="?pagina=cadastro&cad=curso">Todos</a>
                </li>            
            <?php
                }
                else{
            ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?pagina=cadastro&cad=curso">Todos</a>
                </li>
            <?php
                }
            ?>
            <?php
                $sqlselect = $conexao->PREPARE("SELECT nome AS 'categoria' ,count(*) AS 'qtd' FROM categoria GROUP BY nome");
                $sqlselect->execute();
                $categorias = $sqlselect->fetchAll(PDO::FETCH_ASSOC);
                $categoria=isset($_GET['catcurso'])?$_GET['catcurso']:"0";
                foreach($categorias as $cat){
                    $catn = $cat["categoria"];
                    if($catn==$categoria){
                        print "
                            <li class='nav-item'>
                                <a class='nav-link active' href='?pagina=cadastro&cad=curso&catcurso=$catn'>".$cat["categoria"]."</a>
                            </li>
                        ";
                    }
                    else{
                        print "
                            <li class='nav-item'>
                                <a class='nav-link' href='?pagina=cadastro&cad=curso&catcurso=$catn'>".$cat["categoria"]."</a>
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
                $selectCursos = $conexao->PREPARE("select cursos.id, cursos.nome, categoria.nome as 'categoria', categoria.modalidade FROM cursos join categoria ON cursos.categoria_id = categoria.id WHERE categoria.nome ='".$categoria."' order by categoria.nome LIMIT ".limitCursos ." OFFSET ".$paginacao);
            }
            else{
                $selectCursos = $conexao->PREPARE("select cursos.id, cursos.nome, categoria.nome as 'categoria', categoria.modalidade FROM cursos join categoria ON cursos.categoria_id = categoria.id order by categoria.nome LIMIT ".limitCursos ." OFFSET ".$paginacao);
            }
            $selectCursos->execute();
            $cursos = $selectCursos->fetchAll(PDO::FETCH_ASSOC);
            if(isset($_GET['catcurso'])){
                $selectQtdCursos = $conexao->PREPARE("select count(*) AS 'qtd' from cursos join categoria on cursos.categoria_id = categoria.id WHERE categoria.nome ='".$categoria."'");
                $selectQtdCursos->execute();
                $qtdCursos =  $selectQtdCursos->fetchAll(PDO::FETCH_ASSOC);
                $qCursos = $qtdCursos[0]["qtd"];
            }
            if(($qCursos%limitCursos)==0){
                $paginas = intval($qCursos/limitCursos);    
            }
            else{
                $paginas = intval($qCursos/limitCursos)+1;
            }
            if ($qCursos!=0){        
        $item = 1;
        print "<div class='row p-5'>";
        foreach ($cursos as $curso) {
            print "
            <div class='col-4'>
                <div class='card m-1' style='width: 18rem;'>
                <img src='data:image/jpeg;base64,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' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>".$curso['nome']."</h5>
                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href='#' class='btn btn-primary'>Tenho Interesse</a>
                </div>
                </div>
            </div>
            ";
            }
        ?>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center align-items-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $lim = $paginacao-limitCursos;
                if(isset($_GET['catcurso'])){
                    if($paginacao==0){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cadastro&cad=curso&catcurso=$categoria&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cadastro&cad=curso&catcurso=$categoria&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                }
                else{
                    if($paginacao==0){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cadastro&cad=curso&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cadastro&cad=curso&paginacao=$lim'>Anterior</a></li>
                        ";
                    }
                }
                ?>
                <?php
                    for($i = 0; $i<$paginas ;$i++){
                        $p = limitCursos * $i;
                        if(isset($_GET['catcurso'])){    
                            if($p==$paginacao){
                                print
                                "<li class='page-item active'>
                                    <a class='page-link' href='?pagina=cadastro&cad=curso&catcurso=$categoria&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                            else{
                                print 
                                "<li class='page-item'>
                                    <a class='page-link' href='?pagina=cadastro&cad=curso&catcurso=$categoria&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                        }
                        else{
                            if($p==$paginacao){
                                print
                                "<li class='page-item active'>
                                    <a class='page-link' href='?pagina=cadastro&cad=curso&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                            else{
                                print 
                                "<li class='page-item'>
                                    <a class='page-link' href='?pagina=cadastro&cad=curso&paginacao=$p'>"
                                        .($i+1)."
                                    </a>
                                </li>";
                            }
                        }
                    
                    }
                ?>                
                <?php
                $lim = $paginacao+limitCursos;
                $posicao = (intval($qCursos/limitCursos))*limitCursos;
                if(isset($_GET['catcurso'])){
                    if($paginacao==$posicao){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cadastro&cad=curso&catcurso=$categoria&paginacao=$lim'>Proximo</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cadastro&cad=curso&catcurso=$categoria&paginacao=$lim'>Proximo</a></li>
                        ";
                    }
                }
                else{
                    if($paginacao==$posicao){
                        print"
                        <li class='page-item disabled'><a class='page-link' href='?pagina=cadastro&cad=curso&paginacao=$lim'>Proximo</a></li>
                        ";
                    }
                    else{
                        print"
                        <li class='page-item'><a class='page-link' href='?pagina=cadastro&cad=curso&paginacao=$lim'>Proximo</a></li>
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
</div>