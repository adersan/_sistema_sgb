<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];

    // Verificar se o autor já existe
    $sql = $conn->prepare("SELECT * FROM autor WHERE nome = ?");
    $sql->bind_param("s", $nome);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        echo "duplicado";
    } else {
        $sql = $conn->prepare("INSERT INTO autor (nome, nacionalidade) VALUES (?, ?)");
        $sql->bind_param("ss", $nome, $nacionalidade);
        if ($sql->execute() === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
