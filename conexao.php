<?php
    $server = "localhost";
    $user = "root";
    $pass = "1965";
    $bd = "jogos";

    if( $conn = mysqli_connect($server, $user, $pass, $bd)) {
    // echo 'conectado';
    }else
        echo 'erro';
?>