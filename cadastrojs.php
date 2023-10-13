<?php

$conn = new mysqli("localhost", "root", "", "db_intensestreet");

if ($conn->connect_error) {
    die("erro na conexão: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['funcionario_nome'];
    $email = $_POST['funcionario_email'];
    $senha = $_POST['funcionario_senha'];

    $sql = "INSERT INTO funcionario (funcionario_nome,funcionario_email,funcionario_senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt-> bind_param("sss", $nome, $email, $senha);
    $stmt->execute();

    header ('Location: logar.php ');
    exit();
    
}
$conn->close();
?>