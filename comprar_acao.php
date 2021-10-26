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
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>   
                </ul>
            </div>  
        </nav>
        <div style="background-image: url('images/background.jpg')">
            <div class="col">
                <br>
                <?php  
                    include("conexao.php");
                    include("funcoes.php");

                    $id_produto = $_GET['id'] ?? '';


                    $sql_dados = "SELECT * FROM produtos WHERE id_produto = $id_produto";
                
                    $dados = mysqli_query ($conn, $sql_dados);
                    $linha = mysqli_fetch_assoc($dados);
                    $titulo_produto = $linha['titulo_produto'];
                    $imagem_produto = $linha['imagem_produto'];
                    $id_empresa = $linha['id_empresa'];
                    $quantidade_inicial = $linha['Quantidade_produto'];
                    $quantidade_final = $quantidade_inicial - 1;
                    $id_cliente = $_SESSION['id'];
                    
                    

                    $sql_qt = "UPDATE produtos set quantidade_produto =  '$quantidade_final' WHERE id_produto = $id_produto";
                    $dados2 = mysqli_query ($conn, $sql_qt);

                    $sql_add = "INSERT into pedidos (id_cliente, id_empresa, id_produto) 
                    VALUES ('$id_cliente', '$id_empresa', '$id_produto')";

                ?>
                <div class="form-group">                        
                    <div class="row">
                        <?php
                            echo"
                                <div style='width:300px; display:block; margin-left: auto; margin-right: auto; margin-top: 15px; border: 1px solid black; padding:2px; background-color:lightgray; border-radius:5px; box-shadow: 3px 3px 2px black;'>
                                    <img src='images/$imagem_produto' alt='Card image' style='width:295px; height:300px'>
                                </div>" 
                        ?>
                    </div>
                </div>
                <?php
                    if(mysqli_query($conn, $sql_add)){
                       mensagem("$titulo_produto foi adquirido com sucesso!","success");
                    }else
                       mensagem("$titulo_produto NÃO foi adquirido!","danger");
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