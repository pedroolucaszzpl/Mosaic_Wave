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
    <link rel="stylesheet" href="css/main.css">
    <title>IntenseStreet HomePage</title>
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
                <p class="pag">IntenseStreet</p>
                <div class="line"></div>
            </div>
        </div>
        <div class="slide first">
            <section class="galery">
                <div class="fotos">
                    <img src="img/homepage/1.png" alt="slide1">
                    <img src="img/homepage/2.png" alt="slide2">
                    <img src="img/homepage/4.png" alt="slide3">
                    <img src="img/homepage/3.png" alt="slide4">
                </div>
            </section>
        </div>
        <div class="slidesec">
            <section class="galery">
                <div class="fotos">
                    <img src="img/homepage/1response.png" alt="slide1">
                    <img src="img/homepage/2response.png" alt="slide2">
                    <img src="img/homepage/4response.png" alt="slide3">
                    <img src="img/homepage/3response.png" alt="slide4">
                </div>
            </section>
        </div>
        <div class="marcas">
            <div class="barra">
                <div id="linhas">
                    <div class="line"></div>
                    <p class="pag">Marcas</p>
                    <div class="line"></div>
                </div>
            </div>
            <div class="brandimg">
                <div class="b1">
                    <div class="brand br1"><a href="https://www.adidas.com.br/"><img class="gren"
                                src="img/homepage/adidas (1).png" alt=""></a></div>
                    <p>Adidas</p>
                </div>
                <div class="b1">
                    <div class="brand br2"><a href="https://www.ous.com.br/"><img class="purpl"
                                src="img/homepage/ous.png" alt=""></a></div>
                    <p>OUS</p>
                </div>
                <div class="b1">
                    <div class="brand br3"><a
                            href="https://www.bawclothing.com.br/baw/acessorios?order=OrderByReleaseDateDESC"><img
                                class="gren" src="img/homepage/baw.png" alt=""></a></div>
                    <p>BAW</p>
                </div>
                <div class="b1">
                    <div class="brand br4"><a href="https://www.nike.com.br/"><img class="purpl"
                                src="img/homepage/nike.png" alt=""></a></div>
                    <p>Nike</p>
                </div>

            </div>
        </div>

        <div>

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
                            <li><a href="https://www.facebook.com/senaitaubate/?locale=pt_BR"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="https://x.com/senai_taubate?s=20"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/senaitaubate/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><i class="icon ion-social-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js" defer></script>
</body>

</html>