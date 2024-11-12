<?php 
header("Content-Type: application/json");
session_start();
include_once("../config_serv/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lógica de cadastro
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verificar se o e-mail já existe
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "E-mail já cadastrado!"]);
    } else {
        // Inserir novo usuário
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);

        if ($stmt->execute()) {
            // Redirecionar para index.html após o cadastro bem-sucedido
            // echo json_encode(["status" => "success", "message" => "Cadastro realizado com sucesso!"]);
            header("Location: ../html/index.html");
            exit();
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao cadastrar usuário!"]);
        }
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método não permitido"]);
}

$conn->close();
?>
