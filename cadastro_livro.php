<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastro de Livro</h2>
        <form action="inserir_livro.php" method="post">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn">
            </div>
            <div class="form-group">
                <label for="quantidade_disponivel">Quantidade Disponível:</label>
                <input type="number" class="form-control" id="quantidade_disponivel" name="quantidade_disponivel">
            </div>
            <div class="form-group">
                <label for="id_editora">Editora:</label>
                <input type="number" class="form-control" id="id_editora" name="id_editora">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
