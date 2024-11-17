<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_reserva = date('Y-m-d'); // A data da reserva será a data atual
    $id_usuario = $_POST['id_usuario'];
    $id_livro = $_POST['id_livro'];

    // Verificar se o livro já está reservado pelo mesmo usuário
    $sql_check = $conn->prepare("SELECT * FROM reserva WHERE id_usuario = ? AND id_livro = ?");
    $sql_check->bind_param("ii", $id_usuario, $id_livro);
    $sql_check->execute();
    $result_check = $sql_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "duplicado";
    } else {
        $sql = $conn->prepare("INSERT INTO reserva (data_reserva, id_usuario, id_livro) VALUES (?, ?, ?)");
        $sql->bind_param("sii", $data_reserva, $id_usuario, $id_livro);
        if ($sql->execute() === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    }

    $conn->close();
}
