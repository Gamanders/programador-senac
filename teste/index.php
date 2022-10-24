<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    <?php
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            if($action == "logar"){
                $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");        
                $selectUser = $conexao->PREPARE("SELECT * FROM usuarios WHERE username = :USUARIO;");
                $usuario = $_POST['usuario'];
                $selectUser->bindParam(":USUARIO",$usuario);        
                $selectUser->execute();
                $resultUser = $selectUser->fetchAll(PDO::FETCH_ASSOC);
                $senha = $_POST['senha'];
                if(isset($resultUser[0]["senha"])){            
                    if($senha == $resultUser[0]["senha"]){                
                        if(session_status()==PHP_SESSION_NONE){                    
                            session_start();                            
                            $_SESSION["usuario"]=$resultUser[0]["username"];
                            $_SESSION["nome"]=$resultUser[0]["nome"];                            
                        }
                    }
                    else{
                        print "Senha Incorreta";
                    }
                }
                else{
                    print "usuario inexistente";
                }
            }
        }
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            if($action == "logout"){
                session_destroy();
                session_unset();
            }
        }
    ?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="?pagina=home">Recepção</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">                   
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?pagina=cadastro">Cadastro</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?pagina=interessados">Interessados</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?pagina=interessados">Interessados                            
                    </a>
                    </li> 
                    <?php                          
                        if(isset($_SESSION['usuario'])){                                
                            print "
                                <li class='nav-item dropdown'>                       
                                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    "
                                        .$_SESSION['usuario'].
                                    "
                                    </a>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' href='#'>Alterar Senha</a></li>                                
                                        <li><hr class='dropdown-divider'></li>
                                        <li><a class='dropdown-item' href='?pagina=home&action=logout'>Sair</a></li>
                                    </ul>
                                </li>
                            ";
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
<form method="POST">
    <input type="hidden" name="action" value="logar">
    <div class="row w-50 mx-auto">                
        <div class="col-12">
            <label class="label-form">Usuario</label>
        </div>
        <div class="col-12">
            <input type="text" class="form-control" name="usuario">
        </div>
        <div class="col-12">
            <label class="label-form">Senha</label>
        </div>
        <div class="col-12">
            <input type="password" class="form-control" name="senha">
        </div>
        <div class="offset-8 col-4">
            <button class="btn btn-dark mt-2">
                Acessar
            </button>
        </div>
    </div>        
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>