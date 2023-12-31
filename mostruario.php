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
                            <li><a href="main.php">Página Inicial</a></li>
                            <li><a href="main.php">Calçados</a></li>
                            <li><a href="main.php">Acessórios</a></li>
                            <li><a href="main.php">Vestuário</a></li>
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
                    <a href=""><input type="image" id="carrinho" src="img/carrinho.png" alt="" onclick="abrirModalCarrinho()">
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
            
                <a class="navbar-logo" href="main.php">
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
                $tenis_id = $_GET['id'];
                $sql = "SELECT * FROM tenis WHERE tenis_id = '$tenis_id'";
                $resultado = $mysqli->query($sql);

                if ($resultado) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<div class='desc_produto'>";
                        echo "<div class='principal'>";
                        echo "<img class='img2' src='" . $row["tenis_img"] . "'>";
                        echo "</div>";
                        echo "<div class='descricao'>";
                        echo "<div class='nome'>";
                        echo "<h3>" . $row["tenis_modelo"] . "</h3>";
                        echo "</div>";
                        echo "<div class='cor'>";
                        echo "<label for='cor'>Cor:</label>";
                        echo "<p class='desc'>" . $row["tenis_cor"] . "</p>";
                        echo "</div>";
                        echo "<div class='cor'>";
                        echo "<label for='tamanho'>Tamanho:</label>";
                        echo "<p class='desc'>" . $row["tenis_tamanho"] . "</p>";
                        echo "</div>";
                        echo "<div class='cor'>";
                        echo "<p class='price'>R$" . $row["tenis_preco"] . "</p>";
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
                        echo "<button id='botao-add' onclick='addToCart(". $row["tenis_modelo"] .")'>COMPRAR AGORA</button>";
                        echo "<input type='button' value='Adicionar ao carrinho' id='botao-add' data-nome=". $row['tenis_modelo'] ." data-preco=". $row['tenis_preco']." data-imagem=". $row["tenis_img"].">";                 
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
                </div>
            </footer>
        </div>


        <script src="js/homep.js" async></script>
        <script src="js/main.js" defer></script>
        <script src="js/carrinho.js" defer></script>
    </body>

    </html>