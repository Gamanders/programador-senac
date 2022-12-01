<?php    
    if(isset($_SESSION['usuario'])){
        $tipo = $_SESSION['tipo'];
        if($tipo =="admin"){
            print"
                <script> alert('Usuário Administrador - Registre-se como estudante'); </script>
            ";
        }
        else{
            include("paginas/confirmarInteresse.php");
        }        
    }
    else{
        print"
                <script> alert('É necessário fazer login!'); </script>
            ";
        print" 
        <br>
        <a class='btn btn-lg btn-outline-dark' href='?pagina=login'>
            Logar
        </a>
        ";
    }
?>