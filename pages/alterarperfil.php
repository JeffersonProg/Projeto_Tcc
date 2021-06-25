<?php
session_start();
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	  $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
    $conn = new mysqli("localhost","root","","projeto_tcc");

    $cpf = $_SESSION['usuarioCpf'];
    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 
      
      $nome = $_POST['nome'];
      $nascimento = $_POST['nascimento'];
      $cpf = $_SESSION['usuarioCpf'];;
      $cep = $_POST['cep']; 
      $endereco = $_POST['endereco'];
      $numero = $_POST['numero'];
      $complemento = $_POST['complemento'];
      $bairro = $_POST['bairro'];
      $cidade = $_POST['cidade'];
      $estado = $_POST['estado'];


      $ref = $_POST['pont_ref'];

      $sql = $pdo->prepare("UPDATE clientes SET nome=?,nascimento=?,cep=?,endereco=?,numero=?,complemento=?,bairro=?,cidade=?,estado=?,ponto_ref=? WHERE cpf=?");
      $sql->execute(array($nome,$nascimento,$cep,$endereco,$numero,$complemento,$bairro,$cidade,$estado,$ref,$cpf));
      
     
      $senhatual = $_POST['senha'];
      $_SESSION['senha'] = mysqli_real_escape_string($conn, $senhatual);
      $_SESSION['senha'] = md5($_SESSION['senha']);
      $senhatual = $_SESSION['senha'];
      $senhanova = $_POST['confirmarSenha'];
      $result2_postagem = "SELECT * FROM clientes WHERE cpf = $cpf";
      $resultado2_postagem = mysqli_query($conn, $result2_postagem);
      while($dado = $resultado2_postagem ->fetch_array()){$senha = $dado['senha'];}
      if($senha == $senhatual){
      $_SESSION['senha'] = mysqli_real_escape_string($conn, $senhanova);
      $_SESSION['senha'] = md5($_SESSION['senha']);
      $senha = $_SESSION['senha'];

      $sql1 = $pdo->prepare("UPDATE clientes SET senha=? WHERE cpf=?");
      $sql1->execute(array($senha,$cpf));

        if($sql1) {
        $_SESSION['sucesso1'] = "Senha alterada!";
        //redirecionar o usuario para a página de login
        if($sql) {
          $_SESSION['sucesso'] = "Alterações salva!";
          //redirecionar o usuario para a página de login
          }
          else {
          $_SESSION['erro'] = "Erro em alterar as informações!";
          //redirecionar o usuario para a página de login
          }
          header("Location: minhaconta.php");
        }
        }
        else {
        $_SESSION['erro1'] = "Erro em alterar a senha!";
        //redirecionar o usuario para a página de login
        header("Location: minhaconta.php");
        }
      }
      else {
        $_SESSION['erro1'] = "Erro em alterar a senha!";
        //redirecionar o usuario para a página de login
        header("Location: minhaconta.php");
      }


     
      
    
     
  ?>



