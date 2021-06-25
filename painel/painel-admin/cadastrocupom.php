<?php
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	  $pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
   
    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 
     $codPromo = $_POST['codPromo'];
     $valorDesc = $_POST['valorDesc'];
    
        $sql = $pdo->prepare("INSERT INTO promocao(codpromo,valordesconto) VALUE (?,?)");
        $sql->execute(array($codPromo,$valorDesc));

        if($sql) {
            echo "<script>
            location.href='http://localhost/projeto_tcc/painel/painel-admin.php?produtos=Listar+Produtos';
        </script>";
        }
        else {
            echo "
            <script> 
                alert ('Não foi possível alterar o pedido!');  
                location.href='http://localhost/projeto_tcc/painel/painel-admin.php?produtos=Listar+Produtos';
                </script>";
        }


        
       
      
    
    }
  ?>