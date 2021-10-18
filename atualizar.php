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

    <?php
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM jogos WHERE id = $id";

    $dados = mysqli_query ($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    $imagem = $linha['imagem'];
    ?>
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
                <form action="atualizar_acao.php" method="POST">
                    <div class="form-group">                        
                        <div class="row">
                            <?php
                                echo"
                                    <div style='width:300px; display:block; margin-left: auto; margin-right: auto; margin-top: 15px; border: 1px solid black; padding:2px; background-color:lightgray; border-radius:5px; box-shadow: 3px 3px 2px black;'>
                                        <img src='images/$imagem' alt='Card image' style='width:295px; height:300px'>
                                    </div>" 
                            ?>
                        </div>
                        <label style="color:white">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Digite o título do jogo" required value="<?php echo $linha['titulo']; ?>"><br>
                        <label style="color:white">Gênero:</label>
                        <input type="text" name="genero"class="form-control"  placeholder="Digite o gênero do jogo" required value="<?php echo $linha['genero']; ?>"><br>
                        <label style="color:white">Jogadores:</label>
                        <input type="number" name="jogadores"class="form-control"  placeholder="Digite o número de players"required value="<?php echo $linha['jogadores']; ?>"><br>
                        <input class="btn-success" type="submit">
                        <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
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