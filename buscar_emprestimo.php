<?php
include 'db_connection.php';

$sql = "SELECT e.id_emprestimo, e.data_emprestimo, e.data_devolucao_prevista, e.data_devolucao_real, u.nome AS nome_usuario, l.titulo AS nome_livro
        FROM emprestimo e
        JOIN usuario u ON e.id_usuario = u.id_usuario
        JOIN livro l ON e.id_livro = l.id_livro";

$result = $conn->query($sql);

$emprestimos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emprestimos[] = $row;
    }
}

echo json_encode($emprestimos);

$conn->close();
?>
