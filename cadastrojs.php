<?php

$conn = new mysqli("localhost", "root", "", "db_intensestreet");

if ($conn->connect_error) {
    die("erro na conexão: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['funcionario_nome'];
    $email = $_POST['funcionario_email'];
    $senha = $_POST['funcionario_senha'];
    $funcao = $_POST['funcionario_funcao'];

    // Hash da senha usando password_hash()
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO funcionario (funcionario_nome,funcionario_email,funcionario_senha, funcionario_funcao) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt-> bind_param("ssss", $nome, $email, $senha_hash, $funcao);
    $stmt->execute();

    header ('Location: index.php ');
    exit();
    
}
$conn->close();
?>