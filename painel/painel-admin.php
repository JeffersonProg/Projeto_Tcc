<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
$nivel_necessario = 2;
  
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioCpf']) OR ($_SESSION['nivel'] < $nivel_necessario)) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: login.php"); exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel Administrativo</title>
    <link rel="icon" href="../imagens/ZeLOGO.svg" >
   <!-- CSS only -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="type.css" rel="stylesheet">
</head>
<style type="text/css">
body {
  margin: 0 auto;
  padding: 0;
  background-color: #1E90FF;
}

.navcor{
    background-color:#1E90FF;
    color:white;
    font-size:17px;
    font-weight:bold;
}

.navcor1{
    background-color:#1E90FF;
    color:white;
    font-size:17px;
    font-weight:bold;
    cursor: pointer;
}

.navcor1:hover{
    opacity:0.5;
}

.botaonovo{
    background-color:#1E90FF;
    color:white;
    border:none;
    color:white;
    font-size:17px;
    font-weight:bold;
}

.botaonovo:hover{
    border:none;
}

</style>
<body>
<form>
<nav class="navbar navbar-expand-lg navbar-dark navcor">
  <a class="navbar-brand" href="#"><input type="submit" class="botaonovo navcor1" id="button-menu" name="home" onclick="msg" value="Home"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active navcor1" href="#"><input type="submit" class="botaonovo" id="button-menu" name="pedidos" value="Listar Pedidos"> <span class="sr-only">(Página atual)</span></a>
      <a class="nav-item nav-link active navcor1" href="#"><input type="submit" class="botaonovo" id="button-menu" name="usuarios" value="Listar Usuários"></a>
      <a class="nav-item nav-link active navcor1" href="#"><input type="submit" class="botaonovo" id="button-menu" name="produtos" value="Listar Produtos"></a>
      <a class="nav-item nav-link active navcor1" href="sair.php">Sair</a>
    </div>
  </div>
</nav>
</form>


<!--1° MANEIRA-->
<?php
    //USE O $GET['VALUE'] PARA RECUPERAR A URL DE ACORDO COM BOTÃO.
    if(isset($_GET['home'])){ 
        include_once "./painel-admin/home.php"; //A mágica acontece nesta linha, você pode chamar seu form de um arquivo externo.
    }
    elseif(isset($_GET['pedidos'])){
        include_once "./painel-admin/list-pedidos.php";
    }
    elseif(isset($_GET['usuarios'])){
        include_once "./painel-admin/list-users.php";
    }
    elseif(isset($_GET['produtos'])){
        include_once "./painel-admin/list-produtos.php";
    }
    elseif(isset($_GET['sair'])){
			header("Location: sair.php");
    }
    else{
        include_once "./painel-admin/home.php";
    }
?>

</br>
</body>
</html> 