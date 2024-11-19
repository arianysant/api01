<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotina - Pais</title>
    <style>
        /* Estilos globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #00bfff, #1e90ff, #87cefa);
            background-size: 300% 300%;
            animation: backgroundAnimation 10s ease infinite;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            max-width: 900px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        /* Tabela */
        .tabela {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .tabela th,
        .tabela td {
            padding: 12px;
            text-align: center;
            font-size: 1.1em;
        }

        .tabela th {
            background-color: #1E90FF;
            color: white;
        }

        .tabela td {
            background-color: #ADD8E6;
            border: 1px solid #ddd;
        }

        .tabela input,
        .tabela textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: none;
            background-color: #e8f0fe;
            font-size: 1em;
        }

        textarea {
            height: 60px;
        }

        button {
            background-color: #1E90FF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            margin-top: 20px;
        }

        button:hover {
            background-color: #4682B4;
        }

        /* Animação de fundo */
        @keyframes backgroundAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Botão voltar */
        .btn-voltar {
            background-color: transparent;
            color: #fff;
            border: 2px solid #fff;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 1.2em;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-voltar:hover {
            background-color: #1E90FF;
            border-color: #1E90FF;
        }

        /* Responsividade */
        @media screen and (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 1.8em;
            }

            .tabela th,
            .tabela td {
                padding: 8px;
                font-size: 1em;
            }

            .tabela input,
            .tabela textarea {
                font-size: 0.9em;
                padding: 8px;
            }

            button {
                width: 100%;
                padding: 12px;
                font-size: 1.1em;
            }

            .btn-voltar {
                width: 100%;
                padding: 12px;
                font-size: 1em;
            }
        }

        /* Responsividade para dispositivos menores (celulares) */
        @media screen and (max-width: 480px) {
            h1 {
                font-size: 1.6em;
            }

            .container {
                padding: 10px;
            }

            .tabela th,
            .tabela td {
                font-size: 0.9em;
                padding: 6px;
            }

            .tabela input,
            .tabela textarea {
                font-size: 0.8em;
                padding: 6px;
            }

            button {
                width: 100%;
                padding: 14px;
                font-size: 1em;
            }

            .btn-voltar {
                width: 100%;
                padding: 14px;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Adicionar Rotina</h1>
        <form action="#" method="POST">
            <table class="tabela">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Comentário</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" name="data" required></td>
                        <td><input type="time" name="horario" required></td>
                        <td><textarea name="comentario" placeholder="Escreva um comentário" required></textarea></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">Adicionar</button>
        </form>
        <button class="btn-voltar" onclick="window.history.back()">Voltar</button>
    </div>
</body>

</html>
