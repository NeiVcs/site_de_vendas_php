<?php
session_start();
include("conexao.php");

//if(empty($_POST['usuario']) || empty($_POST['senha'])){
//    header('Location: login.php');
//    exit();
//}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT id_cliente, nome_cliente from clientes WHERE cpf_cliente = '{$usuario}' and senha_cliente = '{$senha}'";

$dados = mysqli_query($conn, $query);
$row = mysqli_num_rows($dados);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
    exit();
} else {
    $query = "SELECT id_empresa, nome_empresa from empresas WHERE cnpj_empresa = '{$usuario}' and senha_empresa = '{$senha}'";

    $dados = mysqli_query($conn, $query);
    $row = mysqli_num_rows($dados);

    if($row == 1){
        $_SESSION['usuario'] = $usuario;
        header('Location: meus_jogos_empresa.php');
        exit();
    } else {
        $_SESSION['não_autenticado']=true;
        header('Location: login.php');
        exit();
    }
}