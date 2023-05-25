<?php
    include("../sessao.php");
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

    $update = "UPDATE clientes SET email = '".$email."', senha = '".$senha."', nome = '".$nome."', pessoa = '".$pessoa."', cpf = '".$cpf."', cnpj = '".$cnpj."', nascimento = '".$nascimento."', telefone = '".$telefone."', endereco = '".$endereco."', cep = '".$cep."', cartao = '".$cartao."', titular = '".$titular."', codigo = '".$codigo."', vencimento = '".$vencimento."'  WHERE id = '".$id_logado."'";

    if(mysqli_query($con, $update)){
        header("location: ../alterar_usuario.php?sql=1");
    }else{
        header("location: ../alterar_usuario.php?sql=0");
    }
?>