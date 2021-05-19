<?php
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');

    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    //cadastrar clientes de forma automatica 
    $sql = $pdo->prepare("INSERT INTO mensagens(nome,email,telefone,mensagem) VALUES (?,?,?,?)");

    $sql->execute(array($nome,$email,$telefone,$mensagem));
    echo 'Cadastro efetuado com sucesso!';
}



?>