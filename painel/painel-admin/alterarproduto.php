<?php
include_once('conexao.php');
if(isset($_GET['id'])){$id_produto=$_GET['id'];
$result1_postagem = "SELECT * FROM produto where id = $id_produto";
$result2 = "SELECT nome FROM produto where id = $id_produto";
$resultado2 = mysqli_query($conn, $result2);
$resultado1_postagem = mysqli_query($conn, $result1_postagem);}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php while($nome = $resultado2 ->fetch_array()){echo $nome["nome"]; }?></title>

    <!-- Js css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="../../estilo/estilo.css" rel="stylesheet">

	<style type="text/css">
body{
	background-color:white;
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

.body2{
  margin-left:2%;
  margin-right:2%;
	height:500%;
	float:center;	
}

.imagemProduto{
  width: 100%;
  height: 500px;
  margin:0;
  padding:0;
}
.poste{
	padding-right:2%;
	width:42%;
	height:600px;
	background-color:white;
	margin-bottom:2%;
  padding-bottom: 45px;
  padding-top:2%;
  padding-left:2%;
	margin-left:8%;
  float:left;
	border-radius:5px 0 0 5px;
}

.poste2{
	margin-right:1.2%;
	width:33%;
	height:450px;
	background-color:white;
	margin-bottom:2%;
  padding-bottom: 45px;
  padding-top:2%;
  padding-right:2%;
  float:left;
  margin-left:2%;
	border-radius:0 5px 5px 0;
}

.poste3{
	margin-right:4%;
	width:27.5%;
	height:450px;
	background-color:white;
	margin-bottom:2%;
  padding-bottom: 45px;
  padding-top:2%;
  padding-right:2.5%;
	padding-left:2.5%;
  float:right;
	border-radius:5px;
}

a.list{
    font-size:14px;
    font-family:helvetica;
    line-height:0.7;
    color:red;
    line-height: 0.7;
}

.list2{
    font-size:24px;
	font-weight:bold;
    font-family:helvetica;
}

.list3{
    font-size:30px;
	font-weight:bold;
    font-family:helvetica;
}

.botao{
	background-color:#E60014;
	color:white;
	font-weight:bold;
	font-size:18px;
	height:45px;
}

.botao:hover{
	background-color:#BD2130;
}

.linha{
	border-top:1px gray solid;
}

.link{
	color:#666666;
	text-decoration: underline;
}

.link:hover{
	color:#E60014;
}

.input-hidden{
  height:0;
  width:0;
  visibility: hidden;
  padding:0;
  margin:0;
  float:right;
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
  <a class="navbar-brand" href="../painel-admin.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active navcor1" href="../painel-admin.php?pedidos=Listar+Pedidos">Listar Pedidos</a>
      <a class="nav-item nav-link active navcor1" href="../painel-admin.php?usuarios=Listar+Usuários">Listar Usuários</a>
      <a class="nav-item nav-link active navcor1" href="../painel-admin.php?produtos=Listar+Produtos">Listar Produtos</a>
      <a class="nav-item nav-link active navcor1" href="sair.php">Sair</a>
    </div>
  </div>
</nav>
</form> 
<br>
<div class="body2">
<?php while($dado = $resultado1_postagem ->fetch_array()){ 
	$idprod=$dado["id"];?> 

<div class="poste">
<img src="../../imagens/produtos/<?php echo $dado["imagem"];?>" class="imagemProduto">
<br><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
  Alterar Imagem
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">ID Produto:<?php echo $dado["id"]?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center"></h4>
            <form action="atualizar-img-produto.php" class="form-signin" method="post" enctype="multipart/form-data">
            <input class="input-hidden" id="tipo" name="codigo" value="<?php echo $dado["id"];?>">
              <label for="inputImagem">Imagem</label>
              <input type="file" id="inputImagem" name="pic" accept="image/*" class="form-control" autofocus>
<br>
              <div style="text-align:center"> 
              <input type="submit" name="acaoo" class="btn btn-success" value= "Alterar" />
            </div> 
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>

<br><br>	
</div>	
<div class="poste2"><br>
<a class="list2" style="color:#666666"><?php echo $dado["nome"]."<br>";?></a> 
<a class="list" style="color:gray">(Cód. <?php echo $dado["id"];?>)<br></a><br>
<a class="list" style="color:#666666"><?php echo $dado["descricao"]."<br>";?></a><br>
<a class="list2" style="color:#666666">R$<?php echo number_format($dado['preco'], 2, ',', '.');?></a>


<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Alterar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ID Produto:<?php echo $dado["id"]?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Informações do produto</h4>
            <form action="atualizar-produto.php" class="form-signin" method="post" enctype="multipart/form-data">
            <input class="input-hidden" id="tipo" name="codigo" value="<?php echo $dado["id"];?>">
              
              <div class="form-label-group">
              <input type="text" id="inputNome" name="nome" class="form-control" placeholder="Produto" value="<?php echo $dado["nome"]?>" required autofocus>
              <label for="inputNome">Produto</label>
              </div>

              <div class="form-label-group">
              <input type="number" step="any" id="inputPreco" name="preco" class="form-control" placeholder="" value="<?php echo $dado["preco"]?>" required autofocus>
              <label for="inputPreco">Preço</label>
              </div>

              <div class="form-label-group">
              <input type="text" id="inputDescricao" name="descricao" class="form-control" placeholder="" value="<?php echo $dado["descricao"]?>" required autofocus>
              <label for="inputDescricao">Descrição</label>
              </div>

              <div class="form-label-group">
              <input type="Number" id="inputQuantidade" name="quantidade" class="form-control" placeholder="" value="<?php echo $dado["quantidade"]?>" required autofocus>
              <label for="inputQuantidade">Quantidade</label>
              </div>

              <br><h6>Ficha ténica<h6>

              <div class="form-label-group">
              <input type="text" id="inputFicha_tecnica" name="ficha_tecnica" class="form-control" placeholder="" value="<?php echo $dado["ficha_tecnica"]?>" autofocus>
              <label for="inputFicha_tecnica">Ficha técnica</label>
              </div>
<br>
              <div style="text-align:center"> 
              <input type="submit" name="acao" class="btn btn-success" value= "Alterar" />
              
          
            </div> 
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal12<?php echo $dado["id"];?>">
  Excluir Produto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal12<?php echo $dado["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Você deseja mesmo excluir esse produto?
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  <a class="btn bu" href="deletarproduto.php?codigo=<?php echo $dado['id']; ?>">Excluir</a>
      </div>
    </div>
  </div>
</div>




</div>	
<?php	}	?>	 							
</div>

</body>
</html>

