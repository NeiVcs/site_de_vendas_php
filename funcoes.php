<?php
session_start();

if(!$_SESSION['usuario']){
    header('Location: login.php');
    exit();
}

function mensagem($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
        $texto
        </div>";
}

function mover_imagem($vetor_imagem) {
    if(!$vetor_imagem['error']){
        $nome_arquivo = $vetor_imagem['name'];
        move_uploaded_file($vetor_imagem['tmp_name'], "images/".$nome_arquivo);
    } else {
        return 0;
    }
}
?>
