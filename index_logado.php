<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="_css/style.css">
</head>
<body onload="showForm('formLogin')">

    <header class="bg-primary text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <img src="_img/logo.png" alt="Logomarca" height="50"> 
                </div>
                <div class="col-md-8 text-center">
                    <h1>Sistema de Gerenciamento de Biblioteca</h1>
                </div>
                <div class="col-sd-2 text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesquisar...">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search">Pesquisar</i>
                                        </button>
                                    </div>
                                    <div>
                                        <a href="index_logado.php" class="btn btn-primary" role="button" onclick="showForm('formLogin')">Bem vindo</a> 
                                    </div>

                                </div>
                            </div>
                            <div class="col-2"></div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 bg-light sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="toggleSubmenu('submenuCadastro')">Cadastro</a>
                        <ul class="nav flex-column ml-3" id="submenuCadastro" style="display:none;">
                            <li class="nav-item"><a class="nav-link" href="#" onclick="showForm('cad_usuario')">Usuário</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" onclick="showForm('editora')">Editora</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" onclick="showForm('livro')">Livro</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" onclick="showForm('assunto')">Assunto</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" onclick="showForm('autor')">Autor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showForm('reserva')">Reserva</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showForm('emprestimo')">Empréstimo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showForm('relatorios')">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" class="btn btn-primary">Sair</a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9">
                <div id="conteudo">
                    <h2>Bem-vindo ao Sistema de Gerenciamento de Biblioteca</h2>
                    <p>Escolha uma opção do <strong>Menu</strong> para inciar!</p>
                    
                                
                    <form id="cad_usuario" action="inserir_usuario.php" method="post">
                        <div class="form-group">
                        <h2>Cadastro de Usuário</h2>
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>

                    <form id="editora" action="inserir_editora.php" method="post">
                        <h2>Cadastro de Editora</h2>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>

                    <form id="livro" action="inserir_livro.php" method="post">
                        <div class="form-group">
                            <h2>Cadastro de Livro</h2>
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

                    <form id="assunto" action="inserir_assunto.php" method="post">
                        <h2>Cadastro de Assunto</h2>
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>

                    <form  id="autor" action="inserir_autor.php" method="post">
                        <div class="form-group">
                            <h2>Reserva de Livros</h2>
                            <h2>Cadastro de Autor</h2>
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="nacionalidade">Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>

                    <form id="reserva" action="inserir_reserva.php" method="post">
                        <h2>Reserva de Livros</h2>
                        <div class="form-group">
                            <label for="id_usuario">Usuário:</label>
                            <select class="form-control" id="id_usuario" name="id_usuario" required>
                                <?php
                                include 'db_connection.php';
                                $sql = "SELECT id_usuario, nome FROM usuario";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id_usuario'] . "'>" . $row['nome'] . "</option>";
                                    }
                                }
                                $conn->close();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_livro">Livro:</label>
                            <select class="form-control" id="id_livro" name="id_livro" required>
                                <?php
                                include 'db_connection.php';
                                $sql = "SELECT id_livro, titulo FROM livro";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id_livro'] . "'>" . $row['titulo'] . "</option>";
                                    }
                                }
                                $conn->close();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_reserva">Data da Reserva:</label>
                            <input type="date" class="form-control" id="data_reserva" name="data_reserva" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="efetivar" name="efetivar">
                            <label class="form-check-label" for="efetivar">Efetivar Reserva</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>

                    <form id="emprestimo" style="display:none;">
                        <h2>Empréstimo</h2>
                        <!-- Campos do formulário de empréstimo -->
                    </form>

                    <form id="relatorios" style="display:none;">
                        <h2>Relatórios</h2>
                        <!-- Campos do formulário de relatórios -->
                    </form>
                </div>
            </main>
        </div>
    </div>

    <footer class="bg-dark text-white py-3">
        <div class="conteiner">
            <div class="h100"></div>
        </div>
        <div class="container text-center">
            <p>© 2024 Sistema de Gerenciamento de Biblioteca - Todos os direitos reservado a Aderval Santiago Leite</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="_js/script.js">

    </script>
</body>
</html>
