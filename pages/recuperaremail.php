<?php
    
    session_start();
    $conn = new mysqli("localhost","root","","projeto_tcc");
    $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../estilo/estilo.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
  .box-erro{
        width: 100%;
        padding: 6px 2%;
        text-align: center;
        color:rgb(228, 56, 56);
        font-size: 15px;        
}
</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(window).on('load',function(){
    $('#myModal').modal('show'); });
</script>

<div id="<?php if(isset($_GET['acao'])){echo "";}else{echo "myModal";}?>" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recuperar Email</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
    <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Informações da conta</h4>
            <form action="recuperaremail.php" class="form-signin" method="get" enctype="multipart/form-data">
              <div class="form-label-group">
              <input type="text" id="recuCpf" name="recuCpf" class="form-control" placeholder="CPF" autofocus>
              <label for="recuCpf">CPF</label>
              </div>

              <div class="form-label-group">
              <input type="date" name="recuData" id="recuData" class="form-control" placeholder="Data de nascimento">    
                <label for="recuData">Data de nascimento</label> 
              </div>
<br>
              <div style="text-align:center"> 
              <input type="submit" class="btn btn-success" name="acao" value= "Continuar" />
              <p class="box-erro">
			<?php if(isset($_SESSION['erro'])){
                echo $_SESSION['erro'];
				unset($_SESSION['erro']);}?>
		</p> 
              
          
            </div> 
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary"><a style="color:white;text-decoration:none;" href="usuario.php">Cancelar</a></button>
      </div>
    </div>
  </div>
</div>


</body>
</html>

<?php

if(isset($_GET['acao'])){ 
  $nascimento = $_GET['recuData'];
  $cpf = $_GET['recuCpf'];
 
  $sql = "SELECT * FROM clientes WHERE cpf = '$cpf' && nascimento = '$nascimento' LIMIT 1";
  $result = $pdo->query($sql);
  $rows = $result->fetchAll();



  if($rows){?>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recuperar email</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Seu email é: <?php foreach ($rows as &$value) {
            echo $value['email'];
        }  ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"><a style="color:white;text-decoration:none;" href="usuario.php">Acessar conta</a></button>
      </div>
    </div>
  </div>
</div>

<?php
}
else{
  $_SESSION['erro'] = "Usuário não encontrado!";
  header("Location: recuperaremail.php");
}
}
?>