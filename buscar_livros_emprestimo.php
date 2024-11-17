<?php
include 'db_connection.php';

if (isset($_POST['titulo'])) {
    $search = $_POST['titulo'];
    $sql = $conn->prepare("SELECT id_livro, titulo, quantidade_disponivel FROM livro WHERE titulo LIKE ? AND quantidade_disponivel > 0");
    $search = "%" . $search . "%";
    $sql->bind_param("s", $search);
    $sql->execute();
    $result = $sql->get_result();

    $livros = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $livros[] = $row;
        }
    }

    $conn->close();
    echo json_encode($livros);
}
?>
