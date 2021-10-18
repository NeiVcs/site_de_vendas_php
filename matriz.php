<?php
session_start();
include("conexao.php");
//echo "olá";

$jogo1 = [
    "titulo" => "Hollow Knight",
    "genero" => "metroidvania",
    "jogadores" => "1 jogador",
    "imagem" => "images/hollow.jpg"
];
$jogo2 = [
    "titulo" => "Castlevania",
    "genero" => "metroidvania",
    "jogadores" => "1 jogador",
    "imagem" => "images/castlevania.jpg"
];
$jogo3 = [
    "titulo" => "Sonic",
    "genero" => "ação",
    "jogadores" => "1-2 jogadores",
    "imagem" => "images/sonic.png"
];
$jogo4 = [
    "titulo" => "Pokémon",
    "genero" => "RPG",
    "jogadores" => "1 jogador",
    "imagem" => "images/pokemon.jpg"
];
$jogo5 = [
    "titulo" => "Yu-Gi-Oh!",
    "genero" => "bourd game",
    "jogadores" => "1-2 jogador",
    "imagem" => "images/yugioh.jpg"
];

$jogos = [$jogo1, $jogo2, $jogo3, $jogo4, $jogo5];
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
    <div class="container bg-dark">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Jogos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="galeria.php">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                    </li>   
                </ul>
            </div>  
        </nav>
        <div class="justify-content-center row" style="background-image: url('images/background.jpg')">
            <?php 
                for ($i=0; $i<count($jogos); $i++){ 
                    $jogo = $jogos[$i];
            ?> 
                <div style="width:250px; margin:10px 5px 10px 5px; border: 1px solid black; padding:2px; background-color:lightgray; border-radius:5px; box-shadow: 3px 3px 2px black;">
                    <img class="card-img-top" src="<?= $jogo["imagem"] ?>" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h3 class="card-title"><?= $jogo["titulo"] ?></h3>
                        <h4 class="card-text"><?= $jogo["genero"] ?></h4>
                        <p class="card-text"><?= $jogo["jogadores"] ?></p>
                        <a href="#" class="btn btn-primary">Jogar</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>