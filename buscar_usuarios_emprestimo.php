<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sql = "SELECT id_usuario, nome FROM usuario WHERE nome LIKE ?";
    $stmt = $conn->prepare($sql);
    $nome_like = "%$nome%";
    $stmt->bind_param("s", $nome_like);
    $stmt->execute();
    $result = $stmt->get_result();

    $usuarios = array();
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }

    echo json_encode($usuarios);
}

$conn->close();
?>
