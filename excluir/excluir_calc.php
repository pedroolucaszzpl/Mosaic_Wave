<?php
// Inclua o arquivo de conexão com o banco de dados (conexao.php)
include '../conexao.php';

// Verifique se o ID do item a ser excluído foi passado
if (isset($_POST['tenis_id'])) {
    $item_id = $_POST['tenis_id'];

    // Execute a lógica de exclusão no banco de dados (substitua "sua_tabela" pelo nome da tabela correta)
    $sql = "DELETE FROM tenis WHERE tenis_id = $item_id";

    if ($mysqli->query($sql)) {
        
        // Item excluído com sucesso
        header("Location: ../especiais.php"); // Redireciona para a página de sucesso
            exit(); // Certifique-se de encerrar o script após o redirecionamento
    } else {
        // Erro ao excluir o item
        echo "Erro ao excluir o item: " . $mysqli->error;
    }
} else {
    // ID do item não foi fornecido
    echo "ID do item não fornecido.";
}
?>
