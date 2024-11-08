<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $quantidade_disponivel = $_POST['quantidade_disponivel'];
    $id_editora = $_POST['id_editora'];

    $sql = "INSERT INTO livro (titulo, isbn, quantidade_disponivel, id_editora) VALUES ('$titulo', '$isbn', '$quantidade_disponivel', '$id_editora')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo livro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
