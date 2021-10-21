<?php
include("conexao.php");
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
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="index.php"><img src="images/logo.png" style="width:150px"></a>
        </nav>  
        <div style="background-image: url('images/background.jpg')">
            <div class="col">
                <form action="trocar_senha_acao.php" method="POST">
                    <div class="form-group">                        
                        <label style="color:white">Usuario:</label>
                        <input type="text" name="usuario"class="form-control"  placeholder="Digite seu CPJ ou CNPJ" required><br>
                        <label style="color:white">Senha:</label>
                        <input type="password" name="senha"class="form-control"  placeholder="Digite a nova senha"required><br>
                        <input class="btn btn-success" type="submit">
                        <a href="index.php"><button type="button" class="btn btn-warning">Voltar</button></a>
                    </div>
                </form>
            </div>
            <footer class="col text-primary bg-dark">
                <p>NeiVcs 2021</p>
            </footer>
        </div>
    </div>
</body>
</html>