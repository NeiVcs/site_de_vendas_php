<?php
    $server = "localhost";
    $user = "root";
    $pass = "1965";
    $bd = "jogos";

    if( $conn = mysqli_connect($server, $user, $pass, $bd)){
    // echo 'conectado';
    }else
        echo 'erro';

    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
            $texto
            </div>";
    }
  
    function mover_imagem($vetor_imagem)
    {
        if(!$vetor_imagem['error']){
            $nome_arquivo = $vetor_imagem['name'];
            move_uploaded_file($vetor_imagem['tmp_name'], "images/".$nome_arquivo);
        } else {
            return 0;
        }
    }
?>