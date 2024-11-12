<?php
header("Content-Type: application/json");
session_start();
include_once("../config/conexao.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
    
    error_log("Email recebido: " . $email);

    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    error_log("Resultados encontrados: " . $resultado->num_rows);

    if ($resultado->num_rows > 0) {
       
        echo json_encode(["status" => "success", "message" => "Email enviado para recuperação!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Email não cadastrado!"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método não permitido"]);
}

$conn->close();
?>
