<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['usuario_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verificar se o usuário existe
    $sql_check = "SELECT * FROM usuario WHERE id_usuario='$id_usuario'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Atualizar usuário
        $sql_update = "UPDATE usuario SET nome='$nome', email='$email', telefone='$telefone', senha='$senha' WHERE id_usuario='$id_usuario'";
        if ($conn->query($sql_update) === TRUE) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
    } else {
        echo "error: usuário não encontrado";
    }

    $conn->close();
}

?>