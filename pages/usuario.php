<?php
  session_start();
	$conn = new mysqli("localhost","root","","projeto_tcc");
	if (!isset($_SESSION['usuarioNome'])) {
		// Destrói a sessão por segurança
		//session_destroy();
		// Redireciona o visitante de volta pro login
		//header("Location: index.php"); exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ZEZINHO </title>

	<!-- Js css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link href="../estilo/style.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
	<meta charset="utf-8" />
<style>
.footer{
	background: #db371a;
	padding: 30px 0;
	width: 100%;
	bottom:0;
	margin-top:0;
}
																
.footer p{
	color: white;
	text-align: center;
	font-weight:400;
	font-size: 16px;
}
</style>
</head>



<body>


	<!--jquery e poppy -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<header>

	<nav class="navbarespaco navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img class="logo" src="../imagens/ZezinhoLOGO.svg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

  <nav class="navbar navbar-light bg-light justify-content-between">
  <form class="form-inline" action="pesquisar.php" method="post">
    <input class="form-control mr-sm-2" type="search" name="pesquisar" placeholder="Procurar" aria-label="Search">
    <button class="btn btn-dark my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
  </form>
</nav>

    <div class="navbar-nav">
      <a realtime ="home" class="nav-item nav-link active" href="../home">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="vitrine.php">Produtos</a>
     <!-- <a realtime ="" class="nav-item nav-link" href=""></a> -->
      <a class="nav-item nav-link" href="contato.php">Contato</a>
	  <a realtime ="usuario" class="nav-item nav-link" href="usuario.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg></a>
    </div>
  </div>
</nav>
	</header>

	



  <div class="container"> 
    <div class="row">


      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Quero criar uma conta</h4>
            <form action="../cadastrocliente.php" class="form-signin" method="post">
            
              <div class="form-label-group">
              <input type="email" id="emailc" name="emailc" class="form-control" placeholder="Email" required autofocus>
              <label for="emailc">Email</label>
              </div>
              <br>
        
              <div style="text-align:center"> 
              <input type="submit" name="acao" class="btn btn-success" value= "Continuar" />
          
          
            </div> 
            </form>
          </div>
        </div>
      </div>


      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Já sou cliente</h4>
            <form action="../validarlogin.php" class="form-signin" method="post">
            
              <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>
              <label for="inputEmail">Email</label>
              </div>
<br>
              <div class="form-label-group">
                <input type="password" id="inputSenha" name="senha" class="form-control" placeholder="Password" required>
                <label for="inputSenha">Senha</label> 
              </div>
              <p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
				        unset($_SESSION['loginErro']);}?>
		</p> 
		<p class="text-center text-success">
			<?php if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);}?>
    </p>
<br>
           
              <div style="text-align:center"> 
              <input type="submit" name="acao" class="btn btn-success" value= "Continuar" />
             
             
    


              <hr class="my-4">
              Esqueci meu <a href="recuperaremail.php">email</a> ou a <a href="recuperarsenha.php">senha</a> 
            </div> 
            </form>        
          </div>
        </div>
      </div>

    </div>
  </div>

<div class="footer">	
<div class="center">
<p> ® Zezinho do carvão – Todos os direitos reservados</p>
</div>
</div>


</body>
</html>