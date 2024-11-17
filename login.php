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
            header("Location: indexlogado.php"); // Redireciona para a página principal
            exit();
        } else {
            // Senha inválida
            echo "Usuário ou senha inválidos!";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não cadastrado!";
    }

    $sql->close();
}

$conn->close();
?>
