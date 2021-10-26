<?php
session_start();

if(!$_SESSION['usuario']){
    header('Location: login.php');
    exit();
} elseif ($_SESSION['tipo']=="cpf"){
    header('Location: index.php');
    exit();}

?>