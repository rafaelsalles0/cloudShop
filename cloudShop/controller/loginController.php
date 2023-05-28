<?php
    require_once ROOT.'model/conexaoModel.php';
    require_once ROOT.'model/sessaoModel.php';
    require_once ROOT.'model/clienteModel.php';

    $conexao = new Conexao();
    $conexao->conectar();

    $sessao = new Sessao();

    $cliente = new Cliente($_POST["email"], $_POST["senha"]);

    

    $query = $conexao->select("SELECT * FROM clientes WHERE email = '".$cliente->email."' && senha = '".$cliente->password."'");;
    $data = mysqli_fetch_assoc($query);

    if(($data["email"] == $cliente->email) && ($data["senha"] == $cliente->password)){
        $sessao->login();
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $password;
        $_SESSION['id'] = $data["id"];

        //header('location:../alterar_usuario.php');
    }else{
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['id']);
        unset ($_SESSION['usuario']);
        //header('location:logout.php');
    }
?>