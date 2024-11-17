<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids_reservas = $_POST['id_reserva'];

    foreach ($ids_reservas as $id_reserva) {
        $sql = $conn->prepare("DELETE FROM reserva WHERE id_reserva = ?");
        $sql->bind_param("i", $id_reserva);
        if ($sql->execute() !== TRUE) {
            echo "error: " . $conn->error;
            $conn->close();
            exit();
        }
    }

    echo "success";
    $conn->close();
}
?>
