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

    $sql = "INSERT INTO camisetas (camiseta_img , camiseta_modelo , camiseta_marca , camiseta_desc ,camiseta_preco , camiseta_cor , camiseta_tamanho, camiseta_cat) VALUES ('$url_imagem','$nome','$marca','$descricao','$preco', '$cor', '$tamanho', '$categoria')";

        if ($mysqli->query($sql)) {
            echo "Camiseta adicionada com sucesso.";
        } else {
            die("Erro na inserção: " . $mysqli->error);
        }
} else {
    echo "Erro na inserção: " . $mysqli->error;
}
?>