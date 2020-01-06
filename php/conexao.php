<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "aldeiacast";

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    $conn->set_charset("utf8");

?>

