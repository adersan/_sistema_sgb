<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_editora = $_POST['id_editora'];

    $sql = "DELETE FROM editora WHERE id_editora='$id_editora'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error: " . $conn->error;
    }

    $conn->close();
}
?>
