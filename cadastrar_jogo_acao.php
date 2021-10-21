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
                <?php  
                    include("conexao.php");  
                    include("funcoes.php");  

                    $titulo_produto = $_POST['titulo'];
                    $genero_produto = $_POST['genero'];
                    $preco_produto = $_POST['preco'];
                    
                    $imagem_produto = $_FILES['imagem'];
                    $nome_imagem = $imagem_produto['name'];
                    mover_imagem($imagem_produto);



                    $sql = "INSERT INTO produtos (titulo_produto , genero_produto, preco_produto, imagem_produto) 
                    VALUES ('$titulo_produto' , '$genero_produto', '$preco_produto', '$nome_imagem')";

                    if(mysqli_query($conn, $sql)){
                        mensagem("$titulo_produto foi cadastrado com sucesso!","success");
                    }else
                        mensagem("$titulo_produto NÃO foi cadastrado!","danger");
                ?>
            </div>
            <div class="justify-content-center row"><a href="index.php" class=" btn btn-success">Clique aqui para voltar</a></div>
            <footer class="col text-primary bg-dark">
                <p>NeiVcs 2021</p>
            </footer>
        </div>
    </div>
</body>
</html>