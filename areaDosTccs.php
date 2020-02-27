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

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Inicial</title>
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

                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="card mt-5 col-12 col-md-4" style="width: 18rem;">
                <img src="./img/imagens/açucar.png" width="120px" height="277px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Açúcar e Álcool</h5>
                    <p class="card-text">Descrição do projeto</p>
                    <a href="TCC PDF/15596896365cf6f9a4714c6.pdf">Visualizar completo</a>
                </div>
            </div>
            <div class="card col-12 col-md-4 mt-5" style="width: 18rem;">
                <img src="./img/imagens/ds.jpg" height="277px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Desenvolvimento de Sistemas</h5>
                    <p class="card-text">Descrição do projeto</p>
                    <a href="#">Visualizar completo</a>
                </div>
            </div>
            <div class="card col-12 col-md-4 mt-5" style="width: 18rem;">
                <img src="./img/imagens/enf.png" height="277px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Enfermagem</h5>
                    <p class="card-text">Descriçao do projeto</p>
                    <a href="#">Visualizar completo</a>
                </div>
            </div>
        </div>



        <div class="container-fluid">
            <div class="row">
                <div class="card col-12 col-md-4 mt-5" style="width: 18rem;">
                    <img src="./img/imagens/adm.jpg" height="277px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Administração</h5>
                        <p class="card-text">Descrição do projeto</p>
                        <a href="#">Visualizar completo</a>
                    </div>



                </div>
                <div class="card col-12 col-md-4 mt-5" style="width: 18rem;">
                    <img src="./img/imagens/agro.jpg" height="277px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Agropecuária</h5>
                        <p class="card-text">Descrição do projeto</p>
                        <a href="#">Visualizar completo</a>
                    </div>
                </div>
                <div class="card col-12 col-md-4 mt-5" style="width: 18rem;">
                    <img src="./img/imagens/rh.jpg" height="277px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Recursos Humanos</h5>
                        <p class="card-text">Descriçao do projeto</p>
                        <a href="#">Visualizar completo</a>
                    </div>
                </div>




                <script src="./bootstrap/js2/jquery-3.4.1.min.js"></script>
                <script src="./bootstrap/js2/bootstrap.js"></script>
</body>

</html>