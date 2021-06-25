<?php
session_start();
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
    $nivel = 1;

   echo $_POST['cepp']."<br>";
   echo $_POST['ruaa']."<br>";
   echo $_POST['bairoo']."<br>";
   echo $_POST['cidadee']."<br>";
   echo $_POST['uff']."<br>";
   echo $_POST['ibgee']."<br>";
}



?>