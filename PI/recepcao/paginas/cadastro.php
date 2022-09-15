<div class="items">
    <ul>
        <li>
            <a href="?pagina=cadastro&cad=categoria">
                Categoria
            </a>
        </li>
        <li>
            <a href="?pagina=cadastro&cad=curso">
                Curso
            </a>
        </li>
        <li>
            <a href="?pagina=cadastro&cad=interessados">
                Interessados
            </a>
        </li>
        <li>
            <a href="?pagina=cadastro&cad=interesses">
                Interesses
            </a>
        </li>        
    </ul>
</div>
<div class="conteudo">
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
            }
        }
    ?>
</div>