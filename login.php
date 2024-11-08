<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar o usuário
    $sql = $conn->prepare("SELECT * FROM usuario WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Usuário autenticado
            $_SESSION["nome"] = $row['nome'];
            header("Location: index_logado.php"); // Redireciona para a página principal
            exit();
        } else {
            // Senha inválida
            $login_error = "Usuário ou senha inválidos!";
        }
    } else {
        // Usuário não encontrado
        $login_error = "Usuário ou senha inválidos!";
    }

    $sql->close();
}

$conn->close();
?>
