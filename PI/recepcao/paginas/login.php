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
<?php
   print PHP_SESSION_DISABLED;
   print "<br>";
   print PHP_SESSION_NONE;
   print "<br>";
   print PHP_SESSION_ACTIVE;
   print "<br>";
   switch(session_status()) {
    case PHP_SESSION_DISABLED:
    echo "Sessões desabilitadas";
    break;

    case PHP_SESSION_NONE:
    echo "Sessões habilitadas, mas não existem";
    break;

    case PHP_SESSION_ACTIVE:
    echo "Sessões habilitadas e existem";
    break;

}
?>
