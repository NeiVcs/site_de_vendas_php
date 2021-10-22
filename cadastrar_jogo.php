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
            <a class="navbar-brand" href="meus_jogos_empresa.php">Jogos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="meus_jogos_empresa.php">Meus jogos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar_jogo.php">Cadastrar</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>   
                </ul>
            </div>  
        </nav>
        <div style="background-image: url('images/background.jpg')">
            <div class="col">
                <form action="cadastrar_jogo_acao.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label style="color:white">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Digite o título do jogo" required><br>
                        <label style="color:white">Gênero:</label>
                        <input type="text" name="genero"class="form-control"  placeholder="Digite o gênero do jogo" required><br>
                        <label style="color:white">Preço:</label>
                        <input type="number" name="preco"class="form-control"  placeholder="Digite o preço do jogo" required><br>
                        <label style="color:white">Imagem:</label><br>
                        <input class="text-light" name="imagem" type="file" accept=".jpg"><br><br><br>
                        <input class="btn btn-success" type="submit">
                        <a href="meus_jogos_empresa.php"><button type="button" class="btn btn-warning">Voltar</button></a>
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