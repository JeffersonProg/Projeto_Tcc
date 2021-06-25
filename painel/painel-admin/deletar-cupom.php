<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
$nivel_necessario = 2;
  
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioCpf']) OR ($_SESSION['nivel'] < $nivel_necessario)) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: ../login.php"); exit;
}

include_once('conexao.php');
$result1_postagem = "SELECT * FROM produto";
$resultado1_postagem = mysqli_query($conn, $result1_postagem);
$result2_postagem = "SELECT * FROM promocao";
$resultado2_postagem = mysqli_query($conn, $result2_postagem);
?>	


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excluir Cupom - Zezinho do Carvão </title>
  <link rel="icon" href="../../imagens/ZeLOGO.svg" >
  	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style>
#tela{
    width: 400px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 1px 5px 25px rgb(195, 195, 195);
    }
</style>
</head>
<body>
  
<div class="container" id="tela">
<br>
<center><h4>Excluir cupom</h4></center><br>
<form action="deletarcupom.php" method="post">
<label for="codigo-cupom">Código da promoção:</label>

<select name="codigo" id="codigo-cupom">
<?php while($cod = $resultado2_postagem ->fetch_array()){?>
  <option value="<?php echo $cod['codpromo'];?>"><?php echo $cod['codpromo'];}?></option>
  <option value="" selected></option>
</select>
<button type="submit" name="acao1" class="btn btn-danger" style="float:right">Excluir</button>

<form>
<br><br><br>
</div>
</body>
</html>

