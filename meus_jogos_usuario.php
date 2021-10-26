<?php
include("conexao.php");
include("funcoes.php");

$usuario = $_SESSION['usuario'];
$id = $_SESSION['id'];
$pesquisa = $_POST['busca'] ?? '';

$query_lista = "SELECT produtos.id_produto, produtos.titulo_produto, produtos.genero_produto, produtos.imagem_produto FROM produtos
INNER JOIN pedidos ON produtos.id_produto=pedidos.id_produto and pedidos.id_cliente=$id;";

$dados_lista = mysqli_query($conn, $query_lista);

?>

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
            <nav class="navbar navbar-light">
            <p class="text-light"><?php echo "Ola <b>$usuario</b> seja bem-vindo!";?></p>
                <form class="form-inline" action="index.php" method="POST">
                    <input class="form-control mr-sm-2" type="Search" aria-label="Search" name="busca" placeholder="Pesquise aqui">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">buscar</button>
                </form>

            </nav>
        
            <div class='justify-content-center row'>
                <?php
                    while ($linha = mysqli_fetch_assoc($dados_lista)){
                        $id_produto = $linha['id_produto'];
                        $titulo_produto = $linha['titulo_produto'];
                        $genero_produto = $linha['genero_produto'];
                        $imagem_produto = $linha['imagem_produto'];

                        echo"
                        <div style='width:250px; margin:10px 5px 10px 5px; border: 1px solid black; padding:2px; background-color:lightgray; border-radius:5px; box-shadow: 3px 3px 2px black;'>
                            <img class='card-img-top' src='images/$imagem_produto' alt='Card image' style='width:244px; height:244px'>
                            <div class='card-body'>
                                <h3 class='card-title'>$titulo_produto</h3>
                                <p class='card-text'>$genero_produto</p>
                            </div>
                            <div class='justify-content-center row'>
                                <a data-toggle='modal' data-target='#trolei' class='btn btn-primary mx-2'>Jogar</a>
                                <a href='excluir_jogo_usuario.php' class='btn btn-danger' data-toggle='modal' data-target='#confirma' 
                                onclick=" .'"' ."pegar_dados($id_produto, '$titulo_produto')" .'"' .">Excluir</a>
                            </div>
                        </div>   
                        "; 
                    }
                ?>
            </div>
            <footer class="col text-primary bg-dark">
                <p>NeiVcs 2021</p>
            </footer>
        </div>
    </div>    

    <div class="modal" id="confirma">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">ATENÇÃO!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <form action="excluir_jogo_usuario.php" method="POST">
                    <div class="modal-body">
                        <p>Deseja realmente excluir <b id="titulo"></b> definitivamente da sua biblioteca?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Sim, este jogo é horrivel">
                        <input type="hidden" name="id" id="cod_jogo" value="">
                        <input type="hidden" name="titulo" id="jogo1" value="">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="trolei">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">sóquenão...</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body justify-content-center">
                    <img src="images/atencao.jpg"></img>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceitar e voltar</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function pegar_dados(id, titulo){
            document.getElementById('titulo').innerHTML = titulo;
            document.getElementById('cod_jogo').value = id;
            document.getElementById('jogo1').value = titulo;
        }
    </script>
</div>
</body>
</html>