<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Celke - Login</title>
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
	
		<fieldset>
			<div class="form-signin">
				<div class="row">
					<div class="col-12 offset-md-4 col-md-4">
					<h2 class="text-center">Área restrita</h2>
						<?php
							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							}
							if(isset($_SESSION['msgcad'])){
								echo $_SESSION['msgcad'];
								unset($_SESSION['msgcad']);
							}
						?>

						<form method="POST" action="valida.php">
							<!--<label>Usuário</label>-->
							<!--<input type="text" name="RM" placeholder="Digite o seu usuário" class="form-control"><br> -->
							
							<div class="form-label-group">
								<label for="">RM</label>
								<input type="text" name="RM" id="RM" class="form-control" placeholder="digita seu RM" required autofocus>
							</div>

							<div class="form-label-group">
								<label for="">SENHA</label>
								<input type="password" name="SENHA" id="SENHA" class="form-control" placeholder="digita seu SENHA" required autofocus>
							</div>

							<!--<label>Senha</label>-->
							<!--<input type="password" name="SENHA" placeholder="Digite a sua senha" class="form-control"><br>-->
							
							<input type="submit" name="btnLogin" value="Acessar" class="btn btn-outline-danger btn-block btn-lg mt-3">
							
							<div class="row text-center" style="margin-top: 20px;"> 
								<h4>Você ainda não possui uma conta?</h4>
								<a href="cadastrar.php">Crie grátis</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</fieldset>

		<script src="../bootstrap/js2/jquery-3.4.1.min.js "></script>
    	<script src="../bootstrap/js2/bootstrap.js "></script>
	</body>
</html>