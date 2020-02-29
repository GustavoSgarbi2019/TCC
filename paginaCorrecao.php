<?php
session_start();
if(!empty($_SESSION['ID_USUARIO'])){
	echo "Olá ".$_SESSION['NOME'].", Bem vindo <br>";
	echo "<a href='./login/sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: ./login/login.php");	
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Correção dos projetos</title>
        <link rel="stylesheet" href="./bootstrap/css2/bootstrap.css">

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
                        <a class="nav-link" href="index.html">Página Inicial<span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrarUsuarios.html">Cadastro Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrarProfessores.html">Cadastro Professores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inicial.html">Página de Cadastro</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar TCC" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </ul>
            </div>
        </nav>

        <?php
        include_once("./conexao/conexao.php");
        $ID_TCC = filter_input(INPUT_GET, 'ID_TCC', FILTER_SANITIZE_NUMBER_INT);
        $result_usuario = "SELECT * FROM tcc WHERE ID_TCC = '$ID_TCC'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $row_usuario = mysqli_fetch_assoc($resultado_usuario);
        
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
        ?>

        <div class="container">
            <div class="row">
                <div class="col-12 offset-md-3 col-md-6">
                    <p>
                        <form enctype="multipart/form-data" action="./php/cadMelhorias.php" method="post">
                        <input type="hidden" name="ID_TCC" value="<?php echo $row_usuario['ID_TCC']; ?>">

                            <div class="form-group">
                                <label for="">O que será editado no projeto:</label>
                                <textarea class="form-control" id="MELHORIAS" rows="5" name="MELHORIAS"> <?php echo $row_usuario['MELHORIAS']; ?> </textarea>
                            </div>

                            <h6 class="mt-5">Caso o projeto esteja completo, dê sua nota:</h6>
                            <!--Check de notas-->
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="NOTA" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">I</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="NOTA" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">R</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="NOTA" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">B</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="NOTA" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio4">MB</label>
                            </div>

                            <button type="submit" class="btn btn-outline-danger btn-lg btn-block">Enviar</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>

    </body>

    </html>