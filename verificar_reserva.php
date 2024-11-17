<?php
include 'db_connection.php';

$id_usuario = $_POST['id_usuario'];

$sql = $conn->prepare("SELECT r.*, l.titulo AS nome_livro 
                       FROM reserva r 
                       JOIN livro l ON r.id_livro = l.id_livro 
                       WHERE r.id_usuario = ? AND l.quantidade_disponivel > 0");
$sql->bind_param("i", $id_usuario);
$sql->execute();
$result = $sql->get_result();

$reservas = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }
}

$conn->close();

echo json_encode($reservas);
?>
