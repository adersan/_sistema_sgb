<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO editora (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Nova editora criada com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
