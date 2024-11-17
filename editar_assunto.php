<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_assunto = $_POST['assunto_id'];
    $descricao = $_POST['descricao'];

    // Verificar se o assunto existe
    $sql_check = "SELECT * FROM assunto WHERE id_assunto='$id_assunto'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Atualizar assunto
        $sql_update = "UPDATE assunto SET descricao='$descricao' WHERE id_assunto='$id_assunto'";
        if ($conn->query($sql_update) === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    } else {
        echo "error: assunto não encontrado";
    }

    $conn->close();
}
?>
