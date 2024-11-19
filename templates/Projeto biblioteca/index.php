<?php
    include('conexao.php'); // Certifique-se de que isso está correto
    include('uploads.php');

    // Ajuste o nome das colunas conforme necessário
    $query = "SELECT id, imagem, descricao, valor FROM livros"; // Seleciona o id, imagem, descrição e valor
    $resultado = mysqli_query($mysqli, $query);

    // Verifica se houve erro na consulta
    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($mysqli));
    }

    // Armazena os livros em um array
    $livros = [];
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $livros[] = [
                'id' => $row['id'],
                'imagem' => base64_encode($row['imagem']),
                'descricao' => htmlspecialchars($row['descricao']),
                'valor' => number_format($row['valor'], 2, ',', '.')
            ];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteca</title>
</head>
<body>
    <header>
        <img src="livro.png" alt="">
        <h1>Biblioteca</h1>
        <ul>
            <a href="#">Contato</a>
            <a href="#">Quem somos?</a>
            <a href="#">Licença de uso</a>
        </ul>
    </header>
    <hr>
    <article>
        <main>
            <div class="estante-de-livros">
                <?php
                    // Verifica se há livros e os exibe nas divs individuais
                    for ($i = 0; $i < 15; $i++) {
                        if (isset($livros[$i])) {
                            echo '<div class="livros' . ($i + 1) . '" id="livros">';
                            echo '<img src="data:image/jpeg;base64,' . $livros[$i]['imagem'] . '" alt="Livro" class="livro-imagem">';
                            echo '<p class="livro-descricao">' . $livros[$i]['descricao'] . '</p>';
                            echo '<p class="livro-valor">R$ ' . $livros[$i]['valor'] . '</p>'; // Formata o valor
                            
                            // Formulário para compra
                            echo '<form action="pagina_de_compra.php" method="POST">';
                            echo '<input type="hidden" name="livro_id" value="' . $livros[$i]['id'] . '">';
                            echo '<button type="submit" class="btn-comprar">Comprar</button>'; // Botão de compra
                            echo '</form>';
                            
                            echo '</div>';
                        } else {
                            // Se não houver livro, pode-se deixar a div vazia ou adicionar uma mensagem
                            echo '<div class="livros' . ($i + 1) . '" id="livros">';
                            echo '<p>Nenhum livro disponível.</p>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </main>
    </article>
</body>
</html>