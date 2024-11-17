<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    $id_livros = $_POST['id_livros'];
    $data_devolucao_prevista = $_POST['data_devolucao_prevista'];
    $data_emprestimo = date('Y-m-d');

    $conn->begin_transaction();

    try {
        foreach ($id_livros as $id_livro) {
            // Inserir o empréstimo
            $sql = "INSERT INTO emprestimo (data_emprestimo, data_devolucao_prevista, id_usuario, id_livro) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssii", $data_emprestimo, $data_devolucao_prevista, $id_usuario, $id_livro);
            $stmt->execute();

            // Atualizar a quantidade de livros
            $sql_update = "UPDATE livro SET quantidade_disponivel = quantidade_disponivel - 1 WHERE id_livro = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("i", $id_livro);
            $stmt_update->execute();
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
