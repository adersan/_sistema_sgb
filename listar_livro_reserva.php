<?php
include 'db_connection.php';

$titulo = $_POST['titulo'];

$sql = $conn->prepare("SELECT id_livro, titulo, quantidade_disponivel FROM livro WHERE titulo LIKE ? AND quantidade_disponivel <= 0");
$titulo_param = "%" . $titulo . "%";
$sql->bind_param("s", $titulo_param);
$sql->execute();
$result = $sql->get_result();

$livros = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }
}

$conn->close();

echo json_encode($livros);
?>
