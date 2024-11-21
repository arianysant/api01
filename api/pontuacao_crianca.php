<?php


include('../config_serv/conexao.php');

$conn->set_charset("utf8mb4");

// Verifica se o id_usuario está na sessão
if (!isset($_SESSION['id'])) {
    echo json_encode(["erro" => "Usuário não autenticado."]);
    exit();
}

$id_usuario = $_SESSION['id']; // Obtemos o id do usuário logado

// Verifica se o id_usuario é válido (ele deve ser um número positivo)
if ($id_usuario <= 0) {
    echo json_encode(["erro" => "ID inválido de usuário."]);
    exit();
}

// Inicializa a variável pontuacoes como um array vazio
$pontuacoes = [];

// Prepara a consulta SQL para evitar SQL injection
$query = "SELECT p.id_jogo, j.nome_jogo, p.pontuacao 
          FROM pontuacoes p
          INNER JOIN jogos j ON p.id_jogo = j.id_jogo
          INNER JOIN crianca c ON p.id_crianca = c.id_crianca
          WHERE c.responsavel_id = ? AND p.id_crianca = c.id_crianca";

if ($stmt = $conn->prepare($query)) {
    // Associa o parâmetro e executa a consulta
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    
    // Obtém o resultado
    $result = $stmt->get_result();

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Cria um array para armazenar os resultados
        while ($row = $result->fetch_assoc()) {
            $pontuacoes[] = [
                'id_jogo' => $row['id_jogo'],
                'nome_jogo' => $row['nome_jogo'],
                'pontuacao' => $row['pontuacao']
            ];
        }

        // Retorna as pontuações em formato JSON
        echo json_encode(["pontuacoes" => $pontuacoes]);
    } else {
        // Caso não haja pontuações, retorna um erro
        echo json_encode(["erro" => "Nenhuma pontuação encontrada para essa criança."]);
    }

    // Fecha a declaração
    $stmt->close();
} else {
    echo json_encode(["erro" => "Erro ao preparar a consulta."]);
}

$conn->close(); // Fecha a conexão com o banco de dados
?>
