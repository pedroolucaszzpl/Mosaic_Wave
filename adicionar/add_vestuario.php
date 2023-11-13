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

    $sql = "INSERT INTO vestuario (vestuario_img , vestuario_modelo , vestuario_marca , vestuario_desc ,vestuario_preco , vestuario_cor , vestuario_tamanho, vestuario_cat) VALUES ('$url_imagem','$nome','$marca','$descricao','$preco', '$cor', '$tamanho', '$categoria')";

        if ($mysqli->query($sql)) {
            header("Location: ../modelo.php"); // Redireciona para a página de sucesso
            exit(); // Certifique-se de encerrar o script após o redirecionamento
        } else {
            die("Erro na inserção: " . $mysqli->error);
        }
} else {
    echo "Erro na inserção: " . $mysqli->error;
}
?>