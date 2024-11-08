$(document).ready(function() {
    // Mostrar/ocultar o formulário de login
    $("#login-link").click(function(e) {
        e.preventDefault();
        // Aqui você adicionará o código para exibir o formulário de login (modal ou div)
    });

    // Cadastrar Usuário
    $("#cadastrarUsuario").click(function(e) {
        e.preventDefault();
        $("#conteudo").load("cadastrar_usuario.php"); 
    });

    // Sair
    $("#sair").click(function(e) {
        e.preventDefault();
        // Aqui você adicionará o código para fazer logout (destruir sessão, etc.)
    });

    // Carregar conteúdo das outras opções do menu (Reserva, Empréstimo, etc.)
    // ...
});
function showForm(formId) {
    // Esconde todos os formulários
    document.querySelectorAll('form').forEach(form => form.style.display = 'none');
    // Mostra o formulário selecionado
    document.getElementById(formId).style.display = 'block';
}

function toggleSubmenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    if (submenu.style.display === 'none' || submenu.style.display === '') {
        submenu.style.display = 'block';
    } else {
        submenu.style.display = 'none';
    }
}