<?php

session_start();

//session_destroy();

echo session_save_path();

echo "<hr>";

echo session_id();

echo "<hr>";

$_SESSION["nome"] = "SENAC - Programador de Sistemas";

$_SESSION["usuario"] = "oempresario";

$_SESSION["acessoem"] = time();

echo "<br>";

//session_unset($_SESSION['nome']);

echo $_SESSION['nome'];

echo "<br>";

echo $_SESSION['acessoem'];

echo "<hr>";

//session_destroy();

echo session_id();

echo "<hr>";

echo session_id();

session_id('ofkncku49jq860tn0et5utgnkl');

echo "<hr>";

echo "novo hash <br>";
echo session_id();

echo "<hr>";

var_dump(session_status());

echo "<hr>";

//session_abort();
//session_destroy();

switch(session_status()) {
git 
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

session_regenerate_id();

echo "<hr>";

echo session_id();

echo "<hr>";

var_dump($_SESSION);
?>
