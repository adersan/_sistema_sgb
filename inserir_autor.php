<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];

    $sql = "INSERT INTO autor (nome, nacionalidade) VALUES ('$nome', '$nacionalidade')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo autor criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
