<?php
//confg banco de dados
date_default_timezone_set ('America/Sao_Paulo');
$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');

$cpf = intval($_GET['codigo']);
$sql = $pdo->prepare("UPDATE clientes SET nivel=? WHERE cpf=?");
$sql->execute(array(2,$cpf));

if($sql)
    echo "<script>
        location.href='http://localhost/projeto_tcc/painel/painel-admin.php?usuarios=Listar+Usuarios';
    </script>";
else 
    echo "
<script> 
    alert ('Não foi possível tornar esse usuario administrador');  
    location.href='http://localhost/projeto_tcc/painel/painel-admin.php?usuarios=Listar+Usuarios';
    </script>";
?>


