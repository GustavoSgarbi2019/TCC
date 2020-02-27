<?php
    require_once('../login/conexao.php');

      // TCC
      $TITULO = $_POST['TITULO'];
      $RESUMO = $_POST['RESUMO'];
      //$ARQUIVO = $_POST['ARQUIVO'];
      $DATA_CAD = $_POST['DATA_CAD'];
      $CURSO = $_POST['CURSO_IDCURSO'];
  

    //$msg = false;
    if(isset($_FILES['ARQUIVO'])){
      $extensao = strtolower(substr($_FILES['ARQUIVO']['name'], -4)); //pega a extensao do ARQUIVO
      $novo_nome = md5(time()) . $extensao; //define o nome do ARQUIVO
      $diretorio = "../GED/teste/"; //define o diretorio para onde enviaremos o ARQUIVO
      move_uploaded_file($_FILES['ARQUIVO']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

      //$sql_code = "INSERT INTO tcc (ARQUIVO) VALUES('$novo_nome')";
      $sql = "INSERT INTO tcc (TITULO, RESUMO, ARQUIVO, DATA_CAD, CURSO_IDCURSO) VALUES ('".$TITULO."', '".$RESUMO."', '".$novo_nome."',  '".$DATA_CAD."', '".$CURSO."')";
      $result = mysqli_query($conn, $sql);
  
      /*
      if($mysqli->query($sql_code))
        $msg = "ARQUIVO enviado com sucesso!";
      else
        $msg = "Falha ao enviar ARQUIVO.";
        */
    }
  


    // autores
    $NOME = $_POST['NOME'];
    $SOBRENOME = $_POST['SOBRENOME'];
    $CPF = $_POST['CPF'];

    //autores
    $sql = "INSERT INTO autores (NOME, SOBRENOME, CPF) VALUES ('".$NOME."', '".$SOBRENOME."', '".$CPF."')";
    $result = mysqli_query($conn, $sql);

?>

    