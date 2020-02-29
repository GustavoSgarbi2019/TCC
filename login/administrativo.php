<?php
session_start();
if(!empty($_SESSION['ID_USUARIO'])){
	echo "Olá ".$_SESSION['NOME'].", Bem vindo <br>";
	echo "<a href='sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: login.php");	
}
