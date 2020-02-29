<?php
session_start();
include_once '../conexao/conexao.php';

$ID_TCC = filter_input(INPUT_POST, 'ID_TCC', FILTER_SANITIZE_NUMBER_INT);
$MELHORIAS = filter_input(INPUT_POST, 'MELHORIAS', FILTER_SANITIZE_STRING);
//$NOTA = filter_input(INPUT_POST, 'NOTA', FILTER_SANITIZE_STRING);

print_r($ID_TCC);

print_r($MELHORIAS);



$result_usuario = "UPDATE tcc SET MELHORIAS = '$MELHORIAS', WHERE ID_TCC='$ID_TCC'";
$resultado_usuario = mysqli_query($conn, $result_usuario);


if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: ../index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: cadMelhorias.php?ID_TCC=$ID_TCC");
}

?>