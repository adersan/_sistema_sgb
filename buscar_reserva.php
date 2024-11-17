<?php
include 'db_connection.php';

$sql = "SELECT r.*, u.nome AS nome_usuario, l.titulo AS nome_livro, l.quantidade_disponivel FROM reserva r 
        JOIN usuario u ON r.id_usuario = u.id_usuario 
        JOIN livro l ON r.id_livro = l.id_livro";
$result = $conn->query($sql);

$reservas = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }
}

$conn->close();

echo json_encode($reservas);
?>
