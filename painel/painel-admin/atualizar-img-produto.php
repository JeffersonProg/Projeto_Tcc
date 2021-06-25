<?php
session_start();
//confg banco de dados
date_default_timezone_set ('America/Sao_Paulo');
$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');
if(isset($_FILES['pic']))
{
    $idprod = $_POST['codigo'];
   $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
   $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   $dir = '../../imagens/produtos/'; //Diretório para uploads

   move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo  
   
   $sql = $pdo->prepare("UPDATE produto SET imagem=? WHERE id=?");
        $sql->execute(array($new_name,$idprod)); 
        


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