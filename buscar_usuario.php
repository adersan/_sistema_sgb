<?php
include 'db_connection.php';

$nome = $_POST['nome'];

$sql = "SELECT * FROM usuario WHERE nome LIKE '%$nome%'"; 
$result = $conn->query($sql);

$usuarios = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

$conn->close();

echo json_encode($usuarios); 
?>