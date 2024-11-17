<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livro = $_POST['livro_id'];
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $quantidade = $_POST['quantidade_disponivel'];
    $id_editora = $_POST['nome_editora'];

    // Verificar se o livro existe
    $sql_check = "SELECT * FROM livro WHERE id_livro='$id_livro'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Atualizar livro
        $sql_update = "UPDATE livro SET titulo='$titulo', isbn='$isbn', quantidade_disponivel='$quantidade', id_editora='$id_editora' WHERE id_livro='$id_livro'";
        if ($conn->query($sql_update) === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    } else {
        echo "error: livro não encontrado";
    }

    $conn->close();
}
?>
