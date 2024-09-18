<?php
$servername = "localhost"; // ou o endereço do servidor de banco de dados
$username = "root";  // nome de usuário do banco de dados
$password = "";    // senha do banco de dados
$databasename = "FestBum"; // nome do banco de dados

// Cria uma nova conexão MySQLi
$conn = new mysqli($servername, $username, $password, $databasename);

// Verifica se ocorreu um erro na conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

echo "Conexão bem-sucedida!";
?>