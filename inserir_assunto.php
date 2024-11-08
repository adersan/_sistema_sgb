<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO assunto (descricao) VALUES ('$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo assunto criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
