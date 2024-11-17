<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verificar se o email já existe
    $sql = "SELECT * FROM usuario WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "duplicado";
    } else {
        $sql = "INSERT INTO usuario (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha')";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    }

    $conn->close();
}

?>
