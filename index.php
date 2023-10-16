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
                            <a class="nav-link" href="main.php" onclick="">Páginal Inicial</a>
                        </li>
                        <li><select name="departamentos" id="departamentos" onchange="redirectToPage(this)">
                                <option value="" disabled selected hidden>Departamentos</option>
                                <option value="calcados">Calçados</option>
                                <option value="acessorios">Acessórios</option>
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
            <form class="formss" action="pesquisa.php" method="get">
                 <input type="image" id="lupa" src="img/lupa.png" alt="lupa">
                 <input type="text" placeholder="   O que você precisa?" class="ask">
            </form>
            </div>
            <div class="buy">
                <img id="carrinho" src="img/carrinho.png" alt="">
            </div>
            <div class="logarConta">
                <a href="logar.php">Logar</a>
            </div>
            <a class="navbar-logo" href="index.php">
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
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
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