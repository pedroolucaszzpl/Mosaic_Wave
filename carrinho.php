<?php
session_start();
include 'conexao.php';
if (!isset($_SESSION['usuario_id'])) {
    header('Location: logar.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /><!--Google Link Icon-->
    <title>IntenseStreet Calçados</title>
</head>

<body>
<header>
        <nav class="navbar">
            <div class="contentHead">
                <div class="navbar-menu">
                    <ul class="navbar-items">
                        <li class="navbar-items-menu">
                            <a class="nav-link" href="main.php" onclick="">Páginal Inicial</a>
                        </li>
                        <li><select name="departamentos" id="departamentos" onchange="redirectToPage(this)">
                                <option value="" disabled selected hidden>Departamentos</option>
                                <option value="vestuario">Vestuário</option>
                               <option value="especial">Edições Especiais</option>

                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="menu_vertical">
                <span id="icon" class="material-symbols-outlined" onclick="clickMenu()">
                    menu
                </span>
                <menu id="mvertical">
                    <ul>
                        <li><a href="index.php">Página Inicial</a></li>
                        <li><a href="index.php">Calçados</a></li>
                        <li><a href="index.php">Acessórios</a></li>
                        <li><a href="index.php">Vestuário</a></li>
                        <li><a href="especiais.php">Edições Especiais</a></li>
                    </ul>
                </menu>
            </div>
            <div class="search">
                <form class="formss" action="pesquisa.php" method="post">
                    <input type="image" id="lupa" src="img/lupa.png" alt="lupa">
                    <input name='termo' type="text" placeholder=" O que você precisa?" class="ask">
                </form>
            </div>
            <div class="buy">
            <a href="carrinho.php"><input type="image" id="carrinho" src="img/carrinho.png" alt="">
            </div>
            <?php
            if (!isset($_SESSION["usuario_id"])) {
                echo    "<div class='logarConta'>";
                echo    "<a href='logar.php'>Logar</a>";
                echo    "</div>";
             }
            if (isset($_SESSION["usuario_id"])) {
                echo    "<div class='logout'>";
                echo    "<a href='logout.php'>Sair</a>";
                echo    "</div>";
            }
            ?>
            <div class="nav-username">
                <!-- Aqui você pode exibir o nome de usuário -->
                <?php
                if (isset($_SESSION['funcionario_nome'])) {
                    echo $_SESSION['funcionario_nome'];
                } else {
                    // Se o nome de usuário não estiver na sessão, você deve recuperá-lo do banco de dados aqui
                    include 'conexao.php'; // Certifique-se de incluir o arquivo de conexão
                
                    // Faça uma consulta para obter o nome de usuário com base no usuário logado
                
                    // Substitua esta linha pela sua consulta SQL
                    $sql = "SELECT funcionario_nome FROM funcionario WHERE funcionario_id = {$_SESSION['usuario_id']}";
                
                    $resultado = $mysqli->query($sql); // Execute a consulta
                
                    if ($resultado && $resultado->num_rows > 0) {
                        $row = $resultado->fetch_assoc();
                        echo "<p class='user'>" . $row['funcionario_nome'] . "</p>";
                    } else {
                        echo "Nome de usuário não encontrado";
                    }
                }
                ?>
            </div>
            
            <a class="navbar-logo" href="main.php">
                <img src="img/logo1.png" alt="Logo IntenseStreet" description="Logo IntenseStreet" id="logo1">
            </a>
        </nav>
    </header>
   <main> 
   <div class="cart-container">
        <h2>Carrinho de Compras</h2>

        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui você pode usar PHP para exibir os itens do carrinho -->
                <!-- ?php
                    // Substitua isso com a lógica para recuperar itens do carrinho do banco de dados
                    $cartItems = [
                        ['product_name' => 'Produto 1', 'quantity' => 2, 'price' => 19.99],
                        ['product_name' => 'Produto 2', 'quantity' => 1, 'price' => 29.99]
                    ];

                    foreach ($cartItems as $item) {
                        echo "<tr>";
                        echo "<td>{$item['product_name']}</td>";
                        echo "<td>{$item['quantity']}</td>";
                        echo "<td>\${$item['price']}</td>";
                        echo "<td>\${$item['quantity'] * $item['price']}</td>";
                        echo "</tr>";
                    }
                ?> -->
            </tbody>
        </table>

        <div class="total">
           <p>Total do Carrinho: $ <!--?php echo calcularTotal($cartItems); ?>--></p>
        </div>
    </div>
   
   </main>
    <!-- Início do Rodapé -->
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Serviços</h3>
                        <ul>
                            <li><a href="#">Compras</a></li>
                            <li><a href="#">Entrega</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Sobre</h3>
                        <ul>
                            <li><a href="#">Companhia</a></li>
                            <li><a href="#">Quem Somos nós?</a></li>
                            <li><a href="#">Politica</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3></h3>
                        <ul>
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<script src="js/homep.js" async></script>
<script src="js/main.js" defer></script>
</body>

</html>