<?php

$servername = "127.0.0.1:3306";
$username = "u156632390_Bayer";
$password = "5H*x|:Mw";
$dbname = "u156632390_bayermarch";

// Inicia conexão
$conn = mysqli_connect($servername, $username, $password, $dbname) Or die("Erro na conexão com banco de dados " . mysqli_error($conn));

?>