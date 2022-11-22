<!--
Cadastrar Interessado pelo proprio usuário
-->
<?php    
    if(isset($_POST['cadastro']) && isset($_POST['tipo'])){        
        $cadastro = $_POST['cadastro'];
        $tipo = $_POST['tipo'];


        if ($cadastro == "interessado" && $tipo == "usuario")        
        $interessadoInsert = $conexao->PREPARE(
            "INSERT INTO interessados (nome,modalidade) 
            VALUES (:NOME,:MODALIDADE)");

            $sqlinsert->bindParam(":NOME",$nome);
            $sqlinsert->bindParam(":MODALIDADE",$modalidade);


            $interessadoInsert->execute();
        
            $usuarioInsert = $conexao->PREPARE(
            "INSERT INTO usuarios (nome,modalidade) 
            VALUES (:NOME,:MODALIDADE)");

            $usuarioInsert->bindParam(":USUARIO",$usuario);    
            $usuarioInsert->bindParam(":NOME",$nome);
            $usuarioInsert->bindParam(":EMAIL",$email);
            $usuarioInsert->bindParam(":SENHA",$modalidade);

            $usuarioInsert->execute();
    }
?>

<!--
Cadastrar categoria
-->
<?php    
    if(isset($_POST['nomeCategoria']) && isset($_POST['modalidade'])&&!isset($_GET['editar'])){        
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
        header("Location:http://localhost/?pagina=cadastro&cad=categoria");
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
        $imagemCurso = $_FILES['imagemCurso'];            
        if(isset($imagemCurso)){
            $upload = move_uploaded_file($imagemCurso['tmp_name'],"img/".$imagemCurso["name"]);
            if($upload){
                print "<h1>Enviado</h1>";
                print  "img/".$imagemCurso["name"];
            }
            else{
                print "<h1 class='text-danger'>Erro</h1>";
            }
            
        }
        $imagemCurso = $imagemCurso['name'];
        $descricaoCurso = $_POST['descricaoCurso'];
        $nomeCurso = $_POST['nomeCurso'];    
        $categoria_id = $_POST['categoria'];
        $dtIni = $_POST['dataInicio'];
        $dtFim = $_POST['dataFim'];
        $cargaHoraria = $_POST['cargahoraria'];
        $capacidade = $_POST['capacidade'];
        $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
        $sqlinsert = $conexao->PREPARE(
            "INSERT INTO cursos (imagem, descricao, nome, dtIni, dtFim, cargaHoraria, capacidade, categoria_id) 
            VALUES (:IMAGEMCURSO,:DESCRICAOCURSO,:NOME,:DTINI, :DTFIM, :CARGAHORARIA, :CAPACIDADE, :CATEGORIA_ID)");
        $sqlinsert->bindParam(":NOME",$nomeCurso);
        $sqlinsert->bindParam(":IMAGEMCURSO",$imagemCurso);
        $sqlinsert->bindParam(":DESCRICAOCURSO",$descricaoCurso);
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
        $sqlupdate->execute();
    }
?>
<!--
    Visualizar detalhes 

-->

<?php
    if(isset($_GET['visualizar'])&&($_GET['cad'])){
        $cad = $_GET['cad'];
        if($cad == "curso"){
            $id = $_GET['visualizar'];
            //$int = $conexao->PREPARE("");
            $con = new PDO("mysql:dbname=recepcao;host=localhost","root","");                
            $detalhes = $con->PREPARE("SELECT * FROM cursos WHERE id = :ID");
            $detalhes->bindParam(":ID",$id);
            $detalhes->execute();
        }
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
            //$int = $conexao->PREPARE("");
            $con = new PDO("mysql:dbname=recepcao;host=localhost","root","");                
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
            "INSERT INTO cursosinteressados (cursos_id,interessados_id) VALUES (:CADCURSO,:CADINTERESSADO)");
        $sqlinsert->bindParam(":CADCURSO",$idCurso);
        $sqlinsert->bindParam(":CADINTERESSADO",$idInteressado);
        $sqlinsert->execute();
    }
?>

<!--
Cadastrar Interesses
-->
<?php    
    if(isset($_POST['acao']) && isset($_POST['cad'])){
        $acao = $_POST['acao'];
        $cad = $_POST['cad'];
        if ($acao == "novo" && $cad == "interessados"){
            $cadinteressados = $conexao->PREPARE("INSERT INTO interessados(contato, email, escolaridade, dtNasc, tpcontato, nome) VALUES (:CONTATO, :EMAIL, :ESCOLARIDADE, :DTNASC, :TPCONTATO, :NOME)"); 
            $contato = $_POST['contato'];
            $dtNasc = $_POST['dataNascimento'];
            $tpcontato = $_POST['tpcontato'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $escolaridade = $_POST['escolaridade'];
            $cadinteressados->bindParam(":CONTATO",$contato);
            $cadinteressados->bindParam(":EMAIL",$email);
            $cadinteressados->bindParam(":ESCOLARIDADE",$escolaridade);
            $cadinteressados->bindParam(":DTNASC",$dtNasc);
            $cadinteressados->bindParam(":TPCONTATO",$tpcontato);
            $cadinteressados->bindParam(":NOME",$nome);
            $cadinteressados->execute();
        }
    }
?>