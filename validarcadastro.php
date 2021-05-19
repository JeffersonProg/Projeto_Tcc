<?php

//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
    $conn = new mysqli("localhost","root","","projeto_tcc");

    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 

    $email = $_POST['email'];
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
    

    


    //cadastrar clientes de forma automatica 
    $sql = $pdo->prepare("INSERT INTO clientes(email,nome,nascimento,cpf,cep,endereco,numero,complemento,bairro,cidade,estado,ponto_ref,senha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $sql->execute(array($email,$nome,$nascimento,$cpf,$cep,$endereco,$numero,$complemento,$bairro,$cidade,$estado,$ref,$_SESSION['senha']));
    echo 'Cadastro efetuado com sucesso!';
}



?>