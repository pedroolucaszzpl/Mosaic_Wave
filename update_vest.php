<?php
include 'conexao.php';

if (isset($_GET['vestuario_id'])) {
    $vestuario_id = $_GET['vestuario_id'];

    $sql = "SELECT * FROM vestuario WHERE vestuario_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt ->bind_param("i", $vestuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
    } else {
        die ("Item não encontrado");
    }
} else {
    die ("Item não específicado");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/style.css">
    <title>Editar Vestuario</title>
</head>

<body>
    <h2>Editar Vestuario</h2>
    <form action="modelo.php" class="formulario" method="post">

        <input type="hidden" name="vestuario_id" id="vestuario_id"
            value="<?php echo $row['vestuario_id']; ?>" required>

        <th><label for="vestuario_modelo">Modelo:</label>
            <input type="text" name="vestuario_modelo" id="vestuario_modelo"
                value="<?php echo $row['vestuario_modelo']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_preco">Preço:</label>
            <input type="number" name="vestuario_preco" id="vestuario_preco"
                value="<?php echo $row['vestuario_preco']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_des">Descrição:</label>
            <input type="text" name="vestuario_des" id="vestuario_des"
             value="<?php echo $row['vestuario_desc']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_marca">Marca:</label>
            <input type="text" name="vestuario_marca" id="vestuario_marca" 
            value="<?php echo $row['vestuario_marca']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_cor">Cor:</label>
            <input type="text" name="vestuario_cor" id="vestuario_cor" 
            value="<?php echo $row['vestuario_cor']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_tamanho">Tamanho:</label>
            <input type="text" name="vestuario_tamanho" id="vestuario_tamanho" 
            value="<?php echo $row['vestuario_tamanho']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_cat">Categoria:</label>
            <input type="text" name="vestuario_cat" id="vestuario_cat" 
            value="<?php echo $row['vestuario_cat']; ?>" required>
        </th>
        </br>

            <button class="btn" type="submit">Atualizar</button>
    </form>
</body>

</html>