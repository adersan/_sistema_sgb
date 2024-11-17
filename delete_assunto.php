<?php
include 'db_connection.php';

$id_assunto = $_POST['id_assunto'];

$sql = "DELETE FROM assunto WHERE id_assunto=$id_assunto";

if ($conn->query($sql) === TRUE) {
    echo "success"; 
} else {
    echo "error"; 
}

$conn->close();
?>
