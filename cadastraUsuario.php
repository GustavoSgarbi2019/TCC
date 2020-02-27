<?php
session_start();
if(!empty($_SESSION['ID_USUARIO'])){
	echo "Olá ".$_SESSION['NOME'].", Bem vindo <br>";
	echo "<a href='./login_teste/sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: ./login_teste/login.php");	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>USUARIO</h1>
    <a href="sair.php"> sair </a>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>