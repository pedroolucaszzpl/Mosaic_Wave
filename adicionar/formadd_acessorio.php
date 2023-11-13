<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_tenis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!--Google Link Icon-->
    <title>IntenseStreet Calçados</title>
</head>

<body>
    <main>
        <div class="content_form">
            <h3>Adicionar Novo Tênis</h3>
            <form action="add_acessorio.php" method="post">
                <div>URL da Imagem: <input type="text" name="url_imagem"></div>
                <div>Modelo: <input type="text" name="nome"></div>
                <div>Marca: <input type="text" name="marca"></div>
                <div>Descrição: <textarea name="descricao"></textarea></div>
                <div>Preço: <input type="text" name="preco"></div>
                <div>Cor: <input type="text" name="cor"></div>
                <div>Tamanho: <input type="text" name="tamanho"></div>
                <div>Categoria: <select name="categoria">
                    <option value="normal">Normal</option>
                    <option value="especial">Especial</option>
                </select></div>
                <input class="submit" type="submit" value="Adicionar">
            </form>
        </div>
    </main>
</body>

</html>