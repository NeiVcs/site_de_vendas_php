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
                <br>
                <?php  
                    include("conexao.php"); 

                    $nome_empresa = $_POST['nome'];
                    $cnpj_empresa = $_POST['cnpj'];
                    $senha_empresa = $_POST['senha'];
                    
                    $query = "INSERT INTO empresas (nome_empresa , cnpj_empresa, senha_empresa) 
                    VALUES ('$nome_empresa' , '$cnpj_empresa', '$senha_empresa')";

                    if(mysqli_query($conn, $query)){
                        mensagem("$nome_empresa foi cadastrado com sucesso!","success");
                    }else
                        mensagem("$nome_empresa NÃO foi cadastrado!","danger");
                ?>
            </div>
            <div class="justify-content-center row"><a href="login.php" class=" btn btn-success">Clique aqui para voltar</a></div><br>
            <footer class="col text-primary bg-dark">
                <p>NeiVcs 2021</p>
            </footer>
        </div>
    </div>
</body>
</html>