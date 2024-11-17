<?php
include 'db_connection.php';

$titulo = $_POST['titulo'];

$sql = "SELECT l.*, e.nome AS nome_editora FROM livro l JOIN editora e ON l.id_editora = e.id_editora WHERE l.titulo LIKE '%$titulo%'";
$result = $conn->query($sql);

$livros = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }
}

$conn->close();

echo json_encode($livros);
?>
