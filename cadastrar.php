<?php
include("conexao.php");
include("funcoes.php");
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
            <a class="navbar-brand" href="index.php">Jogos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                    </li>   
                </ul>
            </div>  
        </nav>
        <div style="background-image: url('images/background.jpg')">
            <div class="col">
                <form action="cadastrar_acao.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label style="color:white">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Digite o título do jogo" required><br>
                        <label style="color:white">Gênero:</label>
                        <input type="text" name="genero"class="form-control"  placeholder="Digite o gênero do jogo" required><br>
                        <label style="color:white">Jogadores:</label>
                        <input type="number" name="preco"class="form-control"  placeholder="Digite o número de players" required><br>
                        <label style="color:white">Imagem:</label>
                        <input class="form-control" name="imagem" type="file" accept=".jpg"><br>
                        <input class="btn-success" type="submit">
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