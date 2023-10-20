<?php
include '../conexao.php';

if (isset($_GET['acessorio_id'])) {
    $acessorio_id = $_GET['acessorio_id'];

    $sql = "SELECT * FROM acessorios WHERE acessorio_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt ->bind_param("i", $acessorio_id);
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

    $acessorio_modelo = $_POST['acessorio_modelo'];
    $acessorio_preco = $_POST['acessorio_preco'];
    $acessorio_desc = $_POST['acessorio_des'];
    $acessorio_marca = $_POST['acessorio_marca'];
    $acessorio_cor = $_POST['acessorio_cor'];
    $acessorio_tamanho = $_POST['acessorio_tamanho'];
    $acessorio_cat = $_POST['acessorio_cat'];

    $sql = "UPDATE acessorio SET acessorio_modelo = ?, acessorio_preco = ?, acessorio_desc = ?,acessorio_marca = ?,acessorio_cor = ?,acessorio_tamanho = ?,acessorio_cat = ? WHERE acessorio_id = $acessorio_id";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sisssss", $acessorio_modelo, $acessorio_preco, $acessorio_desc, $acessorio_marca, $acessorio_cor, $acessorio_tamanho, $acessorio_cat);
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
    <link rel=stylesheet href="./css/update.css">
    <title>Editar Acessórios</title>
</head>

<body>
    <div class="container">
        <h2>Editar Acessórios</h2>
        <form action="../modelo.php" class="formulario" method="post">
    
            <input type="hidden" name="acessorio_id" id="acessorio_id"
                value="<?php echo $row['acessorio_id']; ?>" required>
    
            <th><label id="l" for="acessorio_modelo">Modelo:</label>
                <input type="text" name="acessorio_modelo" id="acessorio_modelo"
                    value="<?php echo $row['acessorio_modelo']; ?>" required>
            </th>
            <th> <label id="l" for="acessorio_preco">Preço:</label>
                <input type="number" name="acessorio_preco" id="acessorio_preco"
                    value="<?php echo $row['acessorio_preco']; ?>" required>
            </th>
            <th> <label id="l" for="acessorio_des">Descrição:</label>
                <input  type="text" name="acessorio_des" id="acessorio_des"
                 value="<?php echo $row['acessorio_des']; ?>" required>
            </th>
            <th> <label id="l" for="acessorio_marca">Marca:</label>
                <input type="text" name="acessorio_marca" id="acessorio_marca" 
                value="<?php echo $row['acessorio_marca']; ?>" required>
            </th>
            <th> <label id="l" for="acessorio_cor">Cor:</label>
                <input type="text" name="acessorio_cor" id="acessorio_cor" 
                value="<?php echo $row['acessorio_cor']; ?>" required>
            </th>
            <th> <label  id="l" for="acessorio_tamanho">Tamanho:</label>
                <input type="text" name="acessorio_tamanho" id="acessorio_tamanho" 
                value="<?php echo $row['acessorio_tamanho']; ?>" required>
            </th>
            <th> <label id="l" for="acessorio_cat">Categoria:</label>
                <input type="text" name="acessorio_cat" id="acessorio_cat" 
                value="<?php echo $row['acessorio_cat']; ?>" required>
            </th>
    
                <button class="btn" type="submit">Atualizar</button>
        </form>
    </div>
</body>

</html>