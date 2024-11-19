<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotina - Criança</title>
    <style>
        /* Estilos gerais do corpo */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #80d0ff, #ffcccb); /* Fundo animado e chamativo */
            height: 100vh;
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        /* Animação de fundo */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Contêiner principal */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Título */
        h1 {
            text-align: center;
            color: #007bff;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        /* Estilo do botão */
        button {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
                border: 0;
                width: 100%;
                display: block;
                overflow-x: auto;
            }

            th, td {
                padding: 8px;
            }

            .container {
                width: 95%;
            }

            h1 {
                font-size: 24px;
            }
        }

        .imagem-personagem {
            width: 100%;
            max-width: 250px;
            display: block;
            margin: 30px auto;
            border-radius: 10px;
            animation: flutuar 3s ease-in-out infinite;
        }

        @keyframes flutuar {
            0% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Tabela de Rotina</h1>

        <!-- Tabela de rotina -->
        <table id="tabela-rotina">
            <thead>
                <tr>
                    <th>Horário</th>
                    <th>Data</th>
                    <th>Comentário</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de dados na tabela -->
                <tr>
                    <td>08:00</td>
                    <td>18/11/2024</td>
                    <td>Teste</td>
                </tr>
                <tr>
                    <td>12:00</td>
                    <td>18/11/2024</td>
                    <td>Teste</td>
                </tr>
            </tbody>
        </table>

        <!-- Botão de Voltar -->
        <div style="text-align: center; margin-top: 20px;">
            <button onclick="window.history.back();">Voltar</button>
        </div>
    </div>

    <!-- Imagem do personagem abaixo da tabela -->
    <img src="mia_animada.png" alt="Personagem" class="imagem-personagem">

</body>

</html>
