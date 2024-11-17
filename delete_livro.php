<?php
include 'db_connection.php';

$id_livro = $_POST['id_livro'];

$sql = "DELETE FROM livro WHERE id_livro=$id_livro";

if ($conn->query($sql) === TRUE) {
    echo "success"; 
} else {
    echo "error"; 
}

$conn->close();
?>
