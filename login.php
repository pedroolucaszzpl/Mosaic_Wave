<?php
session_start();
include 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Suponhamos que você já tenha recebido o nome de usuário e senha do usuário
    $email = $_POST['nome_login']; // Suponha que esses valores sejam recebidos de um formulário HTML
    $password = $_POST['senha_login'];

    // Consulta o banco de dados para verificar as credenciais
    $query = "SELECT funcionario_email, funcionario_senha FROM funcionario WHERE funcionario_email = '$email'";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $db_password = $row['funcionario_senha'];

        // Verifica se a senha fornecida corresponde à senha no banco de dados
        if (password_verify($password, $db_password)) {
            // Senha válida, você pode continuar com a autenticação no site
            // Use cURL ou outras bibliotecas para acessar o site
            $_SESSION['usuario_id'] = $row['funcionario_id'];
            echo "Login bem-sucedido!";
            header('location:especiais.php');
        } else {
            echo "Senha incorreta";
        }
    } else {
        echo "Nome de usuário não encontrado";
    }
} else {
    echo 'Dados não inseridos';
}

?>