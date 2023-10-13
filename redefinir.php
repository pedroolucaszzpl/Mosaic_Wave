<?php
include 'conexao.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Receba o email do formulário
        $funcionario_email = $_POST['funcionario_email'];
        $funcionario_senha = $_POST['funcionario_senha'];

    // Recupere os dados do formulário
    $funcionario_email = $_POST["funcionario_email"];
    $funcionario_senha = $_POST["funcionario_senha"];

    // Execute uma consulta para atualizar a senha
    $sql = "UPDATE funcionario SET funcionario_senha = ? WHERE funcionario_email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $funcionario_senha , $funcionario_email);

    if ($stmt->execute()) {
        echo "Senha redefinida com sucesso!";
        header("Location: logar.php");
    } else {
        echo "Erro ao redefinir a senha: " . $mysqli->error;
    }

    // Feche a conexão com o banco de dados
    $mysqli->close();
    }
?>
