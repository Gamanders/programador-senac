
<?php 
    include_once("config.php");
    include_once("codes/include.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <title>
        SENAC - Procura Cursos
    </title>
</head>
<style>
    body{
        margin:none;
    }
    header{        
        height:15vh;
        border-bottom: 5px solid darkgray;
        display:flex;
        justify-content:center;
        align-items:center;
    }    
    li a{       
        font-style:italic;
        text-decoration:none;
    }header a{        
        padding: 10px;
        margin: 10px;
        border-radius:5px;
        border: 2px solid lightgray;
        font-style:italic;
        text-decoration:none;
    }
    main{
        min-height:70vh;        
        display:flex;
        justify-content:center;
        align-items:center;
    }
    footer{
        background-color:darkgray;
        color:white;
        text-align:center;
        height:15vh;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    #protecaoTela{
        position: absolute;
        width:100vw;
        height:100vh;
        z-index: 1000;
        background:red;
        visibility: hidden;
    }   
    #protecaoTela>#topo{
        background:white;
        height:20vh;
        border-bottom: 10px solid #005594;
    }
    #protecaoTela>#meio{
        height:65vh;
    }
    #protecaoTela>#base{
        background:white;
        height:15vh;
        border-top:5px solid #F78B1F;        
    }
    .cx-curso{
        height: 2.5em;
        text-align:center;
        line-height: 50%;
    }
    .cx-descricao{
        height: 5em;
        text-align:center;
        line-height: 50%;
    }
