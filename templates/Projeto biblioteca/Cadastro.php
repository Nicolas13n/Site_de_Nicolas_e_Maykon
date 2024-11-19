<?php 
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $mysqli->real_escape_string(trim($_POST['nome']));
    $email = $mysqli->real_escape_string(trim($_POST['email']));
    $senha = $mysqli->real_escape_string(trim($_POST['senha']));
    $confsenha = $_POST['confsenha'];

    // Verifica se o email já está cadastrado
    $verificaEmail = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $mysqli->query($verificaEmail);
    
    if ($resultado->num_rows > 0) {
        echo "Este email já está cadastrado.";
    } else {
        if ($senha != $confsenha) {
            echo "As senhas não batem.";
        } else {
            // Hash da senha para segurança
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // SQL para inserir os dados
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

            if ($mysqli->query($sql) === TRUE) {
                echo "Cadastro realizado com sucesso!";
                header('Location: index.php'); // Redireciona para a página inicial
                exit(); // Certifique-se de sair após o redirecionamento
            } else {
                echo "Erro: " . $sql . "<br>" . $mysqli->error;
            }
        }
    }
}

// Fecha a conexão
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/templates/imagem/abra-o-livro.png" type="image/x-icon">
    <link rel="stylesheet" href="Cadastro.css">

    <title>Cadastro</title>
</head>

<body>
    <section>
        <form action="" method="POST" id="fundo"> <!-- Adicionei method="POST" -->
            <header>
                <h1>Cadastro</h1>
            </header>
            <div class="inputbox">
                <input type="text" name="nome" id="nome" required placeholder="Digite o seu nome" class="input">
            </div>

            <div class="inputbox">
                <input type="email" name="email" id="email" required placeholder="Digite o seu email" class="input">
            </div>

            <div class="inputbox">
                <input type="password" name="senha" id="senha" required placeholder="Coloque sua senha" class="input">
            </div>

            <div class="inputbox">
                <input type="password" name="confsenha" id="confsenha" required placeholder="Confirme sua senha" class="input">
            </div>

            <div class="botao">
                <input type="submit" value="Cadastrar" class="logar"> <!-- Corrigi o valor do botão para "Cadastrar" -->
            </div>

            <div id="login">
                <label for="">Se você já tem <a href="login.html">Login</a></label>
            </div>
        </form>
    </section>
</body>

</html>