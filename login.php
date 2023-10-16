<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nome_login'];
    $senha = $_POST['senha_login'];
    $user = 'senai';
    $password = '0000';

    if($user === $usuario && $senha === $password) {
            //inicializar a sessão do usuário 
            session_start();
            $_SESSION['usuario_logado'] = $usuario;
            header ('Location: especiais.php');
    } else {
        header ('Location: logar.php');
    }
    
}
?>