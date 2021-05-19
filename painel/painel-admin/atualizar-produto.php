<?php
session_start();
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 

        $idprod = $_POST['codigo'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $ficha_tecnica = $_POST['ficha_tecnica'];
        $quantidade = $_POST['quantidade'];
    
        $situacao = 0;
        
        if($quantidade > 0 ){
            $situacao = "Disponível";
        }
        else{
            $situacao = "Indisponível";
        }
    
      
        $criado = date('Y-m-d H:i:s');
        
        $sql = $pdo->prepare("UPDATE produto SET nome=?,preco=?,descricao=?,ficha_tecnica=?,quantidade=?,situacao=? WHERE id=?");
        $sql->execute(array($nome,$preco,$descricao,$ficha_tecnica,$quantidade,$situacao,$idprod)); 
        


        if($sql) {
            $_SESSION['cadastrosucess'] = "Produto alterado com sucesso!";
			header("Location: alterarproduto.php?id=$idprod");
        }
        else {
            $_SESSION['cadastroerro'] = "Erro ao alterar o produto!";
			header("Location: alterarproduto.php?id=$idprod");
        }
      }
      
    
     
  ?>