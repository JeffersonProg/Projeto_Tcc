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

$cpfcliente= $_SESSION['usuarioCpf'];
$result_postagem = "SELECT * FROM clientes WHERE cpf = $cpfcliente";
$resultado_postagem = mysqli_query($conn, $result_postagem);
     
?>	
<!DOCTYPE html>
<html>
<head>
<title>Minha conta - Zezinho do Carvão</title>
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
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

input{
    margin-bottom:8px;
}
</style>
<script>
  function isValidCPF(cpf) {
            if (typeof cpf !== "string") return false
            cpf = cpf.replace(/[\s.-]*/igm, '')
            if (
                !cpf ||
                cpf.length != 11 ||
                cpf == "00000000000" ||
                cpf == "11111111111" ||
                cpf == "22222222222" ||
                cpf == "33333333333" ||
                cpf == "44444444444" ||
                cpf == "55555555555" ||
                cpf == "66666666666" ||
                cpf == "77777777777" ||
                cpf == "88888888888" ||
                cpf == "99999999999" 
            ) {
                return false
            }
            var soma = 0
            var resto
            for (var i = 1; i <= 9; i++) 
                soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i)
            resto = (soma * 10) % 11
            if ((resto == 10) || (resto == 11))  resto = 0
            if (resto != parseInt(cpf.substring(9, 10)) ) return false
            soma = 0
            for (var i = 1; i <= 10; i++) 
                soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i)
            resto = (soma * 10) % 11
            if ((resto == 10) || (resto == 11))  resto = 0
            if (resto != parseInt(cpf.substring(10, 11) ) ) return false
            return true
        }

      </script>
</script>
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



<?php while($dado = $resultado_postagem->fetch_array()){
                    $emailC=$dado["email"];
                    $nomeC=$dado["nome"];
                    $cpfcliente=$dado["cpf"];
                    $nascimentoC=$dado["nascimento"];
                    $cep=$dado["cep"];
                    $endereco=$dado["endereco"];
                    $complemento=$dado["complemento"];
                    $bairro=$dado["bairro"];
                    $cidade=$dado["cidade"];
                    $estado=$dado["estado"];
                    $pontoRef=$dado["ponto_ref"];
                    $numero=$dado["numero"];

                    }?>

<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Minha Conta</h4>
            <form action="alterarperfil.php" class="form-signin" method="post">
            
                <div class="form-label-group">
                <h6>Dados pessoais<h6>
                </div>
            
                <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" Placeholder="E-mail" value="<?php echo $emailC;?>" required>
                <label for="inputEmail">Email</label>
                </div>

                <div class="form-label-group">
                <input type="text" name="nome" id="inputNomeCompleto" class="form-control" placeholder="Nome completo" value="<?php echo $nomeC;?>" required>        
                <label for="inputNomeCompleto">Nome</label>
                </div>
                
                <div class="form-label-group">
                <input disabled="disabled" type="text" name="cpf" id="inputCPF" class="form-control" placeholder="CPF" value="<?php echo $cpfcliente;?>" required>    
                <label for="inputCPF">CPF</label>
                </div>

                
                <div class="form-label-group">
                <input type="date" name="nascimento" id="inputData" class="form-control" placeholder="Data de nascimento" maxlength="11" value="<?php echo $nascimentoC;?>" required>    
                <label for="inputData">Data de nascimento</label>
                </div>

                <div class="form-label-group">
                <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha (minímo 6 caracteres)" minlength="6">
                <label for="inputPassword">Senha atual</label>
                </div>    

                <div class="form-label-group">
                <input type="password" name="confirmarSenha" id="inputPassword1" class="form-control" placeholder="Senha (minímo 6 caracteres)">
                <label for="inputPassword1">Senha nova</label>
                </div>    


              <br>
              <h6>Endereço de cobrança<h6>

            <div class="form-label-group">
            <input type="text" name="cep" id="inputCep" class="form-control" placeholder="cep" value="<?php echo $cep;?>" required onblur="pesquisacep(this.value);" /> 
            <label for="inputCep">CEP</label>
            </div>
              
            <div class="form-label-group">
            <input type="text" name="endereco" id="inputRua" class="form-control" placeholder="Endereço" value="<?php echo $endereco;?>" /> 
            <label for="inputRua">Rua</label>
            </div>

            <div class="form-label-group">
            <input type="number" name="numero" id="inputNumero" class="form-control" placeholder="Numero:" value="<?php echo $numero;?>" /> 
            <label for="inputNumero">Número</label>
            </div>

            <div class="form-label-group">
            <input type="text" name="complemento" id="inputComplemento" class="form-control" placeholder="Complemento:" value="<?php echo $complemento;?>" /> 
            <label for="inputComplemento">Complemento</label>
            </div>
              
            <div class="form-label-group">
            <input type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro" value="<?php echo $bairro;?>" /> 
            <label for="inputBairro">Bairro</label>
            </div>  
            

            <div class="form-label-group">
            <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Cidade" value="<?php echo $cidade;?>"  /> 
            <label for="inputCidade">Cidade</label>
            </div>  
            
            <div class="form-label-group">
            <input type="text" name="estado" id="inputEstado" class="form-control" placeholder="Estado" value="<?php echo $estado;?>" /> 
            <label for="inputEstado">Estado</label>
            </div>   

            <div class="form-label-group">
            <input type="text" name="pont_ref" id="inputReferencia" class="form-control" placeholder="Ponto de Refêrencia:" value="<?php echo $pontoRef;?>" /> 
            <label for="inputReferencia">Ponto de Referência</label>
            </div>
               
          </form>    
          <p class="text-center text-danger">
			<?php if(isset($_SESSION['erro'])){
                echo $_SESSION['erro'];
				        unset($_SESSION['erro']);}?>
		</p> 
		<p class="text-center text-success">
			<?php if(isset($_SESSION['sucesso'])){
				echo $_SESSION['sucesso'];
				unset($_SESSION['sucesso']);}?>
    </p>

    <p class="text-center text-danger">
			<?php if(isset($_SESSION['erro1'])){
                echo $_SESSION['erro1'];
				        unset($_SESSION['erro1']);}?>
		</p> 
		<p class="text-center text-success">
			<?php if(isset($_SESSION['sucesso1'])){
				echo $_SESSION['sucesso1'];
				unset($_SESSION['sucesso1']);}?>
    </p>
          <br>
                <div style="text-align:center"> 
                <input type="submit" name="acao" value= "Salvar alterações" class="btn btn-success"/>
            </div>
          </div>
        </div>
      </div>

    </div>
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


