<?php
	session_start();
	
	unset($_SESSION['usuarioNome']);
	unset($_SESSION['usuarioEmail']);
	unset($_SESSION['usuarioCpf']);
	
	$_SESSION['logindeslogado'] = "Deslogado com sucesso";
	//redirecionar o usuario para a página de login
	header("Location: pages/usuario.php");
?>