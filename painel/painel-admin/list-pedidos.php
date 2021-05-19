<?php
include_once('conexao.php');
$result2_postagem = "SELECT * FROM pedidos";
$resultado2_postagem = mysqli_query($conn, $result2_postagem);
?>	
<!DOCTYPE html>
<html lang="en">
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

.body2{
    margin-left:2%;
/*	height:500%;*/    /* definir tamanho da tela inteira */
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

.list{
    font-size:17px;
	font-weight:bold;
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
<body>
<!--jquery e poppy -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<br>
<div class="postagem">
<h3>LISTA DE PEDIDOS</h3>
</div><br>

<div class="body2">
<?php while($dado = $resultado2_postagem ->fetch_array()){ 
	$idpedido = $dado['idpedidos'];
    $status = $dado['status'];
    $idproduto = $dado['idproduto'];
    $cpfcliente = $dado['cpf'];
    
    $result1_postagem = "SELECT * FROM produto WHERE id = $idproduto";
    $resultado1_postagem = mysqli_query($conn, $result1_postagem);

while($dado1 = $resultado1_postagem ->fetch_array()){
?> 

<div class="poste" <?php if($status == "Pedido entregue"){ echo "style='border-left: 5px solid #40CD28'";}?>
                   <?php if($status == "Cancelado"){ echo "style='border-left: 5px solid #E60014'";}?>
                   <?php if($status == "Em transporte"){ echo "style='border-left: 5px solid #ffd700'";}?>
                   <?php if($status == "Pedido recebido"){ echo "style='border-left: 5px solid #0000ff'";}?>
                   <?php if($status == "Pagamento aprovado"){ echo "style='border-left: 5px solid #FFA500'";}?>
                   <?php if($status == "Nota Fiscal disponível"){ echo "style='border-left: 5px solid #FF8C00'";}?>>


				   <a class="list" ><?php echo "ID Pedido: " . $dado['idpedidos'];?></a>
				   <?php echo "<div style='float:right;color:gray'>CPF do cliente: " . $dado['cpf']."</div>";?>
				   <br>


                   <div style="border-bottom: 1px solid #CDC9C9">
                   <a class="list" 
                   <?php if($status == "Pedido entregue"){ echo "style='color: #40CD28'";}?>
                   <?php if($status == "Cancelado"){ echo "style='color:#E60014'";}?>
                   <?php if($status == "Em transporte"){ echo "style='color:#ffd700'";}?>
                   <?php if($status == "Pedido recebido"){ echo "style='color:#0000ff'";}?>
                   <?php if($status == "Pagamento aprovado"){ echo "style='color:#FFA500'";}?>
                   <?php if($status == "Nota Fiscal disponível"){ echo "style='color:#FF8C00'";}?>
                   ><?php echo $dado["status"];?></a>
                   <?php if($status == "Pedido entregue"){ echo "<div style='float:right;color:gray'>entregue dia <a class='list' style='color: #40CD28'>". $dado['data']."</div>";}?></a>
                    </div>

<br>
<img src="../imagens/produtos/<?php echo $dado1["imagem"];?> " class="imagemProduto">
<div style="float:left; margin-left:2%;margin-top:1%"><?php echo $dado1["nome"]."<br>";?>
<a class="list"><?php echo $dado['qtd']." unidade - R$". $dado1["preco"]*$dado['qtd']."<br>";?></div>



<?php if($status<>"Pedido entregue"){?>

<!-- Button trigger modal -->
<button type="button" class="btn bu btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $idpedido;?>">
  Atualizar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $idpedido;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar atualização</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       


<form action="painel-admin/atualizar-pedido.php" method="post">
<label for="status-pedido">Status do Pedido:</label>

<select name="statusPedido" id="status-pedido">
  <option value="Pedido recebido">Pedido recebido</option> azul
  <option value="Pagamento aprovado">Pagamento aprovado</option> azul
  <option value="Nota Fiscal disponível">Nota Fiscal disponível</option> azul
  <option value="Em transporte">Em transporte</option> amarelo
  <option value="Pedido entregue">Pedido Entregue</option> verde
  <option value="Cancelado">Cancelado</option> vermelho
  <option value="" selected></option>
</select>

<input class="input-hidden" id="tipo" name="codigo" value="<?php echo $idpedido;?>">





      </div>
      <div class="modal-footer">
	  <button type="button" class="btn bu btn-primary" data-dismiss="modal">Cancelar</button>
	  <input type="submit" name="acao" class="btn bu btn-success"></button>
	  </form> <!-- <a class="btn bu" href="painel-admin/atualizar-pedido.php?codigo=<?php //echo $idpedido;?>">Atualizar</a> -->
      </div>
    </div>
  </div>
</div>

<?php } ?>
</div>		



</a>


<?php	}	}?>	 							

</div>

	
			





    	 							
	
</body>
</html>




