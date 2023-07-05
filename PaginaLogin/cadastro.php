<?php
// Dados para conexão com o banco de dados
$host = 'localhost';
$dbname = 'banco_usuarios';
$usuario = 'root';
$senha = '';

// Conexão com o banco de dados utilizando PDO
try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
}

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Inserindo os dados no banco de dados
try {
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $statement = $conexao->prepare($query);
    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':senha', $senha);
    $statement->execute();
    
    echo 'Cadastro realizado com sucesso!';
} catch(PDOException $e) {
    echo 'Erro ao cadastrar: ' . $e->getMessage();
}
?>
