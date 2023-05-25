<?php
    $host = "localhost";
    $user = "id20800988_admin";
    $base = "id20800988_cloudshop";
    $pass = "123deOliveira4*";

    $con = mysqli_connect($host, $user, $pass, $base) or die ("Sem conexão com o servidor");
    $con -> set_charset("utf8");
?>