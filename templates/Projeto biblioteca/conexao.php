<?php
// Define as configurações do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor de banco de dados
$user = 'root'; // substitua pelo seu usuário do banco de dados
$password = ''; // substitua pela sua senha do banco de dados
$dbname = 'biblioteca'; // nome do banco de dados

// Cria a conexão
$mysqli = new mysqli($host, $user, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Define o charset para evitar problemas com caracteres especiais
$mysqli->set_charset("utf8");

?>