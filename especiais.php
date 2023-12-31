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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!--Google Link Icon-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="./css/especial.css">
    <title>IntenseStreet Páginas Especial</title>
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
                echo "<div class='logout'>";
                echo "<a href='index.php'>Logar</a>";
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
            <a class="navbar-logo" href="inicial.php">
                <img src="img/logo1.png" alt="Logo IntenseStreet" description="Logo IntenseStreet" id="logo1">
            </a>
        </nav>
    </header>
    <main>
        <div class="espedition">
            <div class="barra">
                <div id="linhas">
                    <div class="line"></div>
                    <div class="pag">
                        <p>EDIÇÕES ESPECIAIS</p>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
            <div class="sePurple">

                <?php
                if (isset($_SESSION['permissao'])) {
                    echo '<form method="post" class="adicionar" action="./adicionar/formadd_camisa.php">';
                    echo '<input type="submit" class="add" value="Inserir Item"></input>';
                    echo '</form>';
                }
                ?>

            <?php
            if (isset($_SESSION['permissao'])) {
            echo '<form method="post" class="adicionar" action="./adicionar/formadd_tenis.php">';
            echo  '<input type="submit" class="add" value="Inserir Item"></input>';
            echo '</form>';
            }
            ?>

            </div>
            <div class="calcous">
                <img src="img/edicaoesp/ous/ous.png" alt="">
                <p>Calçados</p>
                <div class="linep"></div>
            </div>
            <div class="ous">
                <?php
                include 'conexao.php';
                // Faça a consulta SQL
                $sql = "SELECT * FROM tenis WHERE tenis_cat = 'especial' LIMIT 5";
                $resultado = $mysqli->query($sql); // $mysqli é o objeto da conexão
                
                // Verifique se a consulta foi bem-sucedida
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<div class= 'all'>";
                            echo "<a href='mostruario.php?id=" . $row['tenis_id'] . "'>";
                            echo "<div class= 'tenisous'>";
                            echo "<img src='" . $row["tenis_img"] . "'>";
                            echo "<div class='linhazinha'></div>";
                            echo "<p class='name'>" . $row["tenis_modelo"] . "</p>";
                            echo "<p class='price'>R$" . $row["tenis_preco"] . "</p>";
                            echo "</div>";
                            echo "</a>";
                            if (isset($_SESSION['permissao'])) {
                                echo "<div class='exclude'>";
                                echo "<form method='POST' action='excluir/excluir_calc.php'>";
                                echo "<input type='hidden' name='tenis_id' value='" . $row['tenis_id'] . "'>";
                                echo "<button class='excluir_btn' type='submit' data-item-id=" . $row['tenis_id'] . ">Excluir</button>";
                                echo "</form>";
                                echo "<a class='editar_btn' href='update/update_tenis.php?tenis_id=" . $row['tenis_id'] . "'>Editar</a>";
                                echo "</div>";
                            }
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
            <div class="secGreen">

                <?php
                if (isset($_SESSION['permissao'])) {
                    echo '<form method="post" class="adicionar" action="./adicionar/formadd_camisa.php">';
                    echo '<input type="submit" class="add" value="Inserir Item"></input>';
                    echo '</form>';
                }
                ?>
            </div>
            <div class="camibaw">
                <img src="img/edicaoesp/baw/baw.png" alt="">
                <p>Camisetas</p>
                <div class="linep"></div>
            </div>
            <div class="baw">
                <?php
                //session_start();
                include 'conexao.php';
                // Faça a consulta SQL
                $sql = "SELECT * FROM camisetas WHERE camiseta_cat = 'especial' LIMIT 5";
                $resultado = $mysqli->query($sql); // $mysqli é o objeto da conexão
                
                // Verifique se a consulta foi bem-sucedida
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<div class='all'>";
                            echo "<a href='mostruario_camiseta.php?id=" . $row['camiseta_id'] . "'>";
                            echo '<div class="camisabaw">';
                            echo "<img src='" . $row["camiseta_img"] . "'>";
                            echo "<div class='linhazinha'></div>";
                            echo "<p class='name'>" . $row["camiseta_modelo"] . "</p>";
                            echo "<p class='price'>R$" . $row["camiseta_preco"] . "</p>";
                            echo "</div>";
                            echo "</a>";
                            if (isset($_SESSION['permissao'])) {
                                echo "<div class='exclude'>";
                                echo "<form method='POST' action='excluir/excluir_camisa.php'>";
                                echo "<input type='hidden' name='camiseta_id' value='" . $row['camiseta_id'] . "'>";
                                echo "<button class='excluir_btn' data-item-id=" . $row['camiseta_id'] . ">Excluir</button>";
                                echo "</form>";
                                echo "<a class='editar_btn' href='update/update_cami.php?camiseta_id=" . $row['camiseta_id'] . "'>Editar</a>";
                                echo "</div>";
                            }
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
    </div>
    <script src="js/main.js"></script>
    <script>
        // Adicione este script no final do seu arquivo PHP, antes do fechamento da tag </body>
        document.addEventListener('DOMContentLoaded', function () {
            const excluirBtns = document.querySelectorAll('.excluir_btn');

            excluirBtns.forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.preventDefault(); // Impede o envio do formulário automaticamente

                    if (confirm('Tem certeza que deseja excluir o item?')) {
                        // Se o usuário confirmar, envie o formulário
                        btn.closest('form').submit();
                    }
                });
            });
        });
    </script>
</body>

</html>