<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsivo.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>CloudShop</title>
</head>
<body>
    <div class="container login">
        <?php include("header.php"); ?>

        <form action="./CRUD/login.php" method="post" id="form">
            <h2>Login</h2>
            <input type="email" name="email" placeholder="E-mail *" required>
            <input type="password" name="senha" placeholder="Senha *" required>
            <button type="submit" id="continuar-pessoais">Entrar</button>
            <a href="cadastro_usuario.php">ou Cadastre-se aqui</a>
        </form>
    </div>
</body>
</html>