<?php
include("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifique se os campos obrigatórios foram submetidos
    $url_imagem = $_POST["url_imagem"];
    $nome = $_POST["nome"];
    $marca = $_POST["marca"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $cor = $_POST["cor"];
    $tamanho = $_POST["tamanho"];
    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO acessorios (acessorio_img , acessorio_modelo , acessorio_marca , acessorio_desc ,acessorio_preco , acessorio_cor , acessorio_tamanho, acessorio_cat) VALUES ('$url_imagem','$nome','$marca','$descricao','$preco', '$cor', '$tamanho', '$categoria')";

        if ($mysqli->query($sql)) {
            header("Location: ../especiais.php"); // Redireciona para a página de sucesso
            exit(); // Certifique-se de encerrar o script após o redirecionamento
        } else {
            die("Erro na inserção: " . $mysqli->error);
        }
} else {
    echo "Erro na inserção: " . $mysqli->error;
}
?>