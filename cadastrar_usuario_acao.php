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
        </nav>
        <div style="background-image: url('images/background.jpg')">
            <div class="col">
                <br>
                <?php  
                    include("conexao.php"); 

                    $nome_cliente = $_POST['nome'];
                    $cpf_cliente = $_POST['cpf'];
                    $validacao_documento = strlen($cpf_cliente);
                    $senha_cliente = $_POST['senha'];
                    
                    $query = "SELECT id_cliente from clientes WHERE cpf_cliente = '{$cpf_cliente}'";
                    $dados = mysqli_query($conn, $query);
                    $linha = mysqli_fetch_assoc($dados);
                    $row = mysqli_num_rows($dados);
                    
                    $query = "INSERT INTO clientes (nome_cliente , cpf_cliente, senha_cliente) 
                    VALUES ('$nome_cliente' , '$cpf_cliente', '$senha_cliente')";

                    if($validacao_documento==11 && !$row == 1){
                        if(mysqli_query($conn, $query)){
                            mensagem("$nome_cliente foi cadastrado com sucesso!","success");}

                    }else
                        mensagem("$nome_cliente NÃO foi cadastrado! As informações passadas estão incorretas ou já existe cadastro neste CPF.","danger");

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