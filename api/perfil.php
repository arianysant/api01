<?php
session_start();
include('../config_serv/conexao.php');

if (!isset($_SESSION['id'])) {
    echo json_encode(["status" => "erro", "mensagem" => "Você precisa estar logado para atualizar o perfil."]);
    exit();
}

$conn->set_charset("utf8mb4");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['idade'], $_POST['email'], $_POST['suporte'], $_POST['info'])) {

    $responsavel_id = $_SESSION['id'];

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $suporte = $_POST['suporte'];
    $info = $_POST['info'];  
    $stmt = $conn->prepare("SELECT id_crianca FROM crianca WHERE responsavel_id = ? LIMIT 1");
    $stmt->bind_param("i", $responsavel_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $crianca = $result->fetch_assoc();
        $id_crianca = $crianca['id_crianca'];
        $stmt = $conn->prepare("UPDATE crianca SET nome = ?, idade = ?, nivel_de_suporte = ?, email = ?, info = ? WHERE id_crianca = ? AND responsavel_id = ?");
        $stmt->bind_param("sisssii", $nome, $idade, $suporte, $email, $info, $id_crianca, $responsavel_id);


        if ($stmt->execute()) {
            echo json_encode(["status" => "sucesso", "mensagem" => "Perfil atualizado com sucesso."]);
            header('location: ../php/pais.php');
        } else {
            echo json_encode(["status" => "erro", "mensagem" => "Erro ao atualizar perfil."]);
        }
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Nenhuma criança encontrada para este responsável."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "erro", "mensagem" => "Dados insuficientes."]);
}

$conn->close();
?>