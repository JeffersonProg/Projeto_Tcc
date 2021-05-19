<?php
session_start();
if(isset($_FILES['pic']))
{
   $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
   $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   $dir = '../../imagens/produtos/'; //Diretório para uploads

   move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo  
} 
//confg banco de dados
    date_default_timezone_set ('America/Sao_Paulo');
	$pdo = new PDO('mysql:host=localhost;dbname=projeto_tcc','root','');

    //verifica se a variavel está definida
    if(isset($_POST['acao'])){ 

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $ficha_tecnica = $_POST['ficha_tecnica'];
    $quantidade = $_POST['quantidade'];
    $imagem = $new_name;

    $situacao = 0;
    
    if($quantidade > 0 ){
        $situacao = "Disponível";
    }
    else{
        $situacao = "Indisponível";
    }

  
    $criado = date('Y-m-d H:i:s');


    //cadastrar clientes de forma automatica 
    $sql = $pdo->prepare("INSERT INTO produto(nome,preco,descricao,ficha_tecnica,quantidade,situacao,criado,imagem) VALUES (?,?,?,?,?,?,?,?)");

    $sql->execute(array($nome,$preco,$descricao,$ficha_tecnica,$quantidade,$situacao,$criado,$imagem));

    if($sql){
        $_SESSION['cadastrosucess'] = "Cadastro efetuado com sucesso!";
			header("Location: cadastroproduto.php");
    }
    else{
        $_SESSION['cadastroerro'] = "Erro ao cadastrar o produto!";
			header("Location: cadastroproduto.php");
    }
}



?>