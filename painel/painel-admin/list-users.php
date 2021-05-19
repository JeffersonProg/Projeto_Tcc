<?php
include_once('conexao.php');
$result_consulta = "SELECT * FROM clientes";
$resultado = mysqli_query($conn, $result_consulta);
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
  background-color: #F5F5F5;
}

.poste{
	margin-left:26%;
	width:48%;
	height:350px;
	background-color:white;
	border-radius: 10px;
	border: 1px solid #CDC9C9;
	margin-bottom:10px;
    text-align:left;
}

.post2{
	width:100%;
	height:50px;
	background-color:#17a2b8;
	border-radius: 10px 10px 0 0;
	text-align:center;
	font-weight: bolder;
	border-bottom: 1px solid #CDC9C9;
	color:white;
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

.list{
    font-size:17px;
    margin-left:10%;
    margin-top:2%;
	font-weight:bold;
}

.bu{
	color:white;
	float:right;
	background-color: #F00;
	margin-right:10%;
	height:35px;
}

.bu1{
	color:white;
	float:right;
	background-color:#008000;
	margin-right:6px;
	height:35px;
}

.bu1:hover{
	color:white;
	opacity:0.5;
}

.bu:hover{
	color:white;
	opacity:0.5;
}
</style>
<body>

<br>
<div class="postagem">
<h3>LISTA DE USUÁRIOS</h3>
</div>
<br>
    <?php while($dado = $resultado ->fetch_array()){ ?>
<div class="poste">
	<div class="post2">
	  	<?php echo "CPF: ".$dado["cpf"]."<br>";?>
		<?php echo "Nome: ".$dado["nome"];?>	
	</div>
<br>
<a class="list">Email: </a><?php echo $dado["email"];?><br>
<a class="list">Nascimento: </a><?php echo $dado["nascimento"];?><br>
<a class="list">Cep: </a><?php echo $dado["cep"];?><br>
<a class="list">Endereço: </a><?php echo $dado["endereco"].", ".$dado["numero"];?><br>
<a class="list">Completo: </a><?php echo $dado["complemento"];?><br>
<a class="list">Bairro: </a><?php echo $dado["bairro"];?><br>
<a class="list">Cidade: </a><?php echo $dado["cidade"];?><br>
<a class="list">Estado: </a><?php echo $dado["estado"];?><br>
<?php if($dado["ponto_ref"] <> ""){ ?><a class="list">Ponto de referência: </a><?php echo $dado["ponto_ref"];}?><br>
					
		<!-- Button trigger modal -->
<button type="button" class="btn bu" data-toggle="modal" data-target="#exampleModal<?php echo $dado["cpf"];?>">
  Excluir
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $dado["cpf"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Você deseja mesmo excluir esse usuário?
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  <a class="btn bu" href="painel-admin/deletaruser.php?codigo=<?php echo $dado['cpf']; ?>">Excluir</a>
      </div>
    </div>
  </div>
</div>	
			
			<!-- Button trigger modal -->
<button type="button" class="btn bu1" data-toggle="modal" data-target="#exampleModal1<?php echo $dado["cpf"];?>">
  Tornar ADM
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1<?php echo $dado["cpf"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Corfimar ADM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Você deseja mesmo tornar esse usuário um administrador?
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  <a class="btn bu1" href="painel-admin/add-admin.php?codigo=<?php echo $dado['cpf']; ?>">Tornar ADM</a>
      </div>
    </div>
  </div>
</div>	
		

</div>
</div>			 
						
<?php	}	?>	
							
								
								
	
</body>
</html>
		
						
							
						
							
										






