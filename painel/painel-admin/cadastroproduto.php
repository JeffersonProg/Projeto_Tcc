<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8"/>
<title>cadastro de Produto</title>

<!-- Js css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="../../estilo/style.css" rel="stylesheet">
<style type="text/css">
body {
  margin: 0 auto;
  padding: 0;
}

.navcor{
    background-color:#17a2b8;
    color:white;
    font-size:17px;
    font-weight:bold;
}

.navcor1{
    background-color:#17a2b8;
    color:white;
    font-size:17px;
    font-weight:bold;
    cursor: pointer;
}

.navcor1:hover{
    opacity:0.5;
}

.botaonovo{
    background-color:#17a2b8;
    color:white;
    border:none;
    color:white;
    font-size:17px;
    font-weight:bold;
    cursor: pointer;
}

.botaonovo:hover{
    border:none;
}

</style>
</head>

<body>

	<!--jquery e poppy -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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

<?php
    //USE O $GET['VALUE'] PARA RECUPERAR A URL DE ACORDO COM BOTÃO.
    if(isset($_GET['home'])){ 
      echo "<script>
        location.href='http://localhost/projeto_tcc/painel/painel-admin.php?home=Home';
    </script>"; 
    }
    elseif(isset($_GET['pedidos'])){
      echo "<script>
        location.href='http://localhost/projeto_tcc/painel/painel-admin.php?pedidos=Listar+Pedidos';
    </script>";  
    }
    elseif(isset($_GET['usuarios'])){
      echo "<script>
      location.href='http://localhost/projeto_tcc/painel/painel-admin.php?usuarios=Listar+Usuários';
    </script>"; 
    }
    elseif(isset($_GET['produtos'])){
      echo "<script>
        location.href='http://localhost/projeto_tcc/painel/painel-admin.php?produtos=Listar+Produtos';
    </script>";
    }
    elseif(isset($_GET['sair'])){
			header("Location: sair.php");
    }
?>

<div class="container"> 
    <div class="row">


      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Cadastrar Produto</h4>
            <form action="validarproduto.php" class="form-signin" method="post" enctype="multipart/form-data">

              <label for="inputImagem">Imagem</label>
              <input type="file" id="inputImagem" name="pic" accept="image/*" class="form-control" autofocus>
<br>
              <div class="form-label-group">
              <input type="text" id="inputNome" name="nome" class="form-control" placeholder="Produto" required autofocus>
              <label for="inputNome">Produto</label>
              </div>

              <div class="form-label-group">
              <input type="number" id="inputPreco" name="preco" class="form-control" placeholder="Email" required autofocus>
              <label for="inputPreco">Preço</label>
              </div>

              <div class="form-label-group">
              <input type="text" id="inputDescricao" name="descricao" class="form-control" placeholder="Email" required autofocus>
              <label for="inputDescricao">Descrição</label>
              </div>

              <div class="form-label-group">
              <input type="Number" id="inputQuantidade" name="quantidade" class="form-control" placeholder="Email" required autofocus>
              <label for="inputQuantidade">Quantidade</label>
              </div>

              <br><h6>Ficha ténica<h6>

              <div class="form-label-group">
              <input type="text" id="inputFicha_tecnica" name="ficha_tecnica" class="form-control" placeholder="Email" autofocus>
              <label for="inputFicha_tecnica">Ficha técnica</label>
              </div>
              <br>
           
              <p class="text-danger">
			<?php if(isset($_SESSION['cadastroerro'])){
                echo $_SESSION['cadastroerro'];
				        unset($_SESSION['cadastroerro']);}?>
		</p> 
              <p class="box-sucess">
			<?php if(isset($_SESSION['cadastrosucess'])){
				echo $_SESSION['cadastrosucess'];
				unset($_SESSION['cadastrosucess']);}?>
    </p>
<br>
              <div style="text-align:center"> 
              <input type="submit" name="acao" class="btn btn-success" value= "Continuar" />
              
          
            </div> 
            </form>
          </div>
        </div>
      </div>
      </div>
      </div>

      

</body>
</html>