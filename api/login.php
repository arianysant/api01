<?php
session_start(); // Inicia a sessão

include_once('../config_serv/conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $email = $conn->real_escape_string($email);
    $senha = $conn->real_escape_string($senha);
    $queryUsuarios = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultUsuarios = $conn->query($queryUsuarios);

    if ($resultUsuarios->num_rows > 0) {
        $usuario = $resultUsuarios->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['id'] = $usuario['id']; 
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['tipo_usuario'] = 'pais';

            var_dump($_SESSION);

            header('Location: ../php/pais.php');
            exit();
        } else {
            echo "Senha incorreta.";
        }
    }

    $queryCrianca = "SELECT * FROM crianca WHERE email = '$email'";
    $resultCrianca = $conn->query($queryCrianca);

    if ($resultCrianca->num_rows > 0) {

        $crianca = $resultCrianca->fetch_assoc();

        if (password_verify($senha, $crianca['senha'])) {
            $_SESSION['id_crianca'] = $crianca['id_crianca'];
            $_SESSION['nome'] = $crianca['nome'];
            $_SESSION['email'] = $crianca['email'];
            $_SESSION['tipo_usuario'] = 'crianca'; 

            header('Location: ../php/crianca.php');
            exit();
        } else {
            echo "Senha incorreta.";
        }
    }

    echo "Usuário não encontrado.";
}
?>
