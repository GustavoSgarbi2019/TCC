<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once '../conexao/conexao.php';
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	$erro = false;
	
	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	
	if(in_array('',$dados)){
		$erro = true;
		$_SESSION['msg'] = "<div class='alert alert-danger'>Necessário preencher todos os campos!</div>";
	}elseif((strlen($dados['SENHA'])) < 6){
		$erro = true;
		$_SESSION['msg'] = "<div class='alert alert-danger'>A SENHA deve ter no minímo 6 caracteres!</div>";
	}elseif(stristr($dados['SENHA'], "'")) {
		$erro = true;
		$_SESSION['msg'] = "<div class='alert alert-danger'>Caracter ( ' ) utilizado na SENHA é inválido!</div>";
	}else{
		$result_usuario = "SELECT ID_USUARIO FROM usuario WHERE RM='". $dados['RM'] ."'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "<div class='alert alert-danger'>Este usuário já está sendo utilizado!</div>";
		}
		/*
		$result_usuario = "SELECT ID_USUARIO FROM usuario WHERE RM='". $dados['RM'] ."'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "<div class='alert alert-danger'>Este e-mail já está cadastrado!</div>";
		}
		*/
	}
	
	
	//var_dump($dados);
	if(!$erro){
		//var_dump($dados);
		$dados['SENHA'] = password_hash($dados['SENHA'], PASSWORD_DEFAULT);
		
		$result_usuario = "INSERT INTO usuario (NOME, RM, SENHA, ACESSO) VALUES (
						'" .$dados['NOME']. "',
						'" .$dados['RM']. "',
						'" .$dados['SENHA']. "',
						'" .$dados['ACESSO']. "'
						)";
		$resultado_usario = mysqli_query($conn, $result_usuario);
		if(mysqli_insert_id($conn)){
			$_SESSION['msgcad'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
			header("Location: login.php");
		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar o usuário!</div>";
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Celke - Cadastrar</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="form-signin" style="background: #42dea4;">
				<h2>Cadastrar Usuário</h2>
				<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>
				<form method="POST" action="">
					<!--<label>Nome</label>-->
					<input type="text" name="NOME" placeholder="Digite o nome e o sobrenome" class="form-control"><br>
					
					<!--<label>E-mail</label>-->
					<input type="text" name="RM" placeholder="Digite o seu e-mail" class="form-control"><br>
					
					<!--<label>Usuário</label>-->
					<input type="password" name="SENHA" placeholder="Digite o SENHA" class="form-control"><br>
					
					<!--<label>SENHA</label>-->
					<input type="text" name="ACESSO" placeholder="Digite a ACESSO" class="form-control"><br>
					
					<input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-success"><br><br>
					
					<div class="row text-center" style="margin-top: 20px;"> 
						Lembrou? <a href="login.php">Clique aqui</a> para logar
					</div>
				</form>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>