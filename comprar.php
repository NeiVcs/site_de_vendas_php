<!DOCTYPE html>
<html lang="pt-br">
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
            <div class="container">
                <div class="container"><br>
                    <?php  
                        include("conexao.php");
                        include("funcoes.php");
                        session_start();

                        $id_produto = $_GET['id'] ?? '';
                        $sql_dados = "SELECT * FROM produtos WHERE id_produto = $id_produto";

                        $dados = mysqli_query ($conn, $sql_dados);
                        $linha = mysqli_fetch_assoc($dados);
                        $titulo_produto = $linha['titulo_produto'];
                        $genero_produto = $linha['genero_produto'];
                        $preco_produto = $linha['preco_produto'];
                        $imagem_produto = $linha['imagem_produto'];
                        $id_empresa = $linha['id_empresa'];
                        $id_cliente = $_SESSION['id'];
                        echo $id_cliente;
                        
                        $sql_teste = "SELECT id_cliente FROM pedidos WHERE id_produto = $id_produto and id_cliente = $id_cliente";
                        $dados2 = mysqli_query ($conn, $sql_teste);
                        $linha2 = mysqli_fetch_assoc($dados2);
                        $valor = $linha2['id_cliente'];
                        
                        
     

                        
                        echo"
                            <div class='form-group container row'>                        
                                <div style='width:300px; margin:10px 5px 10px 5px; border: 1px solid black; padding:2px; background-color:lightgray; border-radius:5px; box-shadow: 3px 3px 2px black;'>
                                    <img class='card-img-top' src='images/$imagem_produto' alt='Card image' style='width:295px; height:295px'>
                                </div>
                                <div>
                                    <div class='bg-light my-3 mx-3' style='border-radius:5px; box-shadow: 3px 3px 2px black;'>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th><h3>Detalhes da transação</h3></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><p class='card-title'>Jogo: <b>$titulo_produto</b></p>
                                                </tr>
                                                <tr>
                                                    <td><p class='card-text'>Genero: $genero_produto</p></td></td>
                                                </tr>
                                                <tr>
                                                    <td>Preço: $preco_produto</td>
                                                </tr>
                                                <tr>
                                                    <td><div class='justify-content-center'>
                                                        <a href='comprar_acao.php?id=$id_produto' class='btn btn-success btn-block'>Comprar</a>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>";
                    ?>
                </div>
            </div>
            
            <div class="justify-content-center row"><a href="index.php" class=" btn btn-success">Clique aqui para voltar</a></div><br>
        
        </div>
        <footer class="col text-primary bg-dark">
                <p>NeiVcs 2021</p>
            </footer>
    </div>
</body>
</html>