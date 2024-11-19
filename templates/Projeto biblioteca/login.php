

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/templates/imagem/abra-o-livro.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <section>
        <form action="login.php" method="POST" id="fundo"> <!-- Atualizado para enviar para login.php -->
            <header>
                <h1>Login</h1>
            </header>

            <div class="inputbox">
                <input type="email" name="email" id="email" required placeholder="Digite o seu email" class="input">
            </div>

            <div class="inputbox">
                <input type="password" name="senha" id="senha" required placeholder="Digite a sua senha" class="input">
            </div>

            <div class="botao">
                <input type="submit" value="Logar" class="logar">
            </div>

            <div id="Cadastro">
                <label for="">Se você não tem uma conta, <a href="Cadastro.html">Cadastre-se</a></label>
            </div>
        </form>
    </section>
</body>
</html>