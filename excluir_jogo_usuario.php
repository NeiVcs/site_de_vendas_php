<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Só Games</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body style="background-color: gray">
    <div class="container">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="index.php"><img src="images/logo.png" style="width:150px"></a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="meus_jogos_usuario.php">Meus jogos</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="sair2.php">Sair</a>
                    </li>   
                </ul>
            </div>  
        </nav>
        <div style="background-image: url('images/background.jpg')">
            <div class="col"><br>
                <?php  
                    include("conexao.php");
                    include("funcoes2.php");

                    $id_cliente = $_SESSION['id'];
                    $id_produto = $_POST['id'];
                    $titulo_produto = $_POST['titulo'];
                    
                    $query = "DELETE from pedidos WHERE id_produto = $id_produto and id_cliente = $id_cliente";

                    if(mysqli_query($conn, $query)){
                        mensagem("$titulo_produto excluido com sucesso!","success");
                    }else
                        mensagem("$titulo_produto NÃO excluido!","danger");
                ?>
            </div>
            <div class="justify-content-center row"><a href="index.php" class=" btn btn-success">Clique aqui para voltar</a></div><br>
            <footer class="col text-primary bg-dark">
                <p>NeiVcs 2021</p>
            </footer>
        </div>
    </div>
</body>
</html>