<?php
	session_start();
	
	unset(
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioEmail'],
	);
	
	$_SESSION['logindeslogado'] = "Deslogado com sucesso";
	//redirecionar o usuario para a página de login
	header("Location: login.php");
?>