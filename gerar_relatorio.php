<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_relatorio = $_POST['tipo_relatorio'];
    $relatorio = "";

    switch ($tipo_relatorio) {
        case "emprestimos":
            $titulo_relatorio = "Relatório de Empréstimos";
            $sql = "SELECT e.id_emprestimo, e.data_emprestimo, e.data_devolucao_prevista, u.nome AS nome_usuario, l.titulo AS nome_livro
                    FROM emprestimo e
                    JOIN usuario u ON e.id_usuario = u.id_usuario
                    JOIN livro l ON e.id_livro = l.id_livro";
            break;
        case "devolucoes":
            $titulo_relatorio = "Relatório de Devoluções";
            $sql = "SELECT e.id_emprestimo, e.data_devolucao_real, u.nome AS nome_usuario, l.titulo AS nome_livro
                    FROM emprestimo e
                    JOIN usuario u ON e.id_usuario = u.id_usuario
                    JOIN livro l ON e.id_livro = l.id_livro
                    WHERE e.data_devolucao_real IS NOT NULL";
            break;
        case "usuarios":
            $titulo_relatorio = "Relatório de Usuários";
            $sql = "SELECT u.id_usuario, u.nome, COUNT(e.id_emprestimo) AS total_emprestimos
                    FROM usuario u
                    LEFT JOIN emprestimo e ON u.id_usuario = e.id_usuario
                    GROUP BY u.id_usuario, u.nome";
            break;
        case "livros":
            $titulo_relatorio = "Relatório de Livros";
            $sql = "SELECT l.id_livro, l.titulo, l.quantidade_disponivel, COUNT(e.id_emprestimo) AS total_emprestimos
                    FROM livro l
                    LEFT JOIN emprestimo e ON l.id_livro = e.id_livro
                    GROUP BY l.id_livro, l.titulo, l.quantidade_disponivel";
            break;
        default:
            echo "Tipo de relatório inválido.";
            exit;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $relatorio .= "<div class='relatorio'>";
        $relatorio .= "<header><h1>$titulo_relatorio</h1></header>";
        $relatorio .= "<table class='table table-striped'>";
        $relatorio .= "<thead><tr>";

        if ($tipo_relatorio == "emprestimos" || $tipo_relatorio == "devolucoes") {
            $relatorio .= "<th>ID</th><th>Data</th><th>Usuário</th><th>Livro</th>";
        } elseif ($tipo_relatorio == "usuarios") {
            $relatorio .= "<th>ID</th><th>Nome</th><th>Total de Empréstimos</th>";
        } elseif ($tipo_relatorio == "livros") {
            $relatorio .= "<th>ID</th><th>Título</th><th>Quantidade Disponível</th><th>Total de Empréstimos</th>";
        }

        $relatorio .= "</tr></thead>";
        $relatorio .= "<tbody>";

        while ($row = $result->fetch_assoc()) {
            $relatorio .= "<tr>";
            foreach ($row as $value) {
                $relatorio .= "<td>" . $value . "</td>";
            }
            $relatorio .= "</tr>";
        }

        $relatorio .= "</tbody></table>";
        $relatorio .= "<footer><p>Relatório gerado em " . date('d/m/Y H:i:s') . "</p></footer>";
        $relatorio .= "</div>";
    } else {
        $relatorio .= "<p>Nenhum dado encontrado.</p>";
    }

    echo $relatorio;

    $conn->close();
}
?>
