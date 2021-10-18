<?php
include("conexao.php");

$pesquisa = $_POST['busca'] ?? '';
            
$sql = "SELECT * FROM jogos WHERE titulo LIKE '%$pesquisa%'";

$dados = mysqli_query($conn, $sql);
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
            <nav class="navbar navbar-light">
                <form class="form-inline" action="index.php" method="POST">
                    <input class="form-control mr-sm-2" type="Search" aria-label="Search" name="busca" placeholder="Pesquise aqui">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">buscar</button>
                </form>
            </nav>
        
            <div class='justify-content-center row'>
                <?php
                    while ($linha = mysqli_fetch_assoc($dados)){
                        $id = $linha['id'];
                        $titulo = $linha['titulo'];
                        $genero = $linha['genero'];
                        $jogadores = $linha['jogadores'];
                        $imagem = $linha['imagem'];
             
                        echo"
                        <div style='width:250px; margin:10px 5px 10px 5px; border: 1px solid black; padding:2px; background-color:lightgray; border-radius:5px; box-shadow: 3px 3px 2px black;'>
                            <img class='card-img-top' src='images/$imagem' alt='Card image' style='width:244px; height:244px'>
                            <div class='card-body'>
                                <h3 class='card-title'>$titulo</h3>
                                <h4 class='card-text'>$genero</h4>
                                <p class='card-text'>$jogadores jogador(es)</p>
                            </div>
                            <div class='justify-content-center row'>
                                <a href='#' class='btn btn-primary'>Jogar</a>
                                <a href='atualizar.php?id=$id' class='btn btn-warning mx-2'>Editar</a>
                                <a href='excluir.php' class='btn btn-danger' data-toggle='modal' data-target='#confirma' 
                                onclick=" .'"' ."pegar_dados($id, '$titulo')" .'"' .">Apagar</a>
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
</body>
</html>
    
    <div class="modal" id="confirma">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">ATENÇÃO!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <form action="excluir.php" method="POST">
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

    <script type="text/javascript">
        function pegar_dados(id, titulo){
            document.getElementById('titulo').innerHTML = titulo;
            document.getElementById('cod_jogo').value = id;
            document.getElementById('jogo1').value = titulo;
        }
    </script>

</body>
</html>