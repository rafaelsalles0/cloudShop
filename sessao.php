<?php
	session_start();

	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['id']) == true)){
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		unset($_SESSION['id']);
		header('location: ./CRUD/logout.php');
	}

	$email_logado = $_SESSION['email'];
	$id_logado = $_SESSION['id'];
	$senha_logado = $_SESSION['senha'];
?>