<<<<<<< HEAD
<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
    header('location: logar.php');
    exit();
}
?>
=======
>>>>>>> bba90eac6e2ac3d63ccb5014e09f4a1b0a002a81
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    
    <title>IntenseStreet</title>
</head>

<body>
<<<<<<< HEAD
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
                        <li><a href="modelo.php">Vestuário</a></li>
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
                echo "<div class='logarConta'>";
                echo "<a href='logar.php'>Logar</a>";
                echo "</div>";
            }
            if (isset($_SESSION["usuario_id"])) {
                echo "<div class='logout'>";
                echo "<a href='logout.php'>Sair</a>";
                echo "</div>";
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
            <a class="navbar-logo" href="index.php">
                <img src="img/logo1.png" alt="Logo IntenseStreet" description="Logo IntenseStreet" id="logo1">
            </a>
        </nav>
    </header>
    <main>
        <div class="barra">
=======
    <div class="content">
        <div class="logo">
            <img id="id-img" src="img/logo1.png">
        </div>
        <div class="login">
        <form method="post" action="login.php">
            <div class="form">
                <label for="nome_login" id="nome_label">Usuário</label> <br>
                <input id="nome_login" name="nome_login" required="required" type="text"
                    placeholder="Usuário de cadastro" />

            </div>
            <div class="form">
                <label for="senha_login">Senha</label> <br>
                <input id="senha_login" name="senha_login" required="required" type="password"
                    placeholder="Digite sua senha" />

            </div>

            <a class="cadastro" href="redefinicao.php">Esqueceu sua senha?
                 Clique aqui!</a>

>>>>>>> bba90eac6e2ac3d63ccb5014e09f4a1b0a002a81
            <div id="linhas">
                <div class="line"></div>
            </div>
            <div>
                <input id="botao_login" type="submit" value="Logar">
            </div>
            <a class="cadastro" href="cadastro.php">Não tem uma conta?
                 Clique aqui!</a>
                    
                </form>
            </div> 
        </div>
<<<<<<< HEAD

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
                            <li><a href="https://www.facebook.com/senaitaubate/?locale=pt_BR"><i
                                        class="icon ion-social-facebook"></i></a></li>
                            <li><a href="https://twitter.com/senai_taubate"><i class="icon ion-social-twitter"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/senaitaubate/"><i
                                        class="icon ion-social-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
=======
>>>>>>> bba90eac6e2ac3d63ccb5014e09f4a1b0a002a81
    </div>
    <footer>
        
    </footer>
</body>

</html>