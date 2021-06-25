<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
$nivel_necessario = 1;
  
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioCpf']) OR ($_SESSION['nivel'] < $nivel_necessario)) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: ../pages/usuario.php"); exit;
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

$cpfcliente = $_SESSION['usuarioCpf'];
$result2_postagem = "SELECT * FROM pedidos WHERE cpf = $cpfcliente";
$resultado2_postagem = mysqli_query($conn, $result2_postagem);
       
?>	
<!DOCTYPE html>
<html>
<head>
<title>Pedidos - Zezinho do Carvão</title>
<link rel="icon" href="../imagens/ZeLOGO.svg" >
<!-- Js css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="../estilo/estilo.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="palavras-chave,do,meu,site">
<meta name="description" content="Descrição do meu website">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

.body2{
    margin-left:2%;
	height:500%;
	float:center;
	
}

.imagemProduto{
    width: 10%;
    height: 60px;
    margin:0;
    padding:0;
    float:left
}
.poste{
	margin-right:10%;
	width:60%;
	min-height:180px;
	max-height:0px;
	background-color:white;
	border: 1px solid #CDC9C9;
	margin-bottom:2%;
    padding-bottom: 45px;
    padding-top:2%;
    padding-right:2%;
    padding-left:2%;
    float:right;
	/*border-radius:5px;*/
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
  <a class="navbar-brand" href="../index.php"><img class="logo" src="../imagens/ZeLOGO.svg"></a>
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
	</header>
<br>

<div class="body2">
<?php while($dado = $resultado2_postagem ->fetch_array()){ 
    $status = $dado['status'];
    $idproduto = $dado['idproduto'];
    $cpfcliente = $dado['cpf'];
    
    $result1_postagem = "SELECT * FROM produto WHERE id = $idproduto";
    $resultado1_postagem = mysqli_query($conn, $result1_postagem);

while($dado1 = $resultado1_postagem ->fetch_array()){
?> 

<form method="post" id="produto_form">
<div class="poste" <?php if($status == "Pedido entregue"){ echo "style='border-left: 5px solid #40CD28'";}?>
                   <?php if($status == "Cancelado"){ echo "style='border-left: 5px solid #E60014'";}?>
                   <?php if($status == "Em transporte"){ echo "style='border-left: 5px solid #ffd700'";}?>
                   <?php if($status == "Pedido recebido"){ echo "style='border-left: 5px solid #0000ff'";}?>
                   <?php if($status == "Pagamento aprovado"){ echo "style='border-left: 5px solid #FFA500'";}?>
                   <?php if($status == "Nota Fiscal disponível"){ echo "style='border-left: 5px solid #FF8C00'";}?>>

                   <div style="border-bottom: 1px solid #CDC9C9">
                   <a class="list" <?php if($status == "Pedido entregue"){ echo "style='color: #40CD28'";}?>
                   <?php if($status == "Cancelado"){ echo "style='color:#E60014'";}?>
                   <?php if($status == "Em transporte"){ echo "style='color:#ffd700'";}?>
                   <?php if($status == "Pedido recebido"){ echo "style='color:#0000ff'";}?>
                   <?php if($status == "Pagamento aprovado"){ echo "style='color:#FFA500'";}?>
                   <?php if($status == "Nota Fiscal disponível"){ echo "style='color:#FF8C00'";}?>
                   ><?php echo $dado["status"];?></a>
                   <?php if($status == "Pedido entregue"){ echo "<div style='float:right;color:gray'>entregue dia <a class='list' style='color: #40CD28'>". $dado['data']."</div>";}?>
                   <?php if($status == "Cancelado"){ echo "<div style='float:right;color:gray'>cancelado dia <a class='list' style='color: #E60014'>". $dado['data']."</div>";}?>
                   <?php if($status == "Em transporte"){ echo "<div style='float:right;color:gray'>atualizado dia <a class='list' style='color: #ffd700'>". $dado['data']."</div>";}?>
                   <?php if($status == "Pedido recebido"){ echo "<div style='float:right;color:gray'>atualizado dia <a class='list' style='color: #0000ff'>". $dado['data']."</div>";}?>
                   <?php if($status == "Pagamento aprovado"){ echo "<div style='float:right;color:gray'>aprovado dia <a class='list' style='color: #FFA500'>". $dado['data']."</div>";}?>
                   <?php if($status == "Nota Fiscal disponível"){ echo "<div style='float:right;color:gray'>atualizado dia <a class='list' style='color: #FF8C00'>". $dado['data']."</div>";}?>
                  </a>
                    </div>

<br>
<img src="../imagens/produtos/<?php echo $dado1["imagem"];?> " class="imagemProduto">
<div style="float:left; margin-left:2%;margin-top:1%"><?php echo $dado1["nome"]."<br>";?>
<a class="list"><?php echo $dado['qtd']." unidade - R$". number_format($dado1["preco"]*$dado['qtd'], 2, ',', '.')."<br>";?></a>Desconto R$ <?php echo $dado['desconto'];?></div>

</div>		


</form>

<?php	}	}?>	 							

</div>

<footer>
<div class="footer">	
	<div class="center">
	<p> ® Zezinho do carvão – Todos os direitos reservados</p>
	</div>
</div>	
</footer>
</body>
</html>