<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vestuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /><!--Google Link Icon-->
    <title>IntenseStreet</title>
</head>
<body>
<header>
        <nav class="navbar">
            <div class="contentHead">
                <div class="navbar-menu">
                    <ul class="navbar-items">
                        <li class="navbar-items-menu">
                            <a class="nav-link" href="index.php" onclick="">Páginal Inicial</a>
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
                        <li><a href="vestuario.php">Calçados</a></li>
                        <li><a href="vestuario.php">Acessórios</a></li>
                        <li><a href="vestuario.php">Vestuário</a></li>
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
                <img id="carrinho" src="img/carrinho.png" alt="">
            </div>
            <a class="navbar-logo" href="index.php">
                <img src="img/logo1.png" alt="Logo IntenseStreet" description="Logo IntenseStreet" id="logo1">
            </a>
        </nav>
    </header>
    <main>
        <div class="model">
            <div class="barra">
                <div id="linhas">
                    <div class="line"></div>
                    <p class="pag">Vestuário</p>
                    <div class="line"></div>
                </div>
            </div>
            <div class="clothes">
            <?php
                include 'conexao.php';
                // Faça a consulta SQL
                $sql = "SELECT * FROM vestuario WHERE vestuario_cat = 'normal' LIMIT 4" ;
                $resultado = $mysqli->query($sql); // $mysqli é o objeto da conexão
                
                // Verifique se a consulta foi bem-sucedida
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo '<div class="sweater">';
                            echo "<img src='" . $row["vestuario_img"] . "'>";
                            echo "<p class='desc'>" . $row["vestuario_modelo"] . "</p>";
                            echo "<p class='price'>R$" . $row["vestuario_preco"] . "</p>";
                            echo "<a class='excluir_btn' href='excluir_vest.php?vestuario_id=".$row['vestuario_id']."'>Excluir</a>";
                            echo "<a class='editar_btn' href='update/update_vest.php?vestuario_id=".$row['vestuario_id']."'>Editar</a>";
                            echo "</div>";

                        }

                    } else {
                        echo "Nenhum resultado encontrado.";
                    }
                } else {
                    die("Erro na consulta: " . $mysqli->error);
                }
               
                ?>
            </div>
        </div>
        <div class="model">
            <div class="barra">
                <div id="linhas">
                    <div class="line"></div>
                    <p class="pag">Acessórios</p>
                    <div class="line"></div>
                </div>
            </div>
            <div class="clothes">
            <?php
                include 'conexao.php';
                // Faça a consulta SQL
                $sql = "SELECT * FROM acessorios WHERE acessorio_cat = 'normal' LIMIT 4";
                $resultado = $mysqli->query($sql); // $mysqli é o objeto da conexão
                
                // Verifique se a consulta foi bem-sucedida
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo '<div class="sweater">';
                            echo "<img src='" . $row["acessorio_img"] . "'>";
                            echo "<p class='desc'>" . $row["acessorio_modelo"] . "</p>";
                            echo "<p class='price'>R$" . $row["acessorio_preco"] . "</p>";
                            echo "<a class='excluir_btn' href='excluir_aces.php?acessorio_id=".$row['acessorio_id']."'>Excluir</a>";
                            echo "<a class='editar_btn' href='update/update_aces.php?acessorio_id=".$row['acessorio_id']."'>Editar</a>";
                            echo "</div>";

                        }

                    } else {
                        echo "Nenhum resultado encontrado.";
                    }
                } else {
                    die("Erro na consulta: " . $mysqli->error);
                }
               
                ?>
                <div class="sweater">
                </div>
                <div class="shirt">
                </div>
                <div class="sweater">
                </div>
            </div>
        </div>
        <div class="model">
            <div class="barra">
                <div id="linhas">
                    <div class="line"></div>
                    <p class="pag">Calçados</p>
                    <div class="line"></div>
                </div>
            </div>
            <div class="clothes">
            <?php
                include 'conexao.php';
                // Faça a consulta SQL
                $sql = "SELECT * FROM tenis WHERE tenis_cat = 'normal' LIMIT 4";
                $resultado = $mysqli->query($sql); // $mysqli é o objeto da conexão
                
                // Verifique se a consulta foi bem-sucedida
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo '<div class="sweater">';
                            echo "<img src='" . $row["tenis_img"] . "'>";
                            echo "<p class='desc'>" . $row["tenis_modelo"] . "</p>";
                            echo "<p class='price'>R$" . $row["tenis_preco"] . "</p>";
                            echo "<a class='excluir_btn' href='excluir_calc.php?tenis_id=".$row['tenis_id']."'>Excluir</a>";
                            echo "<a class='editar_btn' href='update/update_tenis.php?tenis_id=".$row['tenis_id']."'>Editar</a>";
                            echo "</div>";

                        }

                    } else {
                        echo "Nenhum resultado encontrado.";
                    }
                } else {
                    die("Erro na consulta: " . $mysqli->error);
                }
                ?>
                <div class="sweater">
                   
                </div>
                <div class="shirt">
                    
                </div>
                <div class="sweater">
                   
                </div>
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
    <script src="js/main.js" defer></script>
</body>
</html>