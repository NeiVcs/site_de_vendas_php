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
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['não_autenticado']=true;
        header('Location: login.php');
        exit();
    }
}






















$pesquisa = $_POST['busca'] ?? '';
            
$sql = "SELECT * FROM produtos WHERE titulo_produto LIKE '%$pesquisa%'";

$dados = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body style="background-color: gray">
    <div class="container">            
        <div class='justify-content-center row my-5'>
            <div class="jumbotron bg-dark">                 
                <form action="" method="POST">
                    <div>
                        <h3 class="text-light">Seja bem-vindo ao site jogos!</h3>
                    </div>
                    <div class="alert alert-danger">Login ou senha incorretos.</div>
                    <div style="border: 1px white solid; padding:5px; border-radius:5px;">
                        <table class="text-light">
                        <tr>
                        <td><label>usuário:</label></td>
                        <td><input placeholder="CPF ou CNPJ" type="text" name="usuario" id="cod_jogo" value=""></td>
                        </tr>
                        <tr>
                        <td><label>senha:</label></td>
                        <td><input type="text" name="senha" id="" value=""></td>
                        </tr>
                        </table><br>
                        <input type="submit" class="btn btn-success" value="Entrar"> 
                        <button class="btn btn-sm text-light">Esqueci minha senha</button>
                    </div><br>
                    <div style="border: 1px white solid; padding:5px; border-radius:5px;">
                        <p class="text-light">Ainda não tem cadastro? faça já sua conta!</p>
                        <button type="button" class="btn btn-primary">Quero comprar</button>
                        <button type="button" class="btn btn-primary">Quero Vender</button>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>
</body>
</html>