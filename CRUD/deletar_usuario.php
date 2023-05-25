<?php
    include("../sessao.php");
    include("conexao.php");

    $delete = "DELETE FROM clientes WHERE id=".$id_logado;

    if(mysqli_query($con, $delete)){
        header("location: ../login.php");
    }else{
        header("location: ../alterar_usuario.php?sql=0");
    }
?>