<div class="mx-auto w-25">
    <p class="h5">
        <?php
            print "Confirme seu interesse no curso ";
            print "<span class='text-danger'>";
            print isset($_GET['curso'])?$_GET['curso']:"";            
            print "</span>";
        ?>
    </p>
    <form method="post">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                print "<input type='hidden' name='acao' value='confirmarInteresse'>";
                print "<input type='hidden' name='id' value='".$id."'>";
            }
        ?>
        <input class="form-control" type="password" name="senha" placeholder="Digite sua senha">
        <button class="btn btn-primary mt-2">
            Registrar
        </button>    
    </form>
</div>