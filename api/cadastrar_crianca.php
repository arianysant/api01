<?php
session_start(); // Inicia a sessão

include_once('../config_serv/conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    echo "Você precisa estar logado para cadastrar uma criança.";
    exit();
}

$id_usuario = $_SESSION['id']; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'cadastro') {
    $nome = trim($_POST['nome']);
    $idade = (int)$_POST['idade'];
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    // Real escape para prevenir SQL injection
    $nome = $conn->real_escape_string($nome);
    $email = $conn->real_escape_string($email);
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    // Validação de campos obrigatórios
    if (empty($nome) || empty($idade) || empty($email) || empty($senha)) {
        echo "Todos os campos são obrigatórios!";
        exit();
    }

    // Verificação de e-mail duplicado na tabela 'crianca'
    $queryVerificaEmail = "SELECT * FROM crianca WHERE email = '$email'";
    $resultEmail = $conn->query($queryVerificaEmail);

    if ($resultEmail->num_rows > 0) {
        echo "Este e-mail já está cadastrado!";
        exit();
    }

    // Verifique se $id_usuario não está vazio ou nulo
    if (empty($id_usuario)) {
        echo "Erro: o ID do responsável não foi encontrado.";
        exit();
    }

    // Inserção do registro na tabela 'crianca' com a referência ao 'responsavel_id' que vem da sessão
    $query = "INSERT INTO crianca (nome, idade, email, senha, responsavel_id) 
              VALUES ('$nome', '$idade', '$email', '$senha', '$id_usuario')";

    if ($conn->query($query) === TRUE) {
        echo "Conta da criança criada com sucesso!";
        header("Location: ../php/pais.php");
        exit();
    } else {
        echo "Erro ao criar conta: " . $conn->error;
    }
}
?>
