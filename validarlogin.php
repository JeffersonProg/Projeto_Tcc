<?php
 session_start();
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
    $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
	$conn = new mysqli("localhost","root","","projeto_tcc");

    $email = $_POST['email'];

    $_SESSION['senha'] = mysqli_real_escape_string($conn, $_POST['senha']);
	$_SESSION['senha'] = md5($_SESSION['senha']);
    $senha = $_SESSION['senha'];

    $sql = "SELECT * FROM clientes WHERE email = '$email' && senha = '$senha' LIMIT 1";
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();



    if($rows){
        $sql = "SELECT * FROM clientes WHERE email = '$email' && senha = '$senha' LIMIT 1";
        $result = $pdo->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        
         foreach ($rows as &$value) {
            $_SESSION['usuarioNome'] = $value['nome'];
            $_SESSION['usuarioCpf'] = $value['cpf'];
            $_SESSION['nivel'] = $value['nivel'];
         }
        
         header("Location: index.php");
    }
    else{
        $_SESSION['loginErro'] = "Usuário ou Senha inválida";
			header("Location: pages/usuario.php");
    }


 

 
?>