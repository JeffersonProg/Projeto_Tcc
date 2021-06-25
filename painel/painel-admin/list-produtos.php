<?php
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
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
  background-color: #F5F5F5;
}

.postagem{
	margin-left:22.5%;
	width:55%;
	height:50px;
	background-color:;
	border-bottom: 1px solid #CDC9C9;
	border-top: 1px solid #CDC9C9;
	color:#696969;
  text-align:center;
}

.bu{

	float:right;
	margin-top:4%;
	height:35px;
}

.imagemProduto{
    width: 10%;
    height: 60px;
    margin:0;
    padding:0;
    float:left
}
.poste{
	margin-right:21%;
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

.addprod{
	margin-bottom:2%;
	margin-left:5%;
}
</style>
<body>
<!--jquery e poppy -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<br>
<div class="postagem">
<h3>LISTA DE PRODUTOS</h3>
</div><br> 
<div class="addprod">
<a class="btn btn-primary" href="painel-admin/cadastroproduto.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>Adicionar produto</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>Adicionar cupom
</button>
<!-- Button trigger modal -->
<a type="button" class="btn btn-primary" style="color:white" href="painel-admin/deletar-cupom.php">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
  <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
</svg> Excluir cupom
</a>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cupom de desconto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <center><h5>Cupons já existentes</h5></center>
	 <?php while($dados = $resultado2_postagem->fetch_array()){ $codpromocao = $dados['codpromo'];echo "Código: ".$dados['codpromo']." | Valor de desconto: R$".number_format($dados['valordesconto'], 2, ',', '.')."<br>";}?> 
  

   <br><br> <center><h5>Adicionar cupom</h5></center>
   <form action="painel-admin/cadastrocupom.php" method="post">
   <label for="cood">Código da promoção:</label>
   <input id="cood" type="text" name="codPromo">
   <label for="valoor">Valor de desconto:</label>
   <input id="valoor" type="number" step="any" name="valorDesc"><br>
   <button type="submit" name="acao" class="btn btn-success" style="float:right">Adicionar</button>
</form>
<br>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div> <!-- fim modal -->
  
</div>
<div class="body2">
<?php while($dado = $resultado1_postagem ->fetch_array()){ ?> 

<form method="post" id="produto_form">
<a href="painel-admin/alterarproduto.php?id=<?php echo $dado['id']; ?>" onClick="document.getElementById('produto_form').submit();">

<div class="poste">
<img src="../imagens/produtos/<?php echo $dado["imagem"];?> " class="imagemProduto"><br><br>
<a class="list">ID Produto:<?php echo $dado["id"]."<br>";?></a>
<a class="list"></a><?php echo $dado["nome"]."<br>";?>
<a class="list">R$<?php echo number_format($dado['preco'], 2, ',', '.')?><br></a>
</div>		

</a>
</form>

<?php	}	?>	 							
</div>
	
			





    	 							
	
</body>
</html>