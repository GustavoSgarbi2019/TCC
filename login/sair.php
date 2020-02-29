<?php

session_start();
unset($_SESSION['ID_USUARIO'], $_SESSION['NOME'], $_SESSION['RM']);

$_SESSION['msg'] = "<div class='alert alert-success'>Deslogado com sucesso!</div>";
header("Location: login.php");