<?php
    $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
    if(session_status()==PHP_SESSION_NONE){  
        session_start();
    }
    define("limitCursos", 5);
?>