<?php
include 'db_connection.php';

$descricao = $_POST['descricao'];

$sql = "SELECT * FROM assunto WHERE descricao LIKE '%$descricao%'";
$result = $conn->query($sql);

$assuntos = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $assuntos[] = $row;
    }
}

$conn->close();

echo json_encode($assuntos);
?>
