<?php
    include("conexao.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    $pessoa = $_POST["pessoa"];
    $cpf = $_POST["cpf"];
    $cnpj = $_POST["cnpj"];
    $nascimento = $_POST["nascimento"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $cartao = $_POST["cartao"];
    $titular = $_POST["titular"];
    $codigo = $_POST["codigo"];
    $vencimento = $_POST["vencimento"];

    $insert = "INSERT INTO clientes (email, senha, nome, pessoa, cpf, cnpj, nascimento, telefone, endereco, cep, cartao, titular, codigo, vencimento) VALUES ('".$email."', '".$senha."', '".$nome."', '".$pessoa."', '".$cpf."', '".$cnpj."', '".$nascimento."', '".$telefone."', '".$endereco."', '".$cep."', '".$cartao."', '".$titular."', '".$codigo."', '".$vencimento."');";

    if(mysqli_query($con, $insert)){
        header("location: ../login.php");
    }else{
        header("location: ../cadastro_usuario.php?sql=0");
    }
?>