<?php 

	session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
	require_once "../../projeto_tcc/carrinho/functions/product.php";
	require_once "../../projeto_tcc/carrinho/functions/cart.php";

    $pdoConnection = require_once "../../projeto_tcc/carrinho/connection.php";

	$resultsCarts = getContentCart($pdoConnection);
	$totalCarts  = getTotalCart($pdoConnection);

$status = "Pedido recebido";
$data = date('Y-m-d H:i:s');
$totalpedidos = 0;
    foreach($resultsCarts as $result) :
        $totalpedidos = $totalpedidos + 1;
    endforeach;
$desconto = $_GET['desc']/$totalpedidos;
    foreach($resultsCarts as $result) :
        $sql = $pdo->prepare("INSERT INTO pedidos(cpf,idproduto,data,qtd,status,desconto) VALUES (?,?,?,?,?,?)");
        $sql->execute(array($_SESSION['usuarioCpf'],$result['id'],$data,$result['quantity'],$status,$desconto));
    endforeach;
    header("Location: pedidos.php");
    ?>