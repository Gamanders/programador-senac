<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">    
    <title>SENAC - Procura Cursos</title>
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
    header a{        
        padding: 10px;
        margin: 10px;
        border-radius:20px;
        border: 2px solid gray;
        font-style:italic;
        text-decoration:none;
    }
    li a{       
        font-style:italic;
        text-decoration:none;
    }
    header a:hover{  
        background-color:gray;
        color:white;
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
<body>
    <header>
        <a href="?pagina=home">Home</a>
        <a href="?pagina=cadastro">Cadastro</a>
        <a href="?pagina=interessados">Interessados</a>
        <a href="?pagina=sobre">Sobre</a>
    </header>
    <main>
        <?php
            if(isset($_GET['pagina'])){
                $pagina =  $_GET['pagina'];
                switch ($pagina){
                    case "home":
                        include_once('paginas/home.php');
                        break;
                    case "cadastro":
                        include_once('paginas/cadastro.php');
                        break;
                    case "interessados":
                        include_once('paginas/interessados.php');
                        break;
                    case "sobre":
                        include_once('paginas/sobre.php');
                        break;
                    default:
                        include_once('paginas/home.php');
                        break;
                }
            }
            else{
                include_once('paginas/home.php');
            }
        ?>
    </main>
    <footer>
        <p>
            Desenvolvido em sala - SENAC Garanhuns
        </p>
    </footer>
</body>
</html>

<?php
$conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
$sqlinsert = $conexao->PREPARE(
    "INSERT INTO categoria (nome,modalidade) 
    VALUES ('teste','ead')");
$sqlinsert->execute();
?>
