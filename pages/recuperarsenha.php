<?php
    
    session_start();
    $conn = new mysqli("localhost","root","","projeto_tcc");
    $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../estilo/style.css" rel="stylesheet">

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

<div id="<?php if(isset($_GET['acao']) || isset($_GET['acao1'])){echo "";}else{echo "myModal";}?>" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recuperar Senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
    <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Informações da conta</h4>
            <form action="recuperarsenha.php" class="form-signin" method="get" enctype="multipart/form-data">
              <div class="form-label-group">
              <input type="email" id="recuEmail" name="recuEmail" class="form-control" placeholder="CPF" autofocus>
              <label for="recuEmail">Email</label>
              </div>

              <div class="form-label-group">
              <input type="text" id="recuCpf" name="recuCpf" class="form-control" placeholder="CPF" autofocus>
              <label for="recuCpf">CPF</label>
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
  $email = $_GET['recuEmail'];
  $cpf = $_GET['recuCpf'];
 
  $sql = "SELECT * FROM clientes WHERE cpf = '$cpf' && email = '$email' LIMIT 1";
  $result = $pdo->query($sql);
  $rows = $result->fetchAll();



  if($rows){?>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recuperar senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Informações da conta</h4>
            <form action="recuperarsenha.php" class="form-signin" method="get" enctype="multipart/form-data">
            <input type="hidden" name="cpf" value="<?php echo $cpf;?>" >
            <div class="form-label-group">
              <input type="password" id="novaSenha" name="novaSenha" class="form-control" placeholder="CPF" autofocus>
              <label for="novaSenha">Nova senha</label>
              </div>

              <div class="form-label-group">
              <input type="password" id="confSenha" name="confSenha" class="form-control" placeholder="CPF" autofocus>
              <label for="confSenha">Confirmar senha</label>
              </div>
<br>
              <div style="text-align:center"> 
              <input type="submit" class="btn btn-success" name="acao1" value= "Continuar" />
              <p class="box-erro">
			<?php if(isset($_SESSION['erroSenha'])){
                echo $_SESSION['erroSenha'];
				unset($_SESSION['erroSenha']);}?>
		</p> 
              
          
            </div> 
            </form>
          </div>
        </div>
      </div>
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
  header("Location: recuperarsenha.php");
}
}
?>


<?php


if(isset($_GET['acao1'])){ 
    $novaSenha = $_GET['novaSenha'];
    $confSenha = $_GET['confSenha'];
    $cpf = $_GET['cpf'];
    if($novaSenha == $confSenha){

    $_SESSION['senha'] = mysqli_real_escape_string($conn, $novaSenha);
    $_SESSION['senha'] = md5($_SESSION['senha']);
    $senha = $_SESSION['senha'];
  
  $sql = $pdo->prepare("UPDATE clientes SET senha=? WHERE cpf=?");
  $sql->execute(array($senha,$cpf)); ?>

  <div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recuperar senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Senha alterada com sucesso!!
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
    $_SESSION['erroSenha'] = "As senhas não coincidem!";
    ?>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recuperar senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Informações da conta</h4>
            <form action="recuperarsenha.php" class="form-signin" method="get" enctype="multipart/form-data">
            <input type="hidden" name="cpf" value="<?php echo $cpf;?>" >
            <div class="form-label-group">
              <input type="password" id="novaSenha" name="novaSenha" class="form-control" placeholder="CPF" autofocus>
              <label for="novaSenha">Nova senha</label>
              </div>

              <div class="form-label-group">
              <input type="password" id="confSenha" name="confSenha" class="form-control" placeholder="CPF" autofocus>
              <label for="confSenha">Confirmar senha</label>
              </div>
<br>
              <div style="text-align:center"> 
              <input type="submit" class="btn btn-success" name="acao1" value= "Continuar" />
              <p class="box-erro">
			<?php if(isset($_SESSION['erroSenha'])){
                echo $_SESSION['erroSenha'];
				unset($_SESSION['erroSenha']);}?>
		</p> 
              
          
            </div> 
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"><a style="color:white;text-decoration:none;" href="usuario.php">Acessar conta</a></button>
      </div>
    </div>
  </div>
</div>
<?php
  }
}  
?>