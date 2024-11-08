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
                                    <a href="#" class="btn btn-primary" role="button" onclick="showForm('formLogin')">Login</a> 
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
                        <a class="nav-link" href="#" ">Cadastro</a>
                        <ul class="nav flex-column ml-3" id="submenuCadastro" style="display:none;">
                            <li class="nav-item"><a class="nav-link" href="#" >Usuário</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" >Editora</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" >Livro</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" >Assunto</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" >Autor</a></li>
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
                        <a class="nav-link" href="#">Sair</a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9">
                <div id="conteudo">
                    <h2>Bem-vindo ao Sistema de Gerenciamento de Biblioteca</h2>
                    <p>Faça login para acessar as funcionalidades do sistema.</p>
                    
                    <form action="login.php" method="post" id="formLogin">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                                
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

                    <form id="editora" style="display:none;">
                        <h2>Cadastro de Editora</h2>
                        <!-- Campos do formulário de cadastro de editora -->
                    </form>

                    <form id="livro" style="display:none;">
                        <h2>Cadastro de Livro</h2>
                        <!-- Campos do formulário de cadastro de livro -->
                    </form>

                    <form id="assunto" style="display:none;">
                        <h2>Cadastro de Assunto</h2>
                        <!-- Campos do formulário de cadastro de assunto -->
                    </form>

                    <form id="autor" style="display:none;">
                        <h2>Cadastro de Autor</h2>
                        <!-- Campos do formulário de cadastro de autor -->
                    </form>

                    <form id="reserva" style="display:none;">
                        <h2>Reserva</h2>
                        <!-- Campos do formulário de reserva -->
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
