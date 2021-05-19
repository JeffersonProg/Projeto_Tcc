<?php

if(isset($_POST['acao'])){ 

$email = $_POST['emailc'];

}
?>
<html>
    <head>
    <title>cadastra-se</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="estilo/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    
    <!-- Adicionando Javascript -->
    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");

    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
        
                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

    </head>

    <body>


	<!--jquery e poppy -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<header>

	<nav class="navbarespaco navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img class="logo" src="imagens/ZezinhoLOGO.svg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

 	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
	  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
	  </button>
    </form>

    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="pages/vitrine.php">Produtos</a>
     <!-- <a realtime ="" class="nav-item nav-link" href=""></a> -->


      <a class="nav-item nav-link" href="pages/contato.php">Contato</a>

<?php if(isset($_SESSION['usuarioNome'])){?>
	<a class="nav-item nav-link" href="carrinho/carrinho.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
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
    <a class="dropdown-item" href="pages/minhaconta.php">Minha conta</a>
    <a class="dropdown-item" href="pages/pedidos.php">Meus pedidos</a>
    <a class="dropdown-item" href="sair.php">Sair</a>
  </div>
</div>



<?php } else{?>

	<a class="nav-item nav-link" href="pages/usuario.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg></a>
<?php }?>
    </div>
  </div>
</nav>
	</header>
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4 class="card-title text-center">Quero criar uma conta</h4>
            <form action="validarcadastro.php" class="form-signin" method="post">
            
                <div class="form-label-group">
                <h6>Dados pessoais<h6>
                </div>
            
                <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" Placeholder="E-mail" value="<?php echo $email; ?>" required autofocus>
                <label for="inputEmail">Email</label>
                </div>

                <div class="form-label-group">
                <input type="text" name="nome" id="inputNomeCompleto" class="form-control" placeholder="Nome completo" required>        
                <label for="inputNomeCompleto">Nome</label>
                </div>
                
                <div class="form-label-group">
                <input type="text" name="cpf" id="inputCPF" class="form-control" placeholder="CPF" required>    
                <label for="inputCPF">CPF</label> 
                </div>
                
                <div class="form-label-group">
                <input type="date" name="nascimento" id="inputData" class="form-control" placeholder="Data de nascimento" required>    
                <label for="inputData">Data de nascimento</label> 
                </div>

                <div class="form-label-group">
                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Senha (minímo 6 caracteres)" required>
                <label for="inputSenha">Senha</label>
                </div>            
              <br>
              <h6>Endereço de cobrança<h6>


              <!-- Inicio do formulario -->
            <div class="form-label-group">
            <input type="text" name="cep" id="inputCep" class="form-control" placeholder="cep" required  onblur="pesquisacep(this.value);" /> 
            <label for="inputCep">CEP</label>
            </div>
              
            <div class="form-label-group">
            <input type="text" name="endereco" id="inputRua" class="form-control" placeholder="Endereço"  /> 
            <label for="inputRua">Rua</label>
            </div>

            <div class="form-label-group">
            <input type="number" name="numero" id="inputNumero" class="form-control" placeholder="Numero:"  /> 
            <label for="inputNumero">Número</label>
            </div>

            <div class="form-label-group">
            <input type="text" name="complemento" id="inputComplemento" class="form-control" placeholder="Complemento:"  /> 
            <label for="inputComplemento">Complemento</label>
            </div>
              
            <div class="form-label-group">
            <input type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro"  /> 
            <label for="inputBairro">Bairro</label>
            </div>  
            
            <div class="form-label-group">
            <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Cidade"  /> 
            <label for="inputCidade">Cidade</label>
            </div>  
            
            <div class="form-label-group">
            <input type="text" name="estado" id="inputEstado" class="form-control" placeholder="Estado"  /> 
            <label for="inputEstado">Estado</label>
            </div>   

            <div class="form-label-group">
            <input type="text" name="pont_ref" id="inputReferencia" class="form-control" placeholder="Ponto de Refêrencia:"  /> 
            <label for="inputReferencia">Ponto de Referência</label>
            </div>
               
          </form>    

          <br>
                <div style="text-align:center"> 
                <input type="submit" name="acao" value= "Cadastrar" class="btn btn-success"/>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

    </body>

    </html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 