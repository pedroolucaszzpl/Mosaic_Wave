<?php
include '../conexao.php';

if (isset($_GET['vestuario_id'])) {
    $vestuario_id = $_GET['vestuario_id'];

    $sql = "SELECT * FROM vestuario WHERE vestuario_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $vestuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
    } else {
        die("Item não encontrado");
    }
} else {
    die("Item não específicado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $vestuario_modelo = $_POST['vestuario_modelo'];
    $vestuario_preco = $_POST['vestuario_preco'];
    $vestuario_desc = $_POST['vestuario_desc'];
    $vestuario_marca = $_POST['vestuario_marca'];
    $vestuario_cor = $_POST['vestuario_cor'];
    $vestuario_tamanho = $_POST['vestuario_tamanho'];
    $vestuario_cat = $_POST['vestuario_cat'];

    $sql = "UPDATE vestuario SET vestuario_modelo = ?, vestuario_preco = ?, vestuario_desc = ?,vestuario_marca = ?,vestuario_cor = ?,vestuario_tamanho = ?,vestuario_cat = ? WHERE vestuario_id = $vestuario_id";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sisssss", $vestuario_modelo, $vestuario_preco, $vestuario_desc, $vestuario_marca, $vestuario_cor, $vestuario_tamanho, $vestuario_cat);
    $stmt->execute();

    header('Location: ..\modelo.php ');
    exit();

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/update.css">
    <title>Editar Vestuario</title>
</head>

<body>
    <div class="container">
    <h2>Editar Vestuario</h2>
    <form action="" class="formulario" method="post">

        <input type="hidden" name="vestuario_id" id="vestuario_id" value="<?php echo $row['vestuario_id']; ?>" required>

        <th><label id="b"  for="vestuario_modelo">Modelo:</label>
            <input type="text" name="vestuario_modelo" id="vestuario_modelo"
                value="<?php echo $row['vestuario_modelo']; ?>" required>
        </th>
        </br>
        <th> <label id="b"  for="vestuario_preco">Preço:</label>
            <input type="number" name="vestuario_preco" id="vestuario_preco"
                value="<?php echo $row['vestuario_preco']; ?>" required>
        </th>
        </br>
<<<<<<< HEAD
        <th> <label for="vestuario_desc">Descrição:</label>
            <input type="text" name="vestuario_desc" id="vestuario_desc" value="<?php echo $row['vestuario_desc']; ?>"
                required>
        </th>
        </br>
        <th> <label for="vestuario_marca">Marca:</label>
            <input type="text" name="vestuario_marca" id="vestuario_marca"
                value="<?php echo $row['vestuario_marca']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_cor">Cor:</label>
            <input type="text" name="vestuario_cor" id="vestuario_cor" value="<?php echo $row['vestuario_cor']; ?>"
                required>
        </th>
        </br>
        <th> <label for="vestuario_tamanho">Tamanho:</label>
            <input type="text" name="vestuario_tamanho" id="vestuario_tamanho"
                value="<?php echo $row['vestuario_tamanho']; ?>" required>
        </th>
        </br>
        <th> <label for="vestuario_cat">Categoria:</label>
            <input type="text" name="vestuario_cat" id="vestuario_cat" value="<?php echo $row['vestuario_cat']; ?>"
                required>
=======
        <th> <label id="b"  for="vestuario_des">Descrição:</label>
            <input type="text" name="vestuario_des" id="vestuario_des"
             value="<?php echo $row['vestuario_desc']; ?>" required>
        </th>
        </br>
        <th> <label id="b"  for="vestuario_marca">Marca:</label>
            <input type="text" name="vestuario_marca" id="vestuario_marca" 
            value="<?php echo $row['vestuario_marca']; ?>" required>
        </th>
        </br>
        <th> <label id="b"  for="vestuario_cor">Cor:</label>
            <input type="text" name="vestuario_cor" id="vestuario_cor" 
            value="<?php echo $row['vestuario_cor']; ?>" required>
        </th>
        </br>
        <th> <label id="b"  for="vestuario_tamanho">Tamanho:</label>
            <input type="text" name="vestuario_tamanho" id="vestuario_tamanho" 
            value="<?php echo $row['vestuario_tamanho']; ?>" required>
        </th>
        </br>
        <th> <label id="b" for="vestuario_cat">Categoria:</label>
            <input type="text" name="vestuario_cat" id="vestuario_cat" 
            value="<?php echo $row['vestuario_cat']; ?>" required>
>>>>>>> edde79d9b157969872d39eb44d2c31665d567ce5
        </th>
        </br>

        <button class="btn" type="submit">Atualizar</button>
    </form>
    </div>
</body>

</html>