<?php
include '../conexao.php';

if (isset($_GET['tenis_id'])) {
    $tenis_id = $_GET['tenis_id'];

    $sql = "SELECT * FROM tenis WHERE tenis_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt ->bind_param("i", $tenis_id);
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tenis_modelo = $_POST['tenis_modelo'];
    $tenis_preco = $_POST['tenis_preco'];
    $tenis_desc = $_POST['tenis_des'];
    $tenis_marca = $_POST['tenis_marca'];
    $tenis_cor = $_POST['tenis_cor'];
    $tenis_tamanho = $_POST['tenis_tamanho'];
    $tenis_cat = $_POST['tenis_cat'];

    $sql = "UPDATE tenis SET tenis_modelo = ?, tenis_preco = ?, tenis_desc = ?,tenis_marca = ?,tenis_cor = ?,tenis_tamanho = ?,tenis_cat = ? WHERE tenis_id = $tenis_id";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sisssss", $tenis_modelo, $tenis_preco, $tenis_desc, $tenis_marca, $tenis_cor, $tenis_tamanho, $tenis_cat);
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
    <title>Editar Calçados</title>
</head>

<body>
    <h2>Editar Calçados</h2>
    <form action="modelo.php" class="formulario" method="post">

        <input type="hidden" name="tenis_id" id="tenis_id"
            value="<?php echo $row['tenis_id']; ?>" required>

        <th><label for="tenis_modelo">Modelo:</label>
            <input type="text" name="tenis_modelo" id="tenis_modelo"
                value="<?php echo $row['tenis_modelo']; ?>" required>
        </th>
        </br>
        <th> <label for="tenis_preco">Preço:</label>
            <input type="number" name="tenis_preco" id="tenis_preco"
                value="<?php echo $row['tenis_preco']; ?>" required>
        </th>
        </br>
        <th> <label for="tenis_des">Descrição:</label>
            <input type="text" name="tenis_des" id="tenis_des"
             value="<?php echo $row['tenis_desc']; ?>" required>
        </th>
        </br>
        <th> <label for="tenis_marca">Marca:</label>
            <input type="text" name="tenis_marca" id="tenis_marca" 
            value="<?php echo $row['tenis_marca']; ?>" required>
        </th>
        </br>
        <th> <label for="tenis_cor">Cor:</label>
            <input type="text" name="tenis_cor" id="tenis_cor" 
            value="<?php echo $row['tenis_cor']; ?>" required>
        </th>
        </br>
        <th> <label for="tenis_tamanho">Tamanho:</label>
            <input type="text" name="tenis_tamanho" id="tenis_tamanho" 
            value="<?php echo $row['tenis_tamanho']; ?>" required>
        </th>
        </br>
        <th> <label for="tenis_cat">Categoria:</label>
            <input type="text" name="tenis" id="tenis_cat" 
            value="<?php echo $row['tenis_cat']; ?>" required>
        </th>
        </br>

            <button class="btn" type="submit">Atualizar</button>
    </form>
</body>

</html>