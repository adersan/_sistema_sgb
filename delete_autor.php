<?php
include 'db_connection.php';

$id_autor = $_POST['id_autor'];

$sql = $conn->prepare("DELETE FROM autor WHERE id_autor = ?");
$sql->bind_param("i", $id_autor);

if ($sql->execute() === TRUE) {
    echo "success"; 
} else {
    echo "error: " . $conn->error; 
}

$conn->close();
?>
