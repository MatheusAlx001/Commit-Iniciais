<?php
// Estabelecer conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se há erros de conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Obter os valores enviados pelo formulário de login
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta para verificar as credenciais no banco de dados
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
$result = $conn->query($sql);

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Credenciais válidas, redirecionar para a página de sucesso ou realizar outras ações necessárias
    echo "Login realizado com sucesso!";
} else {
    // Credenciais inválidas, exibir mensagem de erro ou redirecionar para página de erro
    echo "Credenciais inválidas. Tente novamente.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
