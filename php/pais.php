<?php
session_start(); // Inicia a sessão
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['id'])) {
    header("Location: ../api/erro404.php");
    exit();
}

//echo "Bem-vindo, " . $_SESSION['nome'] . "!";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../chatbot/style.css">
    <title>Área Pais</title>

</head>

<body>


    <!-- Botão Flutuante -->
    <button id="floatButton" class="float-button">
        <img src="../chatbot/testeia.png.png" alt="Assistente" class="float-image">
    </button>

    <!-- Janela do Chat -->
    <div id="chatbox" class="chatbox hidden">
        <div id="chat-header" class="chat-header">
            <img src="../chatbot/50px2.png" alt="">
            <span>MIA</span>
            <button id="closeButton" class="close-button">&times;</button>
        </div>
        <div id="messages" class="messages"></div>
        <div id="options" class="options"></div>
    </div>



    <header>
        <img src="../img/autily azul claro.png" alt="Logo" class="logo">
        <div class="menu-container">
            <i class="fas fa-bars" id="menu-icon" style="font-size: 30px; color: white; cursor: pointer;"></i>
            <div class="dropdown" id="dropdown-menu">
                <a href="perfilP.php">Perfil</a>
                <a href="#" onclick="showPage('ajuda')">Ajuda</a>
                <a href="../api/logout.php">ir para área criança</a>
                <a href="../api/logout.php">Sair</a>
            </div>
        </div>
    </header>

    <div class="scrollable-app">
        <main class="main-content">
            <div class="background-bubbles">
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

            <div class="container">
                <div class="image-section">
                    <img src="../img/ia (1).png" alt="Nina">
                </div>
                <?php
                include('../config_serv/conexao.php');

                // Verifica se o usuário está logado
               // if (isset($_SESSION['id'])) {
                //    echo "Bem-vindo, " . $_SESSION['nome'] . " (ID: " . $_SESSION['id'] . ")!";
              //  } else {
                   // echo "Você não está logado.";
              //  }
                
                ?>
                <div class="text-section">
                    <h1>Bem-vindo Pais!</h1>

                    <p>Esta é a área dedicada aos pais. Aqui você pode adicionar rotinas pro seu filho(a), evolução, rede dre apoio e outros!</p>
                </div>

                <div class="menu-section">

                    <h1>Cadastrar Criança</h1>
                    <p>Cadastrar conta de sua Criança</p>
                    <a href="dados.php">
                        <button class="botao">Adicionar</button>
                    </a>
                </div>

                <div class="menu-section">
                    <img src="../img/rotinap.png" alt="Imagem de pintura" class="img-nova">
                    <h1>Rotina</h1>
                    <p>Monte a rotina personalizada do dia para o seu pequeno!</p>
                    <a href="rotinaP.html">
                        <button class="botao">Adicionar</button>
                    </a>
                </div>

                <div class="menu-section">
                    <img src="../img/evolução.png" alt="Imagem de pintura" class="img-nova">
                    <h1>Evolução</h1>
                    <p>Veja a evolução do seu pequeno!</p>
                    <a href="evolucao.php">
                        <button class="botao">Ver</button>
                    </a>
                </div>

                <div class="menu-section">
                    <img src="../img/apoio.png" alt="imagem com relogio" class="img-nova">
                    <h1>Rede de Apoio</h1>
                    <p>Faça parte da nossa rede de apoio!</p>
                    <a href="https://chat.whatsapp.com/KcNoj4RsE0a50VPkM1A3XY">
                        <button class="botao">Entrar</button>
                    </a>
                </div>

                <div class="menu-section">
                    <img src="../img/especialista.png" alt="imagem com relogio" class="img-nova">
                    <h1>Converse com uma especialista</h1>
                    <p>Faça parte da nossa rede de apoio!</p>
                    <button id="openModalBtn">Escolher Plano</button>
                    </a>
                </div>
            </div>

            <div id="modal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Assine um plano mensal com um especialista:</h2>
                    <ul>
                        <li>✔ Direito a 3 consultas mensais agendadas.</li>
                        <li>✔ Tire suas duvidas.</li>
                        <li>✔ Dicas para o cotidiano.</li>
                        <li>✔ Ajuda para compreender seu filho.</li>
                    </ul>

                    <div class="plans">
                        <div class="plan">
                            <h3>Padrão</h3>
                            <p>R$150,00</p>
                        </div>
                    </div>
                    <h4>Forma de pagamento:</h4>
                    <img src="../img/pix.PNG" alt="" class="pix">
                    <h4>11 93287-5510</h4>
                </div>
            </div>

            <div id="page-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div id="content">
                    <h2>Perfil</h2>
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select id="tipo" required>
                            <option value="pai">Pai</option>
                            <option value="responsavel">Responsável</option>
                        </select>
                    </div>
                    <form id="perfil-form">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="idade">Idade:</label>
                            <input type="number" id="idade" required>
                        </div>
                        <div class="form-group">
                            <label for="nivel-autismo">Nível do Autismo:</label>
                            <select id="nivel-autismo" required>
                                <option value="leve">Leve</option>
                                <option value="moderado">Moderado</option>
                                <option value="severo">Severo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email do responsável:</label>
                            <input type="email" id="email" required>
                        </div>

                        <div class="extra-info" id="extra-info-container">
                            <h2>Adicionar Informações Extras</h2>
                            <div class="form-group">
                                <input type="text" id="extra-info" placeholder="Digite aqui...">
                            </div>
                            <button class="add-info-btn" onclick="addExtraInfo()">+ Adicionar</button>

                            <ul id="info-list"></ul>
                        </div>
                        <div class="form-group">
                            <button type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer-space"></div>
            <p>&copy; 2024 Autily</p>
            <p>Desenvolvido por: Equipe Autily</p>
            <p>Contato: <a href="mailto:autilyy@gmail.com">autilyy@gmail.com</a></p>
        </footer>
    </div>

    <script>
        document.getElementById('menu-icon').onclick = function() {
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        };

        function showPage(page) {
            let content = '';
            if (page === 'perfil') {
                content = `
                    <h2>Perfil</h2>
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select id="tipo" required>
                            <option value="pai">Pai</option>
                            <option value="responsavel">Responsável</option>
                        </select>
                    </div>
                    <form id="perfil-form">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="idade">Idade:</label>
                            <input type="number" id="idade" required>
                        </div>
                        <div class="form-group">
                            <label for="nivel-autismo">Nível do Autismo:</label>
                            <select id="nivel-autismo" required>
                                <option value="leve">Leve</option>
                                <option value="moderado">Moderado</option>
                                <option value="severo">Severo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email do responsável:</label>
                            <input type="email" id="email" required>
                        </div>
                        <div class="extra-info" id="extra-info-container">
                            <h2>Adiconar Informações Extras</h2>
                            <div class="form-group">
                                <input type="text" id="extra-info" placeholder="Digite aqui...">
                            </div>
                            <button class="add-info-btn" onclick="addExtraInfo()">+ Adicionar</button>
                            <ul id="info-list"></ul> <!-- Lista para informações adicionais -->
                        </div>                   
                        <div class="form-group">
                            <button type="submit">Salvar</button>
                        </div>
                    </form>
                `;
            } else if (page === 'ajuda') {
                content = `
                    <h2 style="color: black; margin-bottom:20px;">Ajuda</h2>
                    <p style="color: black;">Bem-vindo à seção de ajuda do Autily!</p> 
                    <p style="color: black;">1. O autily tem como objetivo facilitar e auxiliar o seu cotidiano</p> 
                    <p style="color: black;">2. Ao clicar na rotina, voce vera a rotina do dia que seus pais ou responsaveis te deixaram!</p>
                    <p style="color: black;">3. Ao clicar nos Jogos o autily te dara varias opções de jogos, escolha o que mais te agrada e jogue a vontade!</p> 
                    <p style="color: black;">Para mais informações entrar em contato com a equipe autily pelo email abaixo:</p>
                `;
            }

            document.getElementById('content').innerHTML = content;

        // Adiciona a funcionalidade de salvar para o formulário
             if (page === 'perfil') {
        document.getElementById('perfil-form').onsubmit = function(event) {
        event.preventDefault();
                    alert('Perfil salvo com sucesso!');
                    closeModal();
        };
           }

            document.getElementById('page-content').style.display = 'block';
         }


        const modal = document.getElementById("modal");
        const btn = document.getElementById("openModalBtn");
        const span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Fechar o modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Fechar o modal ao clicar fora dele
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

 
</body>
<script src="../chatbot/scripts.js"></script>
</html>