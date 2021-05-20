<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "projeto_tcc";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	$pesquisar = $_POST['pesquisar'];
	$result_cursos = "SELECT * FROM produto WHERE nome LIKE '%$pesquisar%' LIMIT 5";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	
	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo "Nome do curso: ".$rows_cursos['nome']."<br>";
	}
?>