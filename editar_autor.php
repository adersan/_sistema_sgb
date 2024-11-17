<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_autor = $_POST['autor_id'];
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];

    // Verificar se o autor existe
    $sql_check = $conn->prepare("SELECT * FROM autor WHERE id_autor = ?");
    $sql_check->bind_param("i", $id_autor);
    $sql_check->execute();
    $result_check = $sql_check->get_result();

    if ($result_check->num_rows > 0) {
        // Atualizar autor
        $sql_update = $conn->prepare("UPDATE autor SET nome = ?, nacionalidade = ? WHERE id_autor = ?");
        $sql_update->bind_param("ssi", $nome, $nacionalidade, $id_autor);
        if ($sql_update->execute() === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    } else {
        echo "error: autor não encontrado";
    }

    $conn->close();
}
?>
