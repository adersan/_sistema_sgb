<?php
include 'db_connection.php';

$id_usuario = $_POST['id_usuario'];

$sql = "DELETE FROM usuario WHERE id_usuario=$id_usuario";

if ($conn->query($sql) === TRUE) {
    echo "success"; 
} else {
    echo "error"; 
}

$conn->close();
?>