<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_editora = $_POST['editora_id'];
    $nome = $_POST['nome'];

    // Verificar se a editora existe
    $sql_check = "SELECT * FROM editora WHERE id_editora='$id_editora'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Atualizar editora
        $sql_update = "UPDATE editora SET nome='$nome' WHERE id_editora='$id_editora'";
        if ($conn->query($sql_update) === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    } else {
        echo "error: editora não encontrada";
    }

    $conn->close();
}
?>
