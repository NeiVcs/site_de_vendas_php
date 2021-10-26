<?php
session_start();
include("conexao.php");

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$validacao_documento = strlen($usuario);
if($validacao_documento == 11){
    $tipo_documento = "cpf";
} else {
    $tipo_documento = "cnpj";}

$query = "SELECT id_cliente, nome_cliente from clientes WHERE cpf_cliente = '{$usuario}' and senha_cliente = '{$senha}'";
$dados = mysqli_query($conn, $query);
$linha = mysqli_fetch_assoc($dados);
$row = mysqli_num_rows($dados);

if($row == 1){
    $_SESSION['usuario'] = $linha['nome_cliente'];
    $_SESSION['id'] = $linha['id_cliente'];
    $_SESSION['tipo'] = $tipo_documento;
    header('Location: index.php');
    exit();
} else {
    $query = "SELECT id_empresa, nome_empresa from empresas WHERE cnpj_empresa = '{$usuario}' and senha_empresa = '{$senha}'";
    $dados = mysqli_query($conn, $query);
    $linha = mysqli_fetch_assoc($dados);
    $row = mysqli_num_rows($dados);

    if($row == 1){
        $_SESSION['usuario'] = $linha['nome_empresa'];
        $_SESSION['id'] = $linha['id_empresa'];
        $_SESSION['tipo'] = $tipo_documento;
        header('Location: meus_jogos_empresa.php');
        exit();
    } else {
        $_SESSION['não_autenticado']=true;
        header('Location: login.php');
        exit();
    }
}