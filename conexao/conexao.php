<?php
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $db = "gerenciamentoTcc";

    $conn = mysqli_connect($localhost, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
?>