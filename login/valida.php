<?php
session_start();
include_once("../conexao/conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$RM = filter_input(INPUT_POST, 'RM', FILTER_SANITIZE_STRING);
	$SENHA = filter_input(INPUT_POST, 'SENHA', FILTER_SANITIZE_STRING);
	//echo "$usuario - $SENHA";
	if((!empty($RM)) AND (!empty($SENHA))){
		//Gerar a SENHA criptografa
		//echo password_hash($SENHA, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT ID_USUARIO, NOME, RM, SENHA, ACESSO FROM usuario WHERE RM='$RM' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($SENHA, $row_usuario['SENHA'])){
				$_SESSION['ID_USUARIO'] = $row_usuario['ID_USUARIO'];
				$_SESSION['NOME'] = $row_usuario['NOME'];
				$_SESSION['RM'] = $row_usuario['RM'];
				$_SESSION['ACESSO'] = $row_usuario['ACESSO'];

				if ($_SESSION['ACESSO'] == 0) {
					header('Location: ../pesquisar/areaDosTccs.php');
				} else if ($_SESSION['ACESSO'] == 1){
					header('Location: ../paginacao/pagUsuario.php');
				} else if ($_SESSION['ACESSO'] == 2){
					header('Location: ../paginacao/pagCoorientador.php');
				}
				
			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger'>Login ou SENHA incorreto!</div>";
				header("Location: login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Login ou SENHA incorreto!</div>";
		header("Location: login.php");
	}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Página não encontrada</div>";
	header("Location: login.php");
}
