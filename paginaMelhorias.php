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
        ?>

        <div class="container">
            <div class="row">
                <div class="col-12 offset-md-3 col-md-6">
                    <p>
                        <form enctype="multipart/form-data" action="" method="post">
                            <input type="hidden" name="ID_TCC" value="<?php echo $row_usuario['ID_TCC']; ?>">

                            <div class="form-group">
                                <label for="">O que será editado no projeto:</label>
                                <input class="form-control" id="MELHORIAS" name="MELHORIAS" value="<?php echo $row_usuario['MELHORIAS']; ?>"> 
                                <!-- <textarea class="form-control mt-3" name="MELHORIAS" id="MELHORIAS" cols="30" rows="10"><?php echo $row_usuario['MELHORIAS']; ?></textarea> -->
                            </div>

                            <button type="submit" class="btn btn-outline-danger btn-lg btn-block">Enviar</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>

    </body>

    </html>