<?php
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	  $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
   
    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 
     $idpedidos = $_POST['codigo'];
     $status = $_POST['statusPedido'];

      $sql = $pdo->prepare("UPDATE pedidos SET status=? WHERE idpedidos=?");
      $sql->execute(array($status,$idpedidos));

        if($sql) {
            echo "<script>
            location.href='http://localhost/projeto_tcc/painel/painel-admin.php?pedidos=Listar+Pedidos';
        </script>";
        }
        else {
            echo "
            <script> 
                alert ('Não foi possível alterar o pedido!');  
                location.href='http://localhost/projeto_tcc/painel/painel-admin.php?pedidos=Listar+Pedidos';
                </script>";
        }
      
      
    
    }
  ?>