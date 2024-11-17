<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_emprestimo = $_POST['id_emprestimo'];
    $data_devolucao_real = date('Y-m-d');

    $conn->begin_transaction(); // Iniciar transação

    try {
        // Atualizar a data de devolução real no empréstimo
        $sql_update = $conn->prepare("UPDATE emprestimo SET data_devolucao_real = ? WHERE id_emprestimo = ?");
        $sql_update->bind_param("si", $data_devolucao_real, $id_emprestimo);
        $sql_update->execute();

        // Atualizar a quantidade de livros disponíveis
        $sql_livro = $conn->prepare("UPDATE livro SET quantidade_disponivel = quantidade_disponivel + 1 WHERE id_livro = (SELECT id_livro FROM emprestimo WHERE id_emprestimo = ?)");
        $sql_livro->bind_param("i", $id_emprestimo);
        $sql_livro->execute();

        // Calcular multa por atraso
        $sql_multa = $conn->prepare("SELECT data_devolucao_prevista FROM emprestimo WHERE id_emprestimo = ?");
        $sql_multa->bind_param("i", $id_emprestimo);
        $sql_multa->execute();
        $result_multa = $sql_multa->get_result()->fetch_assoc();
        $data_devolucao_prevista = $result_multa['data_devolucao_prevista'];

        $diff = strtotime($data_devolucao_real) - strtotime($data_devolucao_prevista);
        $dias_atraso = ceil($diff / (60 * 60 * 24));

        if ($dias_atraso > 0) {
            // Obter o valor da multa diária
            $sql_pagamento = "SELECT valor_diario FROM pagamento";
            $result_pagamento = $conn->query($sql_pagamento);
            $valor_diario = $result_pagamento->fetch_assoc()['valor_diario'];

            $multa = $dias_atraso * $valor_diario;

            echo json_encode(array('success' => true, 'multa' => $multa));
        } else {
            echo json_encode(array('success' => true, 'multa' => 0));
        }

        $conn->commit(); // Confirmar transação
    } catch (Exception $e) {
        $conn->rollback(); // Reverter transação
        echo json_encode(array('success' => false, 'error' => $e->getMessage()));
    }

    $conn->close();
}
?>
