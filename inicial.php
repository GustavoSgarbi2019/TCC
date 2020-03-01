<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Armazenamento de TCCs</title>
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
                    <a class="nav-link" href="index.php">Página Inicial<span class="sr-only">(Página atual)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./pesquisar/areaDosTccs.php">Pesquisar Tcc</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./cadastraTccs.php">Cadastrar Tcc</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./login/cadastrar.php">Cadastrar Usuario</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./login/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>


    <fieldset>
        <div class="form-signin">
            <div class="row">
                <div class="col-12 offset-md-4 col-md-4 mt-3">
                    <div class="text-center mb-4">
                        <img src="./img/imagens/capa.png" class="img-fluid" alt="Responsive image" width="" height="">
                    </div>

                        <form enctype="multipart/form-data" action="./pesquisar/areaDosTccs.php" method="post">
                            <div class="form-label-group mt-3">
                                <button type="submit" class="btn btn-outline-danger btn-block btn-lg">Pesquisar</button>
                            </div>
                        </form>

                        <form enctype="multipart/form-data" action="cadastraTccs.php" method="post">
                            <div class="form-label-group mt-3">
                                <button type="submit" class="btn btn-outline-danger btn-block btn-lg">Cadastrar TCCs</button>
                            </div>
                        </form>

                        <form enctype="multipart/form-data" action="./login/cadastrar.php" method="post">
                            <div class="form-label-group mt-3">
                                <button type="submit" class="btn btn-outline-danger btn-block btn-lg">Cadastrar</button>
                            </div>
                        </form>

                        <form enctype="multipart/form-data" action="./login/login.php" method="post">
                            <div class="form-label-group mt-3">
                                <button type="submit" class="btn btn-outline-danger btn-block btn-lg">Login</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </fieldset>





    <script src="./bootstrap/js2/jquery-3.4.1.min.js"></script>
    <script src="./bootstrap/js2/bootstrap.js"></script>
</body>

</html>