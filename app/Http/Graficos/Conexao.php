<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vet";

// cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// checa conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>