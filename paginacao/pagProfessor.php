<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
        <title>Celke - Listar com JavaScript</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <img src="../img/imagens/etec.png" width="120" height="90" class="d-inline-block align-top" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
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

            <span class="navbar-text active">
                <?php
                    session_start();
                    include_once "../conexao/conexao.php";

                    if(!empty($_SESSION['ID_USUARIO'])){
                        echo " ".$_SESSION['NOME']." <br>";
                        echo "<a href='../login/sair.php'>Sair</a>";
                    }
                ?>
            </span>
        </div>
    </nav>

		<div class="container">
			<h2>Listar Professor</h2>
                <span id="conteudo"></span><br><br><br>
		</div>
		
		<script>
			var qnt_result_pg = 9; //quantidade de registro por página
			var pagina = 1; //página inicial
			$(document).ready(function () {
				listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});
			
			function listar_usuario(pagina, qnt_result_pg){
				var dados = {
					pagina: pagina,
					qnt_result_pg: qnt_result_pg
				}
				$.post('./professor.php', dados , function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			}
		</script>
    </body>
</html>
