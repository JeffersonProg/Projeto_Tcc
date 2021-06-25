<?php
//confg banco de dados
date_default_timezone_set ('America/Sao_Paulo');
$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');

$cod = $_POST['codigo'];
$sql = $pdo->prepare("DELETE FROM promocao WHERE codpromo=?");
$sql->execute(array($cod));

if($sql)
    echo "<script>
        location.href='http://localhost/projeto_tcc/painel/painel-admin.php?produtos=Listar+Produtos';
    </script>";
else 
    echo "
<script> 
    alert ('Não foi possível deletar o usuário');  
    location.href='http://localhost/projeto_tcc/painel/painel-admin.php?produtos=Listar+Produtos';
    </script>";
?>