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
		<link href="../bootstrap/css2/bootstrap.css" rel="stylesheet">
		<!--<link href="css/signin.css" rel="stylesheet">-->
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <img src="./img/imagens/etec.png" width="120" height="90" class="d-inline-block align-top" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Página Inicial<span class="sr-only">(Página atual)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../pesquisar/areaDosTccs.php">Pesquisar Tcc</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../cadastraTccs.php">Cadastrar Tcc</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../login/cadastrar.php">Cadastrar Usuario</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../login/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
			<div class="form-signin">
				<div class="row">
					<div class="col-12 offset-md-4 col-md-4">
					<h2>Cadastrar Usuário</h2>
						<?php
							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							}
						?>
						<form method="POST" action="">
							<!--<label>Nome</label>-->
							<!--<input type="text" name="NOME" placeholder="Digite o nome e o sobrenome" class="form-control"><br>-->
							
							<div class="form-label-group">
								<label for="">Nome</label>
								<input type="text" name="NOME" id="" class="form-control" placeholder="digita seu NOME" required autofocus>
							</div>

							<!--<label>E-mail</label>-->
							<!--<input type="text" name="RM" placeholder="Digite o seu e-mail" class="form-control"><br> -->

							<div class="form-label-group">
								<label for="">RM</label>
								<input type="text" name="RM" id="" class="form-control" placeholder="digita seu RM" required autofocus>
							</div>
							
							<!--<label>Usuário</label>-->
							<!--<input type="password" name="SENHA" placeholder="Digite o SENHA" class="form-control"><br>-->
							
							<div class="form-label-group">
								<label for="">usuario</label>
								<input type="password" name="SENHA" id="" class="form-control" placeholder="digita seu SENHA" required autofocus>
							</div>

							<!--<label>SENHA</label>-->
							<!--<input type="text" name="ACESSO" placeholder="Digite a ACESSO" class="form-control"><br>-->

							<div class="form-label-group">
								<label for="">ACESSO</label>
								<input type="text" name="ACESSO" id="" class="form-control" placeholder="digita seu ACESSO" required autofocus>
							</div>
							
							<!--<input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-success"><br><br>-->
							<input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-outline-danger btn-block btn-lg mt-3">
							
							<div class="row text-center" style="margin-top: 20px;"> 
								Lembrou? <a href="login.php">Clique aqui</a> para logar
							</div>
						</form>
					</div>
				</div>
			</div>


		<script src="../bootstrap/js2/jquery-3.4.1.min.js "></script>
   		<script src="../bootstrap/js2/bootstrap.js "></script>
	</body>
</html>