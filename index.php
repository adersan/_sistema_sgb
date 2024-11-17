<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Biblioteca</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> 


</head>


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="Logomarca" height="50"> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cadastroDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Novo usuário
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cadastroDropdown">
                        <a class="dropdown-item" href="#" onclick="showForm('cad_usuario')">Cadastrar</a>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showForm()">Reserva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showForm()">Empréstimo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showForm()">Relatórios</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sair
                    </a>
                </li>
            </ul>
        </div>

    </nav>  
    <div class="content">
        
        <div class="container mt-5">
            <div class="search-container">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Digite sua pesquisa..." id="searchInput">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="search()">Pesquisar</button>
                        </div>
                    </div>
            </div>

            <div class="container mt-3" id="searchResults">
                    <!-- Resultados da pesquisa aparecerão aqui -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Sistema de Gerenciamento de Biblioteca</h1>
                    <p>Faça  <a href="#" onclick="showForm('formLogin')">Login</a>  para acessar as funcionalidades do sistema ou Clique em <strong>Novo usuário</strong> para efetuar o seu cadastro.</p>

                    <form action="login.php" method="post" id="formLogin" class="form-container">
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
                    
                    <form id="cad_usuario" class="form-container" method="post"> 
                        <div class="form-group">
                            <h2>Cadastro de Usuário</h2>
                            <hr>
                            <input type="hidden" id="usuario_id" name="usuario_id"> 

                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="form-group">
                            <label for="confirma_senha">Confirme a Senha:</label>
                            <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="termos" name="termos" required>
                            <label for="termos">Aceito os termos e condições</label>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_cadastrar">Cadastrar</button>
                     

                    </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; 2024 Sistema de Gerenciamento de Biblioteca - Todos os direitos reservados</p>
        </div>
    </footer>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>


</body>
</html>