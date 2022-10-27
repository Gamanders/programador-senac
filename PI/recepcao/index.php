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
                    $_SESSION["usuario"]=$resultUser[0]["username"];
                    $_SESSION["nome"]=$resultUser[0]["nome"];
                    $_SESSION["tipo"]=$resultUser[0]["tipo"];                     
                }
                else{
                    print "Usuário ou Senha Incorreta";
                }
            }
            else{
                print "Usuário ou Senha Incorreta";
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
    }
}
?>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="?pagina=home">Recepção</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                            if(isset($_SESSION["usuario"])){  
                                $tipo = $_SESSION["tipo"];                                
                                    if($tipo == "admin"){
                        ?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pagina=cadastro">Cadastro</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pagina=interessados">Interessados</a>
                        </li>
                        <?php
                                    }
                            }
                        ?> 
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?pagina=cdisponiveis">Cursos Disponíveis                 
                            </a>
                        </li>                      
                        <?php                          
                            if(isset($_SESSION["usuario"])){
                        ?>
                                
                            <li class="nav-item dropdown">                       
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                        print $_SESSION["usuario"];
                                    ?>                                  
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Alterar Senha</a></li>                                
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="?pagina=home&action=logout">Sair</a></li>
                                </ul>
                            </li>
                        <?php                                
                            }
                        ?>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Previsão de cursos" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Buscar</button>
                    </form>
                    <a href="?pagina=login">
                        <i class="fa-solid fa-lock text-dark"></i>
                    </a>
                </div>
            </div>
            </nav>
    </header>
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
                    case "login":
                        include_once("paginas/login.php");
                        break;
                    case "cdisponiveis":
                        include_once("paginas/cdisponiveis.php");
                        break;
                    default:
                        include_once("paginas/home.php");
                        break;
                }
            }
            else{
                include_once("paginas/home.php");
            }
        ?>
    </main>
    <footer>
        <p>
            Desenvolvido em sala - SENAC Garanhuns
        </p>
    </footer>    
</body> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>