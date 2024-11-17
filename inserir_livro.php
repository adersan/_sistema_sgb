<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $quantidade = $_POST['quantidade_disponivel'];
    $id_editora = $_POST['nome_editora'];

    // Verificar se o ISBN já existe
    $sql = "SELECT * FROM livro WHERE isbn='$isbn'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "duplicado";
    } else {
        $sql = "INSERT INTO livro (titulo, isbn, quantidade_disponivel, id_editora) VALUES ('$titulo', '$isbn', '$quantidade', '$id_editora')";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    }

    $conn->close();
}
?>
