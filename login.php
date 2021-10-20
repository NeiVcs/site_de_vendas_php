<?php
session_start();
include("conexao.php");

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
                <form action="login_acao.php" method="POST">
                    <div class="text-light text-center">
                        <p>colocar um logo aqui<p>
                    </div>
                    <div>
                        <h3 class="text-light">Seja bem-vindo!</h3>
                    </div>

                    <?php 
                        if(isset($_SESSION['não_autenticado'])):
                    ?>  
                        <div class="alert alert-danger">Login ou senha incorretos.</div>
                    <?php
                        endif;
                        unset($_SESSION['não_autenticado']);
                    ?>
                  
                    <div style="border: 1px white solid; padding:5px; border-radius:5px;">
                        <table class="text-light">
                        <tr>
                        <td><label>Usuário:</label></td>
                        <td><input placeholder="CPF ou CNPJ" type="text" name="usuario" id="cod_jogo" value=""></td>
                        </tr>
                        <tr>
                        <td><label>Senha:</label></td>
                        <td><input type="text" name="senha" id="" value=""></td>
                        </tr>
                        </table><br>
                        <input type="submit" class="btn btn-success" value="Entrar"> 
                        <button class="btn btn-sm text-light">Esqueci minha senha</button>
                    </div><br>
                    <div style="border: 1px white solid; padding:5px; border-radius:5px;">
                        <p class="text-light">Não tem cadastro? faça já sua conta!</p>
                        <button type="button" class="btn btn-primary">Quero comprar</button>
                        <button type="button" class="btn btn-primary">Quero Vender</button>
                    </div>
                </form>   
            </div>
        </div>
    </div>
    <?php
print_r($_SESSION);exit;
?>
</div>
</body>
</html>