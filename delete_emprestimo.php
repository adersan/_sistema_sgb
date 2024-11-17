<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_emprestimos = $_POST['id_emprestimo'];

    $conn->begin_transaction();

    try {
        foreach ($id_emprestimos as $id_emprestimo) {
            // Devolver o livro ao excluir o empréstimo
            $sql_livro = "UPDATE livro SET quantidade_disponivel = quantidade_disponivel + 1 WHERE id_livro = (SELECT id_livro FROM emprestimo WHERE id_emprestimo = ?)";
            $stmt_livro = $conn->prepare($sql_livro);
            $stmt_livro->bind_param("i", $id_emprestimo);
            $stmt_livro->execute();

            // Excluir o empréstimo
            $sql_delete = "DELETE FROM emprestimo WHERE id_emprestimo = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id_emprestimo);
            $stmt_delete->execute();
        }

        $conn->commit();
        echo "success";
    } catch (Exception $e) {
        $conn->rollback();
        echo "error: " . $e->getMessage();
    }

    $conn->close();
}
?>
