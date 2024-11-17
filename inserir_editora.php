<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    // Verificar se a editora já existe
    $sql_check = "SELECT * FROM editora WHERE nome='$nome'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "duplicado";
    } else {
        $sql = "INSERT INTO editora (nome) VALUES ('$nome')";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
