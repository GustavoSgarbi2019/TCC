<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar TCCs</title>
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


    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-3 col-md-6">
                <p>
                    <form enctype="multipart/form-data" action="php/cadTcc.php" method="post">
                        <div class="form-group">
                            <label for="">Título</label>
                            <input type="text" name="TITULO" id="" class="form-control" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="">Resumo</label>
                            <textarea class="form-control" id="" rows="5" name="RESUMO" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Curso</label>
                            <select class="form-control" name="CURSO_IDCURSO" required>
                                <option value="0" selected disabled>Escolha o curso</option>
                                <option value="2">Administração</option>
                                <option value="1">Açúcar e Álcool</option>
                                <option value="3">Agronegócio</option>
                                <option value="5">Enfermagem</option>
                                <option value="7">Informática</option>
                                <option value="4">Desenvolvimento de Sistemas</option>
                                <option value="9">Recursos Humanos</option>
                                <option value="8">Redes de Computadores</option>
                                <option value="10">Zootecnia</option>
                                <option value="6">Ensino Médio Integrado ao Agropecuária</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-danger" id="addAutor">+</button>
                            <label for="">Autores</label>

                            <div class="form-row author_">
                                <div class="form-group col-md-6">
                                    <label>Nome</label>
                                    <input type="text" name="NOME" id="" class="form-control" required />
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Sobrenome</label>
                                    <input type="text" name="SOBRENOME" id="" class="form-control" required />
                                </div>

                                <div class="form-group col-md-12">
                                    <label>CPF</label>
                                    <input type="text" name="CPF" id="" class="form-control" maxlength="14" required />
                                </div>

                                <div id="autores">

                                </div>
                
                                    
                                <div class="form-group col-md-12">
                                    <p>
                                        <div class="form-group">
                                            <label for="">Ano de Apresentação</label>
                                            <input type="text" name="DATA_CAD" id="" class="form-control" maxlength="4" required autofocus>
                                        </div>
                                    <p>

                                    <div class="form-group">
                                        <input type="file" name="ARQUIVO" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="btnCadTcc">Cadastrar</button>
                    </form>
                <p>     
            </div>
        </div>
    </div>


            <script src="./bootstrap/js2/jquery-3.4.1.min.js"></script>
            <script src="./bootstrap/js2/bootstrap.js"></script>
</body>

</html>