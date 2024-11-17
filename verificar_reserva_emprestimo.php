<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    $sql = "SELECT r.id_reserva, r.data_reserva, l.titulo
            FROM reserva r
            JOIN livro l ON r.id_livro = l.id_livro
            WHERE r.id_usuario = ? AND l.quantidade_disponivel > 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    $reservas = array();
    while ($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }

    echo json_encode($reservas);
}

$conn->close();
?>
