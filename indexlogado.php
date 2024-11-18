<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: index.php");
    exit();
}
$nomeUsuario = $_SESSION["nome"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Biblioteca</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> 
    <style>

    </style>

</head>


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="indexlogado.php">
            <img src="img/logo.png" alt="Logomarca" height="50"> 
        </a>
        <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bem vindo, <?php echo $nomeUsuario; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cadastroDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastro
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cadastroDropdown">
                        <a class="dropdown-item" href="#" onclick="showForm('cad_usuario')">Usuário</a>
                        <a class="dropdown-item" href="#" onclick="showForm('cad_editora')">Editora</a>
                        <a class="dropdown-item" href="#" onclick="showForm('cad_livro')">Livro</a>
                        <a class="dropdown-item" href="#" onclick="showForm('cad_assunto')">Assunto</a>
                        <a class="dropdown-item" href="#" onclick="showForm('cad_autor')">Autor</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showForm('cad_reserva')">Reserva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showForm('cad_emprestimo1')">Empréstimo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showForm('relatorios')">Relatórios</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sair
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
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
                    <p>Bem-vindo à área administrativa da biblioteca.</p>
                    <!-- Formulário de Cadastro -->
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
                        <hr>
                        <label for="nome_busca">Buscar por nome:</label>
                        <input type="text" class="form-control" id="nome_busca" name="nome_busca"> 
                        <hr>  
                        <button type="button" class="btn btn-secondary" id="btn_buscar">Buscar</button> 
                        <button type="button" class="btn btn-secondary" id="btn_limpar_busca">Limpar Busca</button> <!-- Novo botão -->
                    </form>

                    <!-- Formulário de Edição -->
                    <form id="edit_usuario" class="form-container" method="post" style="display:none;"> 
                        <div class="form-group">
                            <h2>Editar Usuário</h2>
                            <hr>
                            <input type="hidden" id="edit_usuario_id" name="usuario_id"> 

                            <label for="edit_nome">Nome:</label>
                            <input type="text" class="form-control" id="edit_nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email:</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_telefone">Telefone:</label>
                            <input type="tel" class="form-control" id="edit_telefone" name="telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_senha">Senha:</label>
                            <input type="password" class="form-control" id="edit_senha" name="senha" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_confirma_senha">Confirme a Senha:</label>
                            <input type="password" class="form-control" id="edit_confirma_senha" name="confirma_senha" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_salvar">Salvar</button>
                        <button type="button" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
                    </form>

                    <div id="resultados_busca" class="mt-3"></div>

                    <!-- Formulário de Cadastro de Editora -->
                    <form id="cad_editora" class="form-container" method="post"> 
                        <div class="form-group">
                            <h2>Cadastro de Editora</h2>
                            <hr>
                            <input type="hidden" id="editora_id" name="editora_id"> 

                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_cadastrar_editora">Cadastrar</button>
                        <hr>
                        <label for="nome_busca_editora">Buscar por nome:</label>
                        <input type="text" class="form-control" id="nome_busca_editora" name="nome_busca_editora"> 
                        <hr>  
                        <button type="button" class="btn btn-secondary" id="btn_buscar_editora">Buscar</button>
                        <button type="button" class="btn btn-secondary" id="btn_limpar_busca_editora">Limpar Busca</button> <!-- Novo botão -->
                    </form>

                    <!-- Formulário de Edição de Editora -->
                    <form id="edit_editora" class="form-container" method="post" style="display:none;"> 
                        <div class="form-group">
                            <h2>Editar Editora</h2>
                            <hr>
                            <input type="hidden" id="edit_editora_id" name="editora_id"> 

                            <label for="edit_nome">Nome:</label>
                            <input type="text" class="form-control" id="edit_nome" name="nome" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_salvar_editora">Salvar</button>
                        <button type="button" class="btn btn-secondary" id="btn_cancelar_editora">Cancelar</button>
                    </form>

                    <div id="resultados_busca_editora" class="mt-3"></div>

                    <!-- Formulário de Cadastro de Livro -->
                <form id="cad_livro" class="form-container" method="post">
                    <div class="form-group">
                        <h2>Cadastro de Livro</h2>
                        <hr>
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
                        <label for="nome_editora">Editora:</label>
                        <select class="form-control" id="nome_editora" name="nome_editora"></select>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn_cadastrar_livro">Cadastrar</button>
                    <hr>
                    <label for="titulo_busca">Buscar por título:</label>
                    <input type="text" class="form-control" id="titulo_busca" name="titulo_busca"> 
                    <hr>  
                    <button type="button" class="btn btn-secondary" id="btn_buscar_livro">Buscar</button>
                    <button type="button" class="btn btn-secondary" id="btn_limpar_busca_livro">Limpar Busca</button>
                </form>

                <!-- Formulário de Edição de Livro -->
                <form id="edit_livro" class="form-container" method="post" style="display:none;">
                    <div class="form-group">
                        <h2>Editar Livro</h2>
                        <hr>
                        <input type="hidden" id="edit_livro_id" name="livro_id"> 

                        <label for="edit_titulo">Título:</label>
                        <input type="text" class="form-control" id="edit_titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_isbn">ISBN:</label>
                        <input type="text" class="form-control" id="edit_isbn" name="isbn">
                    </div>
                    <div class="form-group">
                        <label for="edit_quantidade_disponivel">Quantidade Disponível:</label>
                        <input type="number" class="form-control" id="edit_quantidade_disponivel" name="quantidade_disponivel">
                    </div>
                    <div class="form-group">
                        <label for="edit_nome_editora">Editora:</label>
                        <select class="form-control" id="edit_nome_editora" name="nome_editora"></select>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn_salvar_livro">Salvar</button>
                    <button type="button" class="btn btn-secondary" id="btn_cancelar_livro">Cancelar</button>
                </form>

                <div id="resultados_busca_livro" class="mt-3"></div>

                <!-- Formulário de Cadastro de Assunto -->
                <form id="cad_assunto" class="form-container" method="post">
                        <div class="form-group">
                            <h2>Cadastro de Assunto</h2>
                            <hr>
                            <input type="hidden" id="assunto_id" name="assunto_id"> 

                            <label for="descricao">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_cadastrar_assunto">Cadastrar</button>
                        <hr>
                        <label for="descricao_busca">Buscar por descrição:</label>
                        <input type="text" class="form-control" id="descricao_busca" name="descricao_busca"> 
                        <hr>  
                        <button type="button" class="btn btn-secondary" id="btn_buscar_assunto">Buscar</button> 
                        <button type="button" class="btn btn-secondary" id="btn_limpar_busca_assunto">Limpar Busca</button>
                    </form>

                    <!-- Formulário de Edição de Assunto -->
                    <form id="edit_assunto" class="form-container" method="post" style="display:none;">
                        <div class="form-group">
                            <h2>Editar Assunto</h2>
                            <hr>
                            <input type="hidden" id="edit_assunto_id" name="assunto_id"> 

                            <label for="edit_descricao">Descrição:</label>
                            <input type="text" class="form-control" id="edit_descricao" name="descricao" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_salvar_assunto">Salvar</button>
                        <button type="button" class="btn btn-secondary" id="btn_cancelar_assunto">Cancelar</button>
                    </form>

                    <div id="resultados_busca_assunto" class="mt-3"></div>
                    <!-- Formulário de Cadastro de Autor -->
                    <form id="cad_autor" class="form-container" method="post">
                        <div class="form-group">
                            <h2>Cadastro de Autor</h2>
                            <hr>
                            <input type="hidden" id="autor_id" name="autor_id"> 

                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="nacionalidade">Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade">
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_cadastrar_autor">Cadastrar</button>
                        <hr>
                        <label for="nome_busca">Buscar por nome:</label>
                        <input type="text" class="form-control" id="nome_busca" name="nome_busca"> 
                        <hr>  
                        <button type="button" class="btn btn-secondary" id="btn_buscar_autor">Buscar</button> 
                        <button type="button" class="btn btn-secondary" id="btn_limpar_busca_autor">Limpar Busca</button>
                    </form>

                    <!-- Formulário de Edição de Autor -->
                    <form id="edit_autor" class="form-container" method="post" style="display:none;">
                        <div class="form-group">
                            <h2>Editar Autor</h2>
                            <hr>
                            <input type="hidden" id="edit_autor_id" name="autor_id"> 

                            <label for="edit_nome">Nome:</label>
                            <input type="text" class="form-control" id="edit_nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_nacionalidade">Nacionalidade:</label>
                            <input type="text" class="form-control" id="edit_nacionalidade" name="nacionalidade">
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_salvar_autor">Salvar</button>
                        <button type="button" class="btn btn-secondary" id="btn_cancelar_autor">Cancelar</button>
                    </form>

                    <div id="resultados_busca_autor" class="mt-3"></div>
                    <!-- Formulário de Cadastro de Reserva -->
                    <form id="cad_reserva" class="form-container" method="post">
                        <div class="form-group">
                            <h2>Cadastro de Reserva</h2>
                            <hr>
                            <input type="hidden" id="reserva_id" name="reserva_id">

                            <label for="data_reserva">Data da Reserva:</label>
                            <input type="date" class="form-control" id="data_reserva" name="data_reserva" value="<?= date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuário:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite o nome do usuário">
                            <div id="lista_usuarios" class="suggestion-list"></div>
                        </div>
                        <div class="form-group">
                            <label for="livros">Livros:</label>
                            <input type="text" class="form-control" id="livros" name="livros" placeholder="Digite o nome do livro">
                            <div id="lista_livros" class="suggestion-list"></div>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn_reservar">Reservar</button>
                        <hr>
                        <button type="button" class="btn btn-secondary" id="btn_listar">Listar</button>
                        <button type="button" class="btn btn-success" id="btn_emprestar" disabled>Emprestar</button>
                        <button type="button" class="btn btn-danger" id="btn_excluir">Excluir</button>
                        <button type="button" class="btn btn-secondary" id="btn_limpar_listagem">Limpar Listagem</button>
                    </form>

                    <div id="resultados_busca_reserva" class="mt-3"></div>
                     <!-- Formulário de Cadastro de Emprestimo -->
                    <form id="cad_emprestimo1" class="form-container" method="post">
                        <div class="form-group">
                            <h2>Cadastro de Empréstimo</h2>
                            <hr>
                            <input type="hidden" id="emprestimo_id1" name="emprestimo_id1">
                            
                            <label for="data_emprestimo1">Data do Empréstimo:</label>
                            <input type="date" class="form-control" id="data_emprestimo1" name="data_emprestimo1" value="<?= date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="data_devolucao_prevista1">Data de Devolução Prevista:</label>
                            <input type="date" class="form-control" id="data_devolucao_prevista1" name="data_devolucao_prevista1" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario1">Usuário:</label>
                            <input type="text" class="form-control" id="usuario1" name="usuario1" placeholder="Digite o nome do usuário">
                            <div id="lista_usuarios1" class="suggestion-list"></div>
                        </div>
                        <div class="form-group">
                            <label for="livros1">Livros:</label>
                            <input type="text" class="form-control" id="livros1" name="livros1" placeholder="Digite o nome do livro">
                            <div id="lista_livros1" class="suggestion-list"></div>
                            <div id="lista_livros_selecionados1" class="selected-list"></div>
                        </div>
                        <div class="button-group">
                            <button type="button" class="btn btn-primary" id="btn_emprestar1">Emprestar</button>
                            <button type="button" class="btn btn-secondary" id="btn_listar_emprestimos1">Listar Empréstimos</button>
                            <button type="button" class="btn btn-success" id="btn_devolver1" disabled>Devolver</button>
                            <button type="button" class="btn btn-secondary" id="btn_limpar_listagem_emprestimos1">Limpar Listagem</button>
                        </div>
                    </form>

                    <div id="resultados_busca_emprestimo1" class="mt-3"></div>

                    <form id="relatorios" class="form-container" style="display:none;">
                        <h2>Relatórios</h2>
                        <hr>
                        <div class="form-group">
                            <label for="tipo_relatorio">Selecione o tipo de relatório:</label>
                            <select class="form-control" id="tipo_relatorio" name="tipo_relatorio">
                                <option value="emprestimos">Empréstimos</option>
                                <option value="devolucoes">Devoluções</option>
                                <option value="usuarios">Usuários</option>
                                <option value="livros">Livros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="btn_gerar_relatorio">Gerar Relatório</button>
                        </div>
                        <div class="form-group" id="relatorio_acoes" style="display:none;">
                            <button type="button" class="btn btn-secondary" id="btn_limpar_relatorio">Limpar Relatório</button>
                            <button type="button" class="btn btn-secondary" id="btn_pdf_relatorio">Gerar PDF</button>
                        </div>
                        <div id="resultados_relatorio" class="mt-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="welcomeMessage">
        <p>Olá, é bom tê-lo por aqui!</p>
        <p>Acesse o menu superior a acessar as funcionalidades do sistema</p>
        <button onclick="closeMessage()">OK</button>
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
    <!--<script>
        $(document).ready(function() {
            // Gerar Relatório
            $("#btn_gerar_relatorio").click(function() {
                var tipo_relatorio = $("#tipo_relatorio").val();
                console.log("Tipo de relatório selecionado: " + tipo_relatorio);

                $.ajax({
                    url: "gerar_relatorio.php",
                    type: "POST",
                    data: { tipo_relatorio: tipo_relatorio },
                    success: function(data) {
                        console.log("Relatório gerado com sucesso.");
                        $("#resultados_relatorio").html(data);
                        $("#relatorio_acoes").show();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erro ao gerar relatório: ", textStatus, errorThrown);
                        alert("Erro ao gerar relatório.");
                    }
                });
            });

            // Limpar Relatório
            $("#btn_limpar_relatorio").click(function() {
                $("#resultados_relatorio").empty();
                $("#relatorio_acoes").hide();
                $("#tipo_relatorio").val("");
            });

            // Gerar PDF do Relatório
            $("#btn_pdf_relatorio").click(function() {
                var relatorioHTML = $("#resultados_relatorio").html();
                $.ajax({
                    url: "gerar_pdf.php",
                    type: "POST",
                    data: { relatorio: relatorioHTML },
                    success: function(data) {
                        console.log("PDF gerado com sucesso.");
                        window.open(data, '_blank');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erro ao gerar PDF: ", textStatus, errorThrown);
                        alert("Erro ao gerar PDF.");
                    }
                });
            });
        });

    </script>-->
</body>
</html>