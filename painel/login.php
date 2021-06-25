<?php
 session_start();
 ?>


<html>

<head>
	<title>Painel de controle</title>
	<link rel="icon" href="../imagens/ZeLOGO.svg" >
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>


<body>

<div class="box-login">
	<h2>Efetue o login:</h2>
		<form action="validaradm.php" method="post">
			<input type="text" name="user" placeholder="Login..." required>
			<input type="password" name="password" placeholder="Senha..." required>
			<div class="form-group-login left">
				<input type="submit" name="acao" value="Logar!">
			</div>
			<div class="form-group-login right">
				<label>Lembrar-me</label>
				<input type="checkbox" name="lembrar" />
			</div>
			<div class="clear"></div>
		</form>

        <p class="box-erro">
			<?php if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);}?>
		</p> 
		<p class="box-sucess">
			<?php if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);}?>
    </p>
	</div><!--box-login-->

<div>
</body>

</html>