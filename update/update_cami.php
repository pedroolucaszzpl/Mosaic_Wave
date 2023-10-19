<?php
include '../conexao.php';

if (isset($_GET['camiseta_id'])) {
    $camiseta_id = $_GET['camiseta_id'];

    $sql = "SELECT * FROM camisetas WHERE camiseta_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt ->bind_param("i", $camiseta_id);
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

    $camiseta_modelo = $_POST['camiseta_modelo'];
    $camiseta_preco = $_POST['camiseta_preco'];
    $camiseta_desc = $_POST['camiseta_desc'];
    $camiseta_marca = $_POST['camiseta_marca'];
    $camiseta_cor = $_POST['camiseta_cor'];
    $camiseta_tamanho = $_POST['camiseta_tamanho'];
    $camiseta_cat = $_POST['camiseta_cat'];

    $sql = "UPDATE camiseta SET camiseta_modelo = ?, camiseta_preco = ?, camiseta_desc = ?,camiseta_marca = ?,camiseta_cor = ?,camiseta_tamanho = ?,camiseta_cat = ? WHERE tenis_id = $tenis_id";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sisssss", $camiseta_modelo, $camiseta_preco, $camiseta_desc, $camiseta_marca, $camiseta_cor, $camiseta_tamanho, $camiseta_cat);
    $stmt->execute();

    header('Location: ..\especiais.php ');
    exit();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/update.css">
    <title>Editar Camisetas</title>
</head>

<body>
    <div class="container">
    <h2>Editar Camisas</h2>
    <form action="modelo.php" class="formulario" method="post">

        <input type="hidden" name="camiseta_id" id="camiseta_id"
            value="<?php echo $row['camiseta_id']; ?>" required>

        <th><label for="camiseta_modelo">Modelo:</label>
            <input type="text" name="camiseta_modelo" id="camiseta_modelo"
                value="<?php echo $row['camiseta_modelo']; ?>" required>
        </th>
        </br>
        <th> <label for="camiseta_preco">Preço:</label>
            <input type="number" name="camiseta_preco" id="tenis_preco"
                value="<?php echo $row['camiseta_preco']; ?>" required>
        </th>
        </br>
        <th> <label for="camiseta_desc">Descrição:</label>
            <input type="text" name="camiseta_desc" id="camiseta_desc"
             value="<?php echo $row['camiseta_desc']; ?>" required>
        </th>
        </br>
        <th> <label for="camiseta_marca">Marca:</label>
            <input type="text" name="camiseta_marca" id="camiseta_marca" 
            value="<?php echo $row['camiseta_marca']; ?>" required>
        </th>
        </br>
        <th> <label for="camiseta_cor">Cor:</label>
            <input type="text" name="camiseta_cor" id="camiseta_cor" 
            value="<?php echo $row['camiseta_cor']; ?>" required>
        </th>
        </br>
        <th> <label for="camiseta_tamanho">Tamanho:</label>
            <input type="text" name="camiseta_tamanho" id="camiseta_tamanho" 
            value="<?php echo $row['camiseta_tamanho']; ?>" required>
        </th>
        </br>
        <th> <label for="camiseta_cat">Categoria:</label>
            <input type="text" name="camiseta_cat" id="camiseta_cat" 
            value="<?php echo $row['camiseta_cat']; ?>" required>
        </th>
        </br>

            <button class="btn" type="submit">Atualizar</button>
    </form>
    </div>
</body>

</html>