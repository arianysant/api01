<?php
header("Refresh: 5; url=../html/index.html");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404 - Página não encontrada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f8f8;
            color: #333;
            padding: 50px;
        }

        h1 {
            font-size: 48px;
            color: #e74c3c;
        }

        p {
            font-size: 18px;
        }

        .redirect {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h1>Erro 404</h1>
    <p>A página que você está tentando acessar não foi encontrada.</p>
    <p class="redirect">Você será redirecionado para a tela de login em <span id="countdown">5</span> segundos...</p>

    <script>
        // Função para contar o tempo até o redirecionamento
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');

        setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown === 0) {
                window.location.href = '../html/index.html'; // Redireciona para a página de login
            }
        }, 1000);
    </script>

</body>

</html>
