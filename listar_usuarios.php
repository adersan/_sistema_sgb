<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = $conn->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $nome, $email, $senha);

    if ($sql->execute() === TRUE) {
        echo "Novo usuário criado com sucesso";
    } else {
        echo "Erro: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>
