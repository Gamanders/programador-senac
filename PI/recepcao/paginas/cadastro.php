<?php
    if(isset($_SESSION['usuario'])){
        $tipo = $_SESSION['usuario'];
        if($tipo){
?>
<style>
    aside{
        height: 500px;
    }
</style>
<div class="container">
    <div class="row">
        <aside class="col-3 p-5">
            
            <a class="col-12 mt-5 btn btn-outline-dark" href="?pagina=cadastro&cad=categoria">
                Categoria
            </a>            
            <a class="col-12 mt-5 btn btn-outline-dark" href="?pagina=cadastro&cad=curso">
                Curso
            </a>                
            <a class="col-12 mt-5 btn btn-outline-dark" href="?pagina=cadastro&cad=interessados">
                Interessados
            </a>
            <a class="col-12 mt-5 btn btn-outline-dark" href="?pagina=cadastro&cad=interesses">
                Interesses
            </a>
        </aside>
        <section class="col-9">
        <?php
            if(isset($_GET['cad'])){
                $cadastro = $_GET['cad'];
                switch($cadastro){
                    case "categoria":
                        include_once('paginas/cadastro/categoria.php');
                        break;
                    case "curso":
                        include_once('paginas/cadastro/cursos.php');
                        break;
                    case "interessados":
                        include_once('paginas/cadastro/interessados.php');
                        break;
                    case "interesses":
                        include_once('paginas/cadastro/interesses.php');
                        break; 
                    default:
                        include_once('paginas/cadastro/default.php');
                        break;
                }
            }
            else{
                include_once('paginas/cadastro/default.php');
            }
        ?>
        </section>
    </div>
</div>    
<?php      
        }
    }
    else{
        print"
            <h1 style='color:red'>
                Necessário estar logado como usuário Administrador
                <br>
                Seja empresário primeiro!
            </h1>
        ";
    }
?>