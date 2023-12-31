<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
     header('location: index.php');
     exit ();
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!--Google Link Icon-->
    <link rel="stylesheet" href="css/teste.css">
    <title>IntenseStreet Mostruario Acessorio</title>
</head>


<body>
    <header>
        <nav class="navbar">
            <div class="contentHead">
                <div class="navbar-menu">
                    <ul class="navbar-items">
                        <li class="navbar-items-menu">
                            <a class="nav-link" href="inicial.php" onclick="">Páginal Inicial</a>
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
                        <li><a href="inicial.php">Página Inicial</a></li>
                        <li><a href="modelo.php">Calçados</a></li>
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
                echo    "<a href='index.php'>Logar</a>";
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
            <a class="navbar-logo" href="inicial.php">
                <img src="img/logo1.png" alt="Logo IntenseStreet" description="Logo IntenseStreet" id="logo1">
            </a>
        </nav>
    </header>
    <main>
        <div class="barra">
            <div id="linhas">
                <div class="line"></div>
                <p class="pag">DESCRIÇÃO</p>
                <div class="line"></div>
            </div>
        </div>
            <?php
            include 'conexao.php';
            $camiseta_id = $_GET['id'];
            $sql = "SELECT * FROM camisetas WHERE camiseta_id = '$camiseta_id'";
            $resultado = $mysqli->query($sql);

            if ($resultado) {
                //          if ($resultado->num_rows() > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    echo "<div class='desc_produto'>";
                    echo "<div class='principal'>";
                    echo "<img class='img2' src='" . $row["camiseta_img"] . "'>";
                    echo "</div>";
                    echo "<div class='descricao'>";
                    echo "<div class='nome'>";
                    echo "<h3>" . $row["camiseta_modelo"] . "</h3>";
                    echo "</div>";
                    echo "<div class='cor'>";
                    echo "<label for='cor'>Cor:</label>";
                    echo "<p class='desc'>" . $row["camiseta_cor"] . "</p>";
                    echo "</div>";
                    echo "<div class='cor'>";
                    echo "<label for='tamanho'>Tamanho:</label>";
                    echo "<p class='desc'>" . $row["camiseta_tamanho"] . "</p>";
                    echo "</div>";
                    echo "<div class='cor'>";
                    echo "<p class='price'>R$" . $row["camiseta_preco"] . "</p>";
                    echo "</div>";
                    echo "<div class='pagamento'>";
                    echo "<label for='pagamento'>Forma de Pagamento:</label>";
                    echo "<select id='pagamento'>";
                    echo "<option value='credito'>Cartão de Crédito</option>";
                    echo "<option value='boleto'>Boleto</option>";
                    echo "<option value='Pix'>Pix</option>";
                    echo "</select>";
                    echo "</div>";
                    echo "<div class='botoes-mostruario'>";
                    echo "<button id='botao-add'>COMPRAR AGORA</button>";
                    echo "<button id='botao-add'>ADICIONAR AO CARRINHO</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            //    }
            ?>
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