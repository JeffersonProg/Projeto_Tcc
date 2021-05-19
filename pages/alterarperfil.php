<?php
session_start();
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	  $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
    $cpf = $_SESSION['usuarioCpf'];
    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 
      
      $nome = $_POST['nome'];
      $nascimento = $_POST['nascimento'];
      $cpf = $_POST['cpf'];
      $cep = $_POST['cep']; 
      $endereco = $_POST['endereco'];
      $numero = $_POST['numero'];
      $complemento = $_POST['complemento'];
      $bairro = $_POST['bairro'];
      $cidade = $_POST['cidade'];
      $estado = $_POST['estado'];

      $_SESSION['senha'] = mysqli_real_escape_string($conn, $_POST['senha']);
      $_SESSION['senha'] = md5($_SESSION['senha']);

      $ref = $_POST['pont_ref'];

      $sql = $pdo->prepare("UPDATE clientes SET nome=?,nascimento=?,cep=?,endereco=?,numero=?,complemento=?,bairro=?,cidade=?,estado=?,ponto_ref=? WHERE cpf=?");
      $sql->execute(array($nome,$nascimento,$cep,$endereco,$numero,$complemento,$bairro,$cidade,$estado,$ref,$cpf));

        if($sql) {
        $_SESSION['sucesso'] = "Alterações salva";
        //redirecionar o usuario para a página de login
        header("Location: minhaconta.php");
        $_SESSION['usuarioCpf'] = $cpf;
        }
        else {
        $_SESSION['erro'] = "Erro em alterar as informações!";
        //redirecionar o usuario para a página de login
        header("Location: minhaconta.php");
        }
      }
      
    
     
  ?>



