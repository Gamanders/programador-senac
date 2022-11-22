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
        header("Location:?pagina=login");
    }
?>