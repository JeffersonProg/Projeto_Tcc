<?php
//confg banco de dados
date_default_timezone_set ('America/Sao_Paulo');
$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');

$id = intval($_GET['codigo']);
$sql = $pdo->prepare("DELETE FROM produto WHERE id=?");
$sql->execute(array($id));

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



