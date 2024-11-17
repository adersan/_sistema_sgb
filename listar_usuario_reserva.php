<?php
include 'db_connection.php';

$nome = $_POST['nome'];

$sql = $conn->prepare("SELECT id_usuario, nome FROM usuario WHERE nome LIKE ?");
$nome_param = "%" . $nome . "%";
$sql->bind_param("s", $nome_param);
$sql->execute();
$result = $sql->get_result();

$usuarios = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

$conn->close();

echo json_encode($usuarios);
?>