</style>
<!--
Logon
-->
<?php
    if(isset($_POST["action"])){
        $action = $_POST["action"];
        if($action == "logar"){
            $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
            $selectUser = $conexao->PREPARE("SELECT * FROM usuarios WHERE username = :USUARIO;");
            $usuario = $_POST["usuario"];
            $selectUser->bindParam(":USUARIO",$usuario);        
            $selectUser->execute();
            $resultUser = $selectUser->fetchAll(PDO::FETCH_ASSOC);        
            $senha = $_POST["senha"];            
            if(isset($resultUser[0]["senha"])){            
                if($senha == $resultUser[0]["senha"]){                                      
                    $_SESSION["usuario_id"]=$resultUser[0]["id"];
                    $_SESSION["usuario"]=$resultUser[0]["username"];
                    $_SESSION["nome"]=$resultUser[0]["nome"];
                    $_SESSION["tipo"]=$resultUser[0]["tipo"];                        
                    $tipo = $_SESSION['tipo'];
                    $selectInteresses = $conexao->PREPARE(
                        "select * from cursosinteressados
                        join cursos on cursos.id = cursosinteressados.cursos_id
                        join interessados on interessados.id = cursosinteressados.interessados_id
                        where
                        interessados.email = :INTERESSADO                
                        ");                
                    $selectInteresses->bindParam(":INTERESSADO",$_SESSION['usuario']);
                    $selectInteresses->execute();
                    $interesses = $selectInteresses->fetchAll(PDO::FETCH_ASSOC);
                    var_dump($interesses);
                    if($tipo =="admin"){
                        header("Location:?pagina=cadastro");
                        //ob_clean();
                    }   
                    else{
                        header("Location:?pagina=cdisponiveis");
                        //ob_clean(); 
                    }
                }
                else{
                    print "
                            <script>
                                alert('Usuário ou Senha Incorreta');
                            </script>
                        ";
                }
            }
            else{
                print "
                            <script>
                                alert('Usuário ou Senha Incorreta');
                            </script>
                        ";
            }
        }
    }    
?>
<!--
Logout
-->
<?php
    if(isset($_GET["action"])){
        $action = $_GET["action"];
        if($action == "logout"){       
            unset($_SESSION["usuario"]); 
            unset($_SESSION["nome"]);
            //$bifee = ob_get_contents();
            //var_dump($bifee);
            //header("Location:?pagina=cdisponiveis");
            //ob_clean();
        }
    }
?>
<body>
    <div id="protecaoTela">
        <div id="topo" class="d-flex flex-column justify-content-center align-items-center">
            <p class="h2 text-center">
                <strong style="font-family: Xilosa;">
                    Gestão Cursos
                </strong>
            </p>
            <p class="h5 text-center">
                Sistemas para reservas e registro de interesses
            </p>
        </div>
        <div id="meio" class="bg-light d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-5 d-flex flex-column justify-content-center align-items-center">
                    <img class=" img-thumbnail mx-auto rounded d-block" src="img\tela\programadores.jpeg" style="height:60vh;">
                </div>
                <div class="col-7 d-flex flex-column justify-content-center align-items-center fs-6">
                    <dl>
                        <dt class="fw-light">
                            E é o instrutor  é ...
                        </dt>
                        <dd>
                            <strong>Jean</strong> Elder Santana Araújo
                        </dd>
                    </dl>                    
                    <div class="row">
                        <div class="col">
                            <small>
                                <blockquote>
                                    <dl>                        
                                        <dt class="fw-light">
                                            E é o Comandante é  ...
                                        </dt>
                                        <dd>
                                            <strong>Amilton</strong> da Silva Borburema Júnior
                                        </dd>
                                        <dt class="fw-light">
                                            E é o Red Pill  é ...
                                        </dt>
                                        <dd>
                                            <strong>Anderson</strong> Clayton da Silva Gama
                                        </dd>                       
                                        <dt class="fw-light">
                                            E é o Empresário  é ...
                                        </dt>
                                        <dd>                            
                                            <strong>Gabriel</strong> Silva Gomes
                                        </dd>                                    
                                        <dt class="fw-light">
                                            E é o Corazon  é ...
                                        </dt>
                                        <dd>                            
                                            <strong>Humberto</strong> Bezerra Siqueira 
                                        </dd>
                                        <dt class="fw-light">
                                            E é o Back Man  é ...
                                        </dt>
                                        <dd>                            
                                            <strong>Jairo </strong>da Silva Soares
                                        </dd>
                                        
                                    </dl>
                                </blockquote>
                            </small>
                            
                        </div>
                        <div class="col">
                            <small>
                                <blockquote>
                                    <dl>
                                        <dt class="fw-light">
                                            E é o Perigoso  é ...
                                        </dt>
                                        <dd>
                                            Janailson da Silva <strong>Sobral</strong>
                                        </dd>
                                        <dt class="fw-light">
                                            E é o Hacker Man  é ...
                                        </dt>
                                        <dd>
                                            João <strong>Emanuel</strong> Ribeiro Marinho 
                                        </dd>
                                        <dt class="fw-light">
                                            E é a Robot  é ...
                                        </dt>
                                        <dd>
                                            <strong>Laura</strong> Maria Farias Silva                                            
                                        </dd>                                    
                                        <dt class="fw-light">
                                            E é o Habilitado  é ... 
                                        </dt>
                                        <dd>
                                            José <strong>Walter</strong> de Melo Sobral Filho
                                        </dd>                                    
                                        <dt class="fw-light">
                                            E é o modelo  é ...
                                        </dt>
                                        <dd>
                                        <strong>Ryan </strong>Víctor Ferreira Constantino da Silva 
                                        </dd>
                                    </dl>
                                </blockquote>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="base">
            <div class="row">
                <div class="col-5 d-flex flex-column justify-content-center align-items-center">
                    <p class="h6">
                        SENAC <small>Serviço Nacional de Aprendizagem do Comercio</small>
                    </p>
                    <p class="text-center fst-italic fs-6">
                        Travessa Maria Ramos, 22, 
                        <strong>
                            Garanhuns/PE
                        </strong>
                    </p>
                </div>
                <div class="col d-flex flex-column justify-content-between align-items-center">
                    <p>
                        <strong class="pt-5">E é a turma  é ...</strong>                       
                    </p>
                    <p>
                        <small>
                            Programador de Sistemas<sup>2022.3.115</sup>
                        </small>
                    </p>
                </div>
                <div class="col-4 d-flex justify-content-around align-items-center">
                    <img class="img-fluid" src="img\tela\senac-logo-sem-fundo.webp" style="height:2.5em; width:auto;">
                    <img class="img-fluid" src="img\tela\PortoDigital_2019.png" style="height:2.5em; width:auto;">
                </div>
            </div>                        
        </div>
    </div>
    <?php                          
        if(isset($_SESSION["usuario"])){
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container-fluid">                
                <a href="?pagina=cdisponiveis"><img src="img/senac_logo.png" style="height:2em; width:auto;"></a>
                <!--
                    class="navbar-brand"
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                collapse navbar-collapse
                -->
                <div class="d-flex justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                            if(isset($_SESSION["usuario"])){  
                                $tipo = $_SESSION["tipo"];                                
                                    if($tipo == "admin"){
                        ?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pagina=cadastro">Administração</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pagina=interessados">Interessados</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?pagina=cdisponiveis">Cursos Disponíveis                 
                            </a>
                        </li>
                        <?php
                                    }
                            }
                        ?>                       
                        <?php                          
                            if(isset($_SESSION["usuario"])){
                        ?> 
                            <li class="nav-item dropdown">                       
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                        print $_SESSION["usuario"];
                                    ?>                                  
                                </a>
                                <ul class="dropdown-menu w-25">
                                    <li><a class="dropdown-item w-25" data-bs-toggle="modal" data-bs-target="#alterarSenhaModal">Alterar Senha</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item w-25" href="?pagina=home&visualizar=interesses" data-bs-toggle="modal" data-bs-target="#meusInteressesModal">Meus Interesses</a></li>                                                                        
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item w-25" href="?pagina=home&action=logout">Sair</a></li>
                                </ul>
                            </li>
                        <?php                                
                            }
                        ?>
                    </ul>                   
                    <?php                          
                        if(!isset($_SESSION["usuario"])){
                    ?>
                        <a href="?pagina=login">
                            <i class="fa-solid fa-lock text-dark"></i>
                        </a>
                    <?php                                
                        }
                    ?>
                </div>
            </div>
            </nav>
    </header>
    <?php                                
        }
        else{
            if(isset($_GET["pagina"])){
                $pagina = $_GET["pagina"];

            }
        if(!isset($pagina) || $pagina != "login"){
    ?>
        <div class="row">
            <div class="offset-1 col-10">
                <p class="h2 text-primary text-center mt-3">
                    <?php
                    if(isset($_GET['pagina'])){
                        $pagina = $_GET['pagina'];
                        if($pagina == "cadinteressado"){
                            print "Cadastro de Interessado";
                        }
                    }
                    else{
                        print "Cursos Disponíveis";
                    }
                    
                    ?>
                </p>        
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center">
                <?php                          
                    if(!isset($_SESSION["usuario"])){
                ?>
                    <a href="?pagina=login">
                        <i class="fa-solid fa-lock text-primary"></i>
                    </a>
                <?php                                
                    }
                ?>
            </div>
            <hr>
        </div>
        <?php 
            }                               
        }
        ?>
    <main>
        <?php
            if(isset($_GET["pagina"])){
                $pagina =  $_GET["pagina"];
                switch ($pagina){
                    case "home":
                        include_once("paginas/home.php");
                        break;
                    case "cadastro":
                        include_once("paginas/cadastro.php");
                        break;
                    case "interessados":
                        include_once("paginas/interessados.php");
                        break;
                    case "sobre":
                        include_once("paginas/sobre.php");
                        break;
                    case "cadinteressado":
                            include_once("paginas/cadastroInteressado.php");
                            break;
                    case "login":
                        include_once("paginas/login.php");
                        break;
                    case "teminteresse":
                            include_once("paginas/teminteresse.php");
                            break;
                    case "cdisponiveis":
                        include_once("paginas/cdisponiveis.php");
                        break;
                        case "admin":
                            include_once("paginas/admin.php");
                            break;
                    default:    
                        include_once("paginas/cdisponiveis.php");
                        break;
                }
            }
            else{
                include_once("paginas/cdisponiveis.php");
            }
        ?>
    </main>
    <?php
            if(isset($_GET["pagina"])){
                $pagina = $_GET["pagina"];
                if($pagina="login"){
                    print"
                        <div style='height: 15vh;'>
                           
                        </div>
                    ";
                }
            }
        ?>
    <footer>        
        <p>
            Desenvolvido em sala - SENAC Garanhuns
        </p>
        <?php
            function test() {
                    try {
                        throw new Exception('foo');
                    } catch (Exception $e) {
                        return 'catch';
                    } finally {
                        return 'finally';
                    }
                }
                test();
            ?>
    </footer>    
</body> 

<!-- Modal Alteração de Senha -->
<div class="modal fade" id="alterarSenhaModal" tabindex="-1" aria-labelledby="alterarSenhaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="alterarSenhaModalLabel">Alteração de Senha</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>        
      </div>
    </div>
  </div>
</div>

<!-- Modal Meus Interesses -->
<div class="modal fade" id="meusInteressesModal" tabindex="-1" aria-labelledby="meusInteressesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="meusInteressesModalLabel">Meus Interesses</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>        
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>

</html>
