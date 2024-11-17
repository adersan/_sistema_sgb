<?php
include 'db_connection.php';

$nome = $_POST['nome'];

$sql = "SELECT * FROM editora WHERE nome LIKE '%$nome%'";
$result = $conn->query($sql);

$editoras = array();
while ($row = $result->fetch_assoc()) {
    $editoras[] = $row;
}

echo json_encode($editoras);

$conn->close();
?>
