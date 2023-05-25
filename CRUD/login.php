<?php
    session_start();

    include("./conexao.php");

    $email = $_POST["email"];
    $password = $_POST["senha"];

    $user = mysqli_query($con, "select * FROM clientes WHERE email = '".$email."' && senha = '".$password."'");
    $data = mysqli_fetch_assoc($user);

    if(($data["email"] == $email) && ($data["senha"] == $password)){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $password;
        $_SESSION['id'] = $data["id"];

        header('location:../alterar_usuario.php');
    }else{
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['id']);
        unset ($_SESSION['usuario']);
        header('location:logout.php');
    }
?>