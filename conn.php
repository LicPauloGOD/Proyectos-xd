<?php
$servername = "localhost";
$username = "conlineweb_vendingbox";
$password = "ctsU9*wSRA&I";
$dbname = "conlineweb_vendingbox";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}
?>