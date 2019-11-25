<?php
require 'config.php';
	if(isset($_POST['email']) && empty($_POST['email'])==false){//se existir o campo email e ele não estiver vazio.
		$nome = addslashes($_POST['nome']);// addslashes serve para tornar a informação armazanada na varriável $nome mais segura.
		$email = addslashes($_POST['email']);
		$telefone = addslashes($_POST['telefone']);
		$senha = md5(addslashes($_POST['senha']));

		$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', telefone = '$telefone', senha = '$senha'";//comando sql para inserir novo usuario.
		$pdo->query($sql);

		header("Location: painelusuario.php");
		$_SESSION['nome'] = $nome;
}

