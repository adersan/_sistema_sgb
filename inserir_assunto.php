<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];

    // Verificar se o assunto já existe
    $sql = "SELECT * FROM assunto WHERE descricao='$descricao'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "duplicado";
    } else {
        $sql = "INSERT INTO assunto (descricao) VALUES ('$descricao')";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    }

    $conn->close();
}
?>
