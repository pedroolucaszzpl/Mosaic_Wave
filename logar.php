<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    
    <title>IntenseStreet</title>
</head>

<body>
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
    </div>
    <footer>
        
    </footer>
</body>

</html>