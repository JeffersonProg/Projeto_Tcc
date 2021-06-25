<?php

//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
    $conn = new mysqli("localhost","root","","projeto_tcc");

    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 

    $email = $_POST['Ofemail'];
    $nome = $_POST['Ofname'];

    //cadastrar clientes de forma automatica 
    $sql = $pdo->prepare("INSERT INTO ofertas(email,nomeCompleto) VALUES (?,?)");
    $sql->execute(array($email,$nome));

    if($sql) {
        $_SESSION['sucesso'] = "Usuário cadastrado!";
        //redirecionar
        echo "<script>
        location.href='http://localhost/projeto_tcc/index.php';
    </script>";
    }
    else {
        $_SESSION['erro'] = "Erro cadastrar usuário!";
        //redirecionar
        echo "<script>
        location.href='http://localhost/projeto_tcc/index.php';
    </script>";
    }
}



?>