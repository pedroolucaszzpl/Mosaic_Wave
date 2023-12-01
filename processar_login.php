<?php
include 'conexao.php';

$login_err = 0;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath($_SERVER['SCRIPT_FILENAME'])) {
    session_destroy();
    header('Location: inicial.php');
    exit();
} else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $usuario = $_POST['funcionario_nome'];
        $email = $_POST['funcionario_email'];
        $filial = $_POST['filial'];

        $sql = "SELECT * FROM funcionario WHERE usuario = '$usuario' AND email = '$email' AND filial = '$filial' LIMIT 1";
        $sql_exec = $mysqli->query($sql) or die($mysqli->error());

        $usuario = $sql_exec->fetch_assoc();
        if (password_verify($_POST['funcionario_senha'], $usuario['funcionario_senha'])) {
            session_start();
            $_SESSION['usuario_logado'] = true;

            sleep(1);
            header('Location: homepage.php');
        } else {
            sleep(1);
            header('Location: inicial.php');
        }
    }
}
?>