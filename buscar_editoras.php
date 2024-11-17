<?php
include 'db_connection.php';

$sql = "SELECT id_editora, nome FROM editora";
$result = $conn->query($sql);

$editoras = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $editoras[] = $row;
    }
}

$conn->close();

echo json_encode($editoras);
?>
