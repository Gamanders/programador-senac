<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilo.css">    
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
        <a href="?pagina=login">Login</a>
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
                    case "login":
                        include_once('paginas/login.php');
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
    <!--
    Cadastrar categoria
    -->
<?php    
    if(isset($_POST['nomeCategoria']) && isset($_POST['modalidade'])&&!isset($_GET['editar'])){
        print "<h1> Cadastro </h1>";
        $nome = $_POST['nomeCategoria'];
        $modalidade = $_POST['modalidade'];
        $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
        $sqlinsert = $conexao->PREPARE(
            "INSERT INTO categoria (nome,modalidade) 
            VALUES (:NOME,:MODALIDADE)");
        $sqlinsert->bindParam(":NOME",$nome);
        $sqlinsert->bindParam(":MODALIDADE",$modalidade);
        $sqlinsert->execute();             
    }
?>
    <!--
    Atualizar categoria
    --> 
<?php
    if(isset($_POST['nomeCategoria']) && isset($_POST['modalidade'])&&isset($_GET['editar'])){
        print "<h1> Atualizar </h1>";
        $nome = $_POST['nomeCategoria'];
        $modalidade = $_POST['modalidade'];
        $id = $_GET['editar'];
        $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
        $sqlupdate = $conexao->PREPARE(
            "UPDATE categoria SET nome = :NOME, modalidade = :MODALIDADE WHERE id = :ID");
        $sqlupdate->bindParam(":ID",$id);
        $sqlupdate->bindParam(":NOME",$nome);
        $sqlupdate->bindParam(":MODALIDADE",$modalidade);
        $sqlupdate->execute();             
    }
?>
    <!--
    Excluir categoria
    -->   
<?php
    if(isset($_GET['excluir'])&&($_GET['cad'])){
        $cad = $_GET['cad'];
        if($cad == "categoria"){
            $id = $_GET['excluir'];        
            $con = new PDO("mysql:dbname=recepcao;host=localhost","root","");
            $verifica = $con->PREPARE("SELECT count(*) AS 'qtd' FROM categoria JOIN cursos ON categoria.id = cursos.categoria_id WHERE categoria.id = :ID");
            $verifica->bindParam(":ID",$id);
            $verifica->execute();
            $result = $verifica->fetchAll(PDO::FETCH_ASSOC);
            print $result[0]['qtd'];
            $delete = $con->PREPARE("DELETE FROM categoria WHERE id = :ID");
            $delete->bindParam(":ID",$id);
            $delete->execute();
        }
    }               
?>
<!--
    Cadastro cursos
-->
<?php
if(isset($_POST['nomeCurso']) && isset($_POST['categoria'])){    
    $nomeCurso = $_POST['nomeCurso'];    
    $categoria_id = $_POST['categoria'];
    $dtIni = $_POST['dataInicio'];
    $dtFim = $_POST['dataFim'];
    $cargaHoraria = $_POST['cargahoraria'];
    $capacidade = $_POST['capacidade'];
    $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
    $sqlinsert = $conexao->PREPARE(
        "INSERT INTO cursos (nome, dtIni, dtFim, cargaHoraria, capacidade, categoria_id) 
        VALUES (:NOME,:DTINI, :DTFIM, :CARGAHORARIA, :CAPACIDADE, :CATEGORIA_ID)");
    $sqlinsert->bindParam(":NOME",$nomeCurso);
    $sqlinsert->bindParam(":DTINI",$dtIni);
    $sqlinsert->bindParam(":DTFIM",$dtFim);
    $sqlinsert->bindParam(":CARGAHORARIA",$cargaHoraria);
    $sqlinsert->bindParam(":CAPACIDADE",$capacidade);
    $sqlinsert->bindParam(":CATEGORIA_ID",$categoria_id);
    $sqlinsert->execute();    
}
?>
<!--
    Atualizar cursos
-->
<?php
    if(isset($_POST['nomeCurso']) && isset($_POST['categoria'])&&isset($_GET['editar'])){
        print "<h1> Atualizar </h1>";
        $nome = $_POST['nomeCurso'];        
        $categoria = $_POST['categoria'];
        $dtIni = $_POST['dtInicio'];
        $dtFim = $_POST['dtFim'];
        $cargaHoraria = $_POST['cargaHoraria'];
        $capacidade = $_POST['capacidade'];   
        $id = $_GET['editar'];
        $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
        // id nome dtIni dtFim cargaHoraria capacidade categoria_id
        $sqlupdate = $conexao->PREPARE(
            "UPDATE cursos SET nome = :NOME, categoria_id = :CATEGORIA, dtIni = :DTINI, dtFim = :DTFIM, cargaHoraria = :CARGAHORARIA, capacidade = :CAPACIDADE WHERE id = :ID");
        $sqlupdate->bindParam(":ID",$id);
        $sqlupdate->bindParam(":NOME",$nome);
        $sqlupdate->bindParam(":CATEGORIA",$categoria);
        $sqlupdate->bindParam(":DTINI",$dtIni);
        $sqlupdate->bindParam(":DTFIM",$dtFim);
        $sqlupdate->bindParam(":CARGAHORARIA",$cargaHoraria);
        $sqlupdate->bindParam(":CAPACIDADE",$capacidade);        
        print "<h1>Alterar</h1>".$cad." ".$id;            
        //$sqlupdate->execute();             
    }
?>
<!--
    Excluir Cursos
-->
<?php
    if(isset($_GET['excluir'])&&($_GET['cad'])){
        $cad = $_GET['cad'];
        if($cad == "curso"){
            $id = $_GET['excluir'];        
            $con = new PDO("mysql:dbname=recepcao;host=localhost","root","");
                //$verifica = $con->PREPARE("SELECT count(*) AS 'qtd' FROM categoria JOIN cursos ON 
                //categoria.id = cursos.categoria_id WHERE categoria.id = :ID");
                //$verifica->bindParam(":ID",$id);
                //$verifica->execute();
                //$result = $verifica->fetchAll(PDO::FETCH_ASSOC);
                //print $result[0]['qtd'];
            $delete = $con->PREPARE("DELETE FROM cursos WHERE id = :ID");
            $delete->bindParam(":ID",$id);
            $delete->execute();
        }
    }               
?>

    <!--
    Cadastrar Interesses
    -->
    <?php    
    if(isset($_POST['cadcurso']) && isset($_POST['cadinteressado'])){
        print "<h1> Cadastro </h1>";
        $idCurso = $_POST['cadcurso'];
        $idInteressado = $_POST['cadinteressado'];  
        $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
        $sqlinsert = $conexao->PREPARE(
            "INSERT INTO cursosinteressados (cursos_id,interessados_id) 
            VALUES (:CADCURSO,:CADINTERESSADO)");
        $sqlinsert->bindParam(":CADCURSO",$idCurso);
        $sqlinsert->bindParam(":CADINTERESSADO",$idInteressado);
        $sqlinsert->execute();
    }
?>

