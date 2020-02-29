<?php
session_start();
include_once("../conexao/conexao.php");

$ID_TCC = filter_input(INPUT_POST, 'ID_TCC', FILTER_SANITIZE_NUMBER_INT);
$MELHORIAS = filter_input(INPUT_POST, 'MELHORIAS', FILTER_SANITIZE_STRING);
$NOTA = filter_input(INPUT_POST, 'NOTA', FILTER_SANITIZE_STRING);

//echo "MELHORIAS: $MELHORIAS <br>";
//echo "E-mail: $NOTA <br>";

$result_usuario = "UPDATE tcc SET MELHORIAS='$MELHORIAS', NOTA='$NOTA' WHERE ID_TCC='$ID_TCC'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: ../paginacao/pagCoorientador.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editar.php?ID_TCC=$ID_TCC");
}
