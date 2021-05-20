<?php
	session_start();
	if (!isset($_SESSION['usuarioNome'])) {
		// Destrói a sessão por segurança
		session_destroy();
		// Redireciona o visitante de volta pro login
		//header("Location: index.php"); exit;
	}
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "projeto_tcc";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
?>
<?php
$result1_postagem = "SELECT * FROM produto";
$resultado1_postagem = mysqli_query($conn, $result1_postagem);
?>	
<!DOCTYPE html>
<html lang="en">
<head>
<title>ZEZINHO </title>

<!-- Js css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="../estilo/style.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="palavras-chave,do,meu,site">
<meta name="description" content="Descrição do meu website">

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
.body2{
    margin-left:2%;
	height:500%;
	float:center;
	
}

.imagemProduto{
    width: 100%;
    height: 200px;
    margin:0;
    padding:0;
}
.poste{
	margin-right:2%;
	width:23%;
	min-height:300px;
	max-height:350px;
	background-color:white;
	border: 1px solid #CDC9C9;
	margin-bottom:2%;
    padding-bottom: 45px;
    padding-top:2%;
    padding-right:2%;
    padding-left:2%;
    float:left;
	border-radius:5px;
}

.list{
    font-size:17px;
	font-weight:bold;
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
  <a class="navbar-brand" href="../index.php"><img class="logo" src="../imagens/ZezinhoLOGO.svg"></a>
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
      <a class="nav-item nav-link active" href="../index.php">Home<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="vitrine.php">Produtos</a>
     <!-- <a realtime ="" class="nav-item nav-link" href=""></a> -->


      <a class="nav-item nav-link" href="contato.php">Contato</a>

<?php if(isset($_SESSION['usuarioNome'])){?>
	<a class="nav-item nav-link" href="../carrinho/carrinho.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg></a>
<div class="dropdown">
  <a class="nav-item nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="minhaconta.php">Minha conta</a>
    <a class="dropdown-item" href="pedidos.php">Meus pedidos</a>
    <a class="dropdown-item" href="../sair.php">Sair</a>
  </div>
</div>



<?php } else{?>

	<a class="nav-item nav-link" href="usuario.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg></a>
<?php }?>
    </div>
  </div>
</nav>
	</header><br><br>

	<div class="col-sm-9 col-md-7 col-lg-6 mx-auto"> <!-- tamanho -->      
        <div class="card-body">
        <form action="validarpgcontato.php" class="form-signin" method="post">             
            <input type="text" id="inputname" name="nome" class="form-control" placeholder="Nome" required><br>
            <input type="email" id="inputemail" name="email" class="form-control" placeholder="E-mail" required><br>
            <input type="text" id="inputtelefone" name="telefone" class="form-control" placeholder="Telefone" required><br>
            <textarea type="text" id="inputmensagem" name="mensagem" class="form-control" placeholder="Sua mensagem" required></textarea><br>
        <div style="text-align:center"> 
            <input type="submit" name="acao" class="btn btn-success" value= "Enviar" />
        </div> 
        </form>        
        </div>
    </div>

	
<br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236038.927007661!2d-47.091009483593766!3d-22.424951699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8f85011dea2dd%3A0x22b471946d92ea48!2sEscola%20T%C3%A9cnica%20Estadual%20Pedro%20Ferreira%20Alves!5e0!3m2!1spt-PT!2sbr!4v1616429686100!5m2!1spt-PT!2sbr" width="100%" height="350" style="border:0; margin:0;padding:0;" allowfullscreen="" loading="lazy"></iframe>
    <footer>
<div class="footer">	
	<div class="center">
	<p> ® Zezinho do carvão – Todos os direitos reservados</p>
	</div>
</div>	
</footer>
	
</body>
</html>
