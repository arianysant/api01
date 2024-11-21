<?php
session_start(); // Inicia a sessão

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: ../api/erro404.php"); // Redireciona para a página de erro ou login
    exit();
}

//echo "Bem-vindo, " . $_SESSION['nome'] . "!";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../chatbot/style.css">
    <title>Área Criança</title>
    <style>
        /* Estilos principais */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #00a2ff;
            overflow-x: hidden;
        }

        header {
            background-color: #66B9FA;
            padding: 10px;
            position: relative;
        }

        .logo {
            height: 40px;
            margin-left: 47%;
        }

        .scrollable-app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding-bottom: 30px;
        }

        .unit {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
            background-color: #e6e6e6;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
            margin-top: 10%;
        }

        .unit-info h3, .unit-info p {
            color: #000;
        }

        .progress-circle {
            background-color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #5f00ff;
            font-weight: bold;
        }

        footer {
            background-color: #66B9FA;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <a href="pais.php">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <img src="../img/autily azul claro.png" alt="Logo" class="logo">
    </header>

    <div class="scrollable-app">
        <main class="main-content">
            <div class="background-bubbles">
                <!-- Animações de bolhas no fundo -->
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
            </div>

           <?php
            // Aqui, chamamos o arquivo PHP que consulta as pontuações
           // include('../api/pontuacao_crianca.php');
            ?>

            <!-- Verifica se há pontuações e exibe -->
            <?php
             include('../api/pontuacao_crianca.php');
            if (isset($pontuacoes) && count($pontuacoes) > 0): ?>
                <div id="gameCardsContainer">
                    <?php foreach ($pontuacoes as $pontuacao): ?>
                        <div class="unit">
                            <div class="unit-info">
                                <h3>Jogo: <?= $pontuacao['id_jogo']; ?></h3>
                                <h4>Nome do Jogo:</h4>
                                <p><?= $pontuacao['nome_jogo']; ?></p>
                                <h4>Pontuação:</h4>
                                <p><?= $pontuacao['pontuacao']; ?>/15</p>
                                <h3>Evolução Atual:</h3>
                            </div>
                            <div class="progress-circle">
                                <p><?= number_format(($pontuacao['pontuacao'] / 15) * 100, 2); ?>%</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Não há pontuações disponíveis.</p>
            <?php endif; ?>
        </main>

        <footer>
            <p>&copy; 2024 Autily</p>
            <p>Desenvolvido por: Equipe Autily</p>
            <p>Contato: <a href="mailto:autilyy@gmail.com">autilyy@gmail.com</a></p>
        </footer>
    </div>
</body>

<script src="../chatbot/scripts.js"></script>
</html>
