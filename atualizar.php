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

    <?php
    $id_produto = $_GET['id'] ?? '';
    $sql = "SELECT * FROM produtos WHERE id_produto = $id_produto";

    $dados = mysqli_query ($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    $imagem_produto = $linha['imagem_produto'];
    ?>
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
                <form action="atualizar_acao.php" method="POST">
                    <div class="form-group">                        
                        <div class="row">
                            <?php
                                echo"
                                    <div style='width:300px; display:block; margin-left: auto; margin-right: auto; margin-top: 15px; border: 1px solid black; padding:2px; background-color:lightgray; border-radius:5px; box-shadow: 3px 3px 2px black;'>
                                        <img src='images/$imagem_produto' alt='Card image' style='width:295px; height:300px'>
                                    </div>" 
                            ?>
                        </div>
                        <label style="color:white">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Digite o título do jogo" required value="<?php echo $linha['titulo_produto']; ?>"><br>
                        <label style="color:white">Gênero:</label>
                        <input type="text" name="genero"class="form-control"  placeholder="Digite o gênero do jogo" required value="<?php echo $linha['genero_produto']; ?>"><br>
                        <label style="color:white">Preço:</label>
                        <input type="number" name="preco"class="form-control"  placeholder="Digite o preço"required value="<?php echo $linha['preco_produto']; ?>"><br>
                        <input class="btn btn-success" type="submit">
                        <input type="hidden" name="id" value="<?php echo $linha['id_produto']; ?>">
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