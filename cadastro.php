<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class='content'>
        <div class= 'logo'>
            <img id= id-img src="img/logo1.png" >
        </div>
        <div class= "login">
            <form method="post" action="cadastrojs.php">
                <div class='form'>
                    <label for="nome">Nome:</label></br>
                    <input type="text" id="nome" name="funcionario_nome" required><br>
                </div>

                <div class='form'>
                    <label for="email">E-mail:</label> </br>
                    <input type="email" id="email" name="funcionario_email" required><br>
                </div>

                <div class='form'>
                    <label for="senha">Senha:</label></br>
                    <input type="password" id="senha" name="funcionario_senha" required><br>
                </div>

                <div class="form">
                    <label for="function">Função:</label>
                    <select class="function" name="funcionario_funcao" id="funcao">
                        <option value="cliente">Cliente</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>
                
                <div id="linhas">
                    <div class="line"></div>
                </div>
                
                <input id="botao_login" type="submit" value="Cadastrar">

            </form>
        </div>
    </div>
</body>
</html>