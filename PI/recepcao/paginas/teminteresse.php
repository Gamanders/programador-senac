
<h1 class="text-center">
    Confirmação de Interesse
</h1>

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

        $redirecionar = headers_sent(header("Location:?pagina=login"))?"sim":"não";
        print "<h1> ".$redirecionar."</h1>";
        //header("Location:?pagina=login");
        //ob_clean();
    }
?>