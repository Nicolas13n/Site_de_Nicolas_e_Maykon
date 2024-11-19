<!-- Exibe mensagem de erro, se existir -->
<?php
            if (isset($_SESSION['erro']) && !empty($_SESSION['erro'])) {
                echo '<div class="error-message">' . $_SESSION['erro'] . '</div>';
                // Limpa a mensagem de erro após exibi-la
                unset($_SESSION['erro']);
            }
            ?>