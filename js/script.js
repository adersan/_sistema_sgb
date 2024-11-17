document.addEventListener('DOMContentLoaded', function() {
    function esconderResultadosBusca() {
        document.getElementById('resultados_busca').style.display = 'none';
        document.getElementById('resultados_busca_editora').style.display = 'none';
    }
    // Eventos para esconder a tabela após ações
    document.getElementById('btn_cadastrar').addEventListener('click', function() {
        // lógica para cadastrar usuário...
        esconderResultadosBusca();
    });
    document.getElementById('btn_salvar').addEventListener('click', function() {
        // lógica para salvar alterações do usuário...
        esconderResultadosBusca();
    });
    document.getElementById('btn_cancelar').addEventListener('click', function() {
        // lógica para cancelar edição do usuário...
        esconderResultadosBusca();
    });
    document.getElementById('btn_cadastrar_editora').addEventListener('click', function() {
        // lógica para cadastrar editora...
        esconderResultadosBusca();
    });

    document.getElementById('btn_salvar_editora').addEventListener('click', function() {
        // lógica para salvar alterações da editora...
        esconderResultadosBusca();
    });

    document.getElementById('btn_cancelar_editora').addEventListener('click', function() {
        // lógica para cancelar edição da editora...
        esconderResultadosBusca();
    });

    document.getElementById('btn_buscar').addEventListener('click', function() {
        // lógica para buscar usuário...
        document.getElementById('resultados_busca').style.display = 'block';
    });

    document.getElementById('btn_buscar_editora').addEventListener('click', function() {
        // lógica para buscar editora...
        document.getElementById('resultados_busca_editora').style.display = 'block';
    });

    // Novo evento para limpar busca
    document.getElementById('btn_limpar_busca').addEventListener('click', function() {
        document.getElementById('nome_busca').value = '';
        esconderResultadosBusca();
    });

    document.getElementById('btn_limpar_busca_editora').addEventListener('click', function() {
        document.getElementById('nome_busca_editora').value = '';
        esconderResultadosBusca();
    });
});

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
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('cad_usuario').reset();
});



/// Adiciona um ouvinte de evento ao formulário com o ID 'cad_usuario' para o evento 'submit'
document.getElementById('cad_usuario').addEventListener('submit', function(event) {
  // Obtém os valores dos campos de senha e confirmação de senha
  var senha = document.getElementById('senha').value.trim();
  var confirmaSenha = document.getElementById('confirma_senha').value.trim();
  
  // Obtém o valor do campo de email
  var email = document.getElementById('email').value;
  
  // Define o padrão de regex para validar o formato do email
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  // Verifica se as senhas coincidem
  if (senha !== confirmaSenha) {
      alert('As senhas não coincidem!');
      event.preventDefault(); // Impede o envio do formulário
  } 
  // Verifica se o email está no formato correto
  else if (!emailPattern.test(email)) {
      alert('Por favor, insira um email válido!');
      event.preventDefault(); // Impede o envio do formulário
  } 
  // Se todas as validações passarem, exibe uma mensagem de sucesso
  else {
      alert('Cadastro realizado com sucesso!');
  }
});


function toggleSubmenu(id) {
    var submenu = document.getElementById(id);
    if (submenu.style.display === "none") {
        submenu.style.display = "block";
    } else {
        submenu.style.display = "none";
    }
}

function showForm(id) {
    var forms = document.getElementsByClassName('form-container');
    for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = 'none';
    }
    document.getElementById(id).style.display = 'block';
};  
function search() {
const query = document.getElementById('searchInput').value;
const resultsContainer = document.getElementById('searchResults');
resultsContainer.innerHTML = `<p>Nenhum resultado encontrado para: <strong>${query}</strong></p>`;
};
function showMessage() {
  const message = document.getElementById('welcomeMessage');
  message.style.display = 'block';
  setTimeout(() => {
      message.style.display = 'none';
  }, 5000);
}

function closeMessage() {
  const message = document.getElementById('welcomeMessage');
  message.style.display = 'none';
};

window.onload = showMessage;

$(document).ready(function() {
  // Buscar usuário
  $("#btn_buscar").click(function() {
      var nome = $("#nome_busca").val(); 
      $.ajax({
          url: "buscar_usuario.php", 
          type: "POST",
          data: { nome: nome }, 
          dataType: "json", 
          success: function(data) {
              exibirResultados(data);
          },
          error: function() {
              alert("Erro ao buscar usuário.");
          }
      });
  });

  // Cadastrar usuário
  $("#btn_cadastrar").click(function(event) {
    event.preventDefault();
    enviarFormulario("inserir_usuario.php", "#cad_usuario");
  });

  // Editar usuário
  $("#btn_salvar").click(function(event) {
    event.preventDefault();
    enviarFormulario("editar_usuario.php", "#edit_usuario");
  });

  // Cancelar edição
  $("#btn_cancelar").click(function() {
    $("#edit_usuario")[0].reset();
    $("#edit_usuario").hide();
    $("#cad_usuario").show();
  });

  function enviarFormulario(url, formId) {
    // Validação de todos os campos obrigatórios
    var nome = $(formId + " input[name='nome']").val().trim();
    var email = $(formId + " input[name='email']").val().trim();
    var telefone = $(formId + " input[name='telefone']").val().trim();
    var senha = $(formId + " input[name='senha']").val().trim();
    var confirmaSenha = $(formId + " input[name='confirma_senha']").val().trim();

    if (!nome || !email || !telefone || !senha || !confirmaSenha) {
        alert('Todos os campos são obrigatórios!');
        return; // Impede o envio do formulário
    }

    // Validação de senha
    if (senha !== confirmaSenha) {
        alert('As senhas não coincidem!');
        return; // Impede o envio do formulário
    }

    // Validação de email
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert('Por favor, insira um email válido!');
        return; // Impede o envio do formulário
    }

    // Se as validações passarem, envia os dados via AJAX
    var formData = $(formId).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(response) {
            if (response === "duplicado") {
                alert("Usuário já existe!");
            } else if (response === "success") {
                alert("Usuário salvo com sucesso!");
                $(formId)[0].reset();
                $("#resultados_busca").empty();
                $("#cad_usuario").show();
                $("#edit_usuario").hide();
            } else {
                alert("Erro ao salvar usuário: " + response);
            }
        },
        error: function() {
            alert("Erro ao salvar usuário.");
        }
    });
  }

  function exibirResultados(data) {
    var resultados = $("#resultados_busca");
    resultados.empty(); 
    if (data.length === 0) {
        resultados.append("<p>Nenhum usuário encontrado.</p>");
        return;
    }

    var tabela = $("<table>").addClass("table table-striped");
    var thead = $("<thead>").append(
        $("<tr>").append(
            $("<th>").text("Nome"),
            $("<th>").text("Email"),
            $("<th>").text("Telefone"),
            $("<th>").text("Ações")
        )
    );
    tabela.append(thead);

    var tbody = $("<tbody>");
    $.each(data, function(index, usuario) {
        var linha = $("<tr>").append(
            $("<td>").text(usuario.nome),
            $("<td>").text(usuario.email),
            $("<td>").text(usuario.telefone),
            $("<td>").append(
                $("<button>")
                    .addClass("btn btn-warning btn-sm btn-editar")
                    .text("Editar")
                    .data("usuario", usuario), 
                $("<button>")
                    .addClass("btn btn-danger btn-sm btn-excluir")
                    .text("Excluir")
                    .data("usuario_id", usuario.id_usuario) 
            )
        );
        tbody.append(linha);
    });
    tabela.append(tbody);
    resultados.append(tabela);

    $(".btn-editar").click(function() { 
        var usuario = $(this).data("usuario");
        $("#edit_usuario_id").val(usuario.id_usuario);
        $("#edit_nome").val(usuario.nome);
        $("#edit_email").val(usuario.email);
        $("#edit_telefone").val(usuario.telefone);
        $("#edit_senha").val(""); 
        $("#edit_confirma_senha").val(""); 
        $("#cad_usuario").hide();
        $("#edit_usuario").show();
    });

    $(".btn-excluir").click(function() { 
        if (confirm("Tem certeza que deseja excluir este usuário?")) {
            var usuario_id = $(this).data("usuario_id"); 
            $.ajax({
                url: "delete_usuario.php", 
                type: "POST",
                data: { id_usuario: usuario_id }, 
                success: function() {
                    alert("Usuário excluído com sucesso!");
                    $("#btn_buscar").click(); 
                },
                error: function() {
                    alert("Erro ao excluir usuário.");
                }
            });
        }
    });
  }
// Buscar editora
$("#btn_buscar_editora").click(function() {
    var nome = $("#nome_busca_editora").val(); 
    $.ajax({
        url: "buscar_editora.php", 
        type: "POST",
        data: { nome: nome }, 
        dataType: "json", 
        success: function(data) {
            exibirResultadosEditora(data);
        },
        error: function() {
            alert("Erro ao buscar editora.");
        }
    });
});

// Cadastrar editora
$("#btn_cadastrar_editora").click(function(event) {
  event.preventDefault();
  enviarFormularioEditora("inserir_editora.php", "#cad_editora");
});

// Editar editora
$("#btn_salvar_editora").click(function(event) {
  event.preventDefault();
  enviarFormularioEditora("editar_editora.php", "#edit_editora");
});

// Cancelar edição
$("#btn_cancelar_editora").click(function() {
  $("#edit_editora")[0].reset();
  $("#edit_editora").hide();
  $("#cad_editora")[0].reset();
  $("#cad_editora").show();
});

function enviarFormularioEditora(url, formId) {
  var nome = $(formId + " input[name='nome']").val().trim();

  if (!nome) {
      alert('O campo nome é obrigatório!');
      return; // Impede o envio do formulário
  }

  var formData = $(formId).serialize();
  $.ajax({
      url: url,
      type: "POST",
      data: formData,
      success: function(response) {
          if (response === "duplicado") {
              alert("Editora já existe!");
          } else if (response === "success") {
              alert("Editora salva com sucesso!");
              $(formId)[0].reset();
              $("#resultados_busca_editora").empty();
              $("#cad_editora").show();
              $("#edit_editora").hide();
          } else {
              alert("Erro ao salvar editora: " + response);
          }
      },
      error: function() {
          alert("Erro ao salvar editora.");
      }
  });
}

function exibirResultadosEditora(data) {
  var resultados = $("#resultados_busca_editora");
  resultados.empty(); 
  if (data.length === 0) {
      resultados.append("<p>Nenhuma editora encontrada.</p>");
      return;
  }

  var tabela = $("<table>").addClass("table table-striped");
  var thead = $("<thead>").append(
      $("<tr>").append(
          $("<th>").text("Nome"),
          $("<th>").text("Ações")
      )
  );
  tabela.append(thead);

  var tbody = $("<tbody>");
  $.each(data, function(index, editora) {
      var linha = $("<tr>").append(
          $("<td>").text(editora.nome),
          $("<td>").append(
              $("<button>")
                  .addClass("btn btn-warning btn-sm btn-editar-editora")
                  .text("Editar")
                  .data("editora", editora), 
              $("<button>")
                  .addClass("btn btn-danger btn-sm btn-excluir-editora")
                  .text("Excluir")
                  .data("id_editora", editora.id_editora) 
          )
      );
      tbody.append(linha);
  });
  tabela.append(tbody);
  resultados.append(tabela);

  $(".btn-editar-editora").click(function() { 
      var editora = $(this).data("editora");
      $("#edit_editora_id").val(editora.id_editora);
      $("#edit_nome").val(editora.nome);
      $("#cad_editora").hide();
      $("#edit_editora").show();
  });

  $(".btn-excluir-editora").click(function() { 
      if (confirm("Tem certeza que deseja excluir esta editora?")) {
          var id_editora = $(this).data("id_editora"); 
          $.ajax({
              url: "delete_editora.php", 
              type: "POST",
              data: { id_editora: id_editora }, 
              success: function(response) {
                  if (response === "success") {
                      alert("Editora excluída com sucesso!");
                      $("#btn_buscar_editora").click(); 
                  } else {
                      alert("Erro ao excluir editora: " + response);
                  }
              },
              error: function() {
                  alert("Erro ao excluir editora.");
              }
          });
      }
  });
}
 // Carregar editoras no dropdown
    function carregarEditoras() {
        $.ajax({
            url: "buscar_editoras.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var selectEditora = $("#nome_editora, #edit_nome_editora");
                selectEditora.empty();
                $.each(data, function(index, editora) {
                    selectEditora.append($("<option>").text(editora.nome).val(editora.id_editora));
                });
            },
            error: function() {
                alert("Erro ao carregar editoras.");
            }
        });
    }

    carregarEditoras();

// Buscar livro
$("#btn_buscar_livro").click(function() {
    var titulo = $("#titulo_busca").val(); 
    $.ajax({
        url: "buscar_livro.php", 
        type: "POST",
        data: { titulo: titulo }, 
        dataType: "json", 
        success: function(data) {
            if (data && Array.isArray(data)) {
                exibirResultadosLivro(data);
            } else {
                console.error("Formato de resposta inválido ou vazio:", data);
                alert("Erro ao buscar livro.");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Erro na requisição AJAX:", textStatus, errorThrown);
            alert("Erro ao buscar livro.");
        }
    });
});


// Cadastrar livro
$("#btn_cadastrar_livro").click(function(event) {
    event.preventDefault();
    enviarFormularioLivro("inserir_livro.php", "#cad_livro");
});

// Editar livro
$("#btn_salvar_livro").click(function(event) {
    event.preventDefault();
    enviarFormularioLivro("editar_livro.php", "#edit_livro");
});

// Cancelar edição de livro
$("#btn_cancelar_livro").click(function() {
    $("#edit_livro")[0].reset();
    $("#edit_livro").hide();
    $("#cad_livro").show();
});

// Limpar busca de livro
$("#btn_limpar_busca_livro").click(function() {
    $("#titulo_busca").val('');
    $("#resultados_busca_livro").empty();
});

function enviarFormularioLivro(url, formId) {
    var titulo = $(formId + " input[name='titulo']").val().trim();
    var isbn = $(formId + " input[name='isbn']").val().trim();
    var quantidade = $(formId + " input[name='quantidade_disponivel']").val().trim();
    var id_editora = $(formId + " select[name='nome_editora']").val().trim();

    if (!titulo || !id_editora) {
        alert('Os campos título e editora são obrigatórios!');
        return;
    }

    var formData = $(formId).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(response) {
            if (response === "duplicado") {
                alert("Livro já existe!");
            } else if (response === "success") {
                alert("Livro salvo com sucesso!");
                $(formId)[0].reset();
                $("#resultados_busca_livro").empty();
                $("#cad_livro").show();
                $("#edit_livro").hide();
            } else {
                alert("Erro ao salvar livro: " + response);
            }
        },
        error: function() {
            alert("Erro ao salvar livro.");
        }
    });
}

function exibirResultadosLivro(data) {
    var resultados = $("#resultados_busca_livro");
    resultados.empty();
    if (data.length === 0) {
        resultados.append("<p>Nenhum livro encontrado.</p>");
        return;
    }

    var tabela = $("<table>").addClass("table table-striped");
    var thead = $("<thead>").append(
        $("<tr>").append(
            $("<th>").text("Título"),
            $("<th>").text("ISBN"),
            $("<th>").text("Quantidade"),
            $("<th>").text("Editora"),
            $("<th>").text("Ações")
        )
    );
    tabela.append(thead);

    var tbody = $("<tbody>");
    $.each(data, function(index, livro) {
        var linha = $("<tr>").append(
            $("<td>").text(livro.titulo),
            $("<td>").text(livro.isbn),
            $("<td>").text(livro.quantidade_disponivel),
            $("<td>").text(livro.nome_editora),
            $("<td>").append(
                $("<button>")
                    .addClass("btn btn-warning btn-sm btn-editar-livro")
                    .text("Editar")
                    .data("livro", livro), 
                $("<button>")
                    .addClass("btn btn-danger btn-sm btn-excluir-livro")
                    .text("Excluir")
                    .data("livro_id", livro.id_livro) 
            )
        );
        tbody.append(linha);
    });
    tabela.append(tbody);
    resultados.append(tabela);

    $(".btn-editar-livro").click(function() {
        var livro = $(this).data("livro");
        $("#edit_livro_id").val(livro.id_livro);
        $("#edit_titulo").val(livro.titulo);
        $("#edit_isbn").val(livro.isbn);
        $("#edit_quantidade_disponivel").val(livro.quantidade_disponivel);
        $("#edit_nome_editora").val(livro.id_editora);
        $("#cad_livro").hide();
        $("#edit_livro").show();
    });

    $(".btn-excluir-livro").click(function() {
        if (confirm("Tem certeza que deseja excluir este livro?")) {
            var livro_id = $(this).data("livro_id");
            $.ajax({
                url: "delete_livro.php",
                type: "POST",
                data: { id_livro: livro_id },
                success: function(response) {
                    if (response === "success") {
                        alert("Livro excluído com sucesso!");
                        $("#btn_buscar_livro").click();
                    } else {
                        alert("Erro ao excluir livro: " + response);
                    }
                },
                error: function() {
                    alert("Erro ao excluir livro.");
                }
            });
        }
    });
}

 // Buscar assunto
$("#btn_buscar_assunto").click(function() {
    var descricao = $("#descricao_busca").val(); 
    $.ajax({
        url: "buscar_assunto.php", 
        type: "POST",
        data: { descricao: descricao }, 
        dataType: "json", 
        success: function(data) {
            exibirResultadosAssunto(data);
        },
        error: function() {
            alert("Erro ao buscar assunto.");
        }
    });
});

// Cadastrar assunto
$("#btn_cadastrar_assunto").click(function(event) {
    event.preventDefault();
    enviarFormularioAssunto("inserir_assunto.php", "#cad_assunto");
});

// Editar assunto
$("#btn_salvar_assunto").click(function(event) {
    event.preventDefault();
    enviarFormularioAssunto("editar_assunto.php", "#edit_assunto");
});

// Cancelar edição de assunto
$("#btn_cancelar_assunto").click(function() {
    $("#edit_assunto")[0].reset();
    $("#edit_assunto").hide();
    $("#cad_assunto").show();
});

// Limpar busca de assunto
$("#btn_limpar_busca_assunto").click(function() {
    $("#descricao_busca").val('');
    $("#resultados_busca_assunto").empty();
});

function enviarFormularioAssunto(url, formId) {
    var descricao = $(formId + " input[name='descricao']").val().trim();

    if (!descricao) {
        alert('O campo descrição é obrigatório!');
        return; // Impede o envio do formulário
    }

    var formData = $(formId).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(response) {
            if (response === "duplicado") {
                alert("Assunto já existe!");
            } else if (response === "success") {
                alert("Assunto salvo com sucesso!");
                $(formId)[0].reset();
                $("#resultados_busca_assunto").empty();
                $("#cad_assunto").show();
                $("#edit_assunto").hide();
            } else {
                alert("Erro ao salvar assunto: " + response);
            }
        },
        error: function() {
            alert("Erro ao salvar assunto.");
        }
    });
}

function exibirResultadosAssunto(data) {
    var resultados = $("#resultados_busca_assunto");
    resultados.empty();
    if (data.length === 0) {
        resultados.append("<p>Nenhum assunto encontrado.</p>");
        return;
    }

    var tabela = $("<table>").addClass("table table-striped");
    var thead = $("<thead>").append(
        $("<tr>").append(
            $("<th>").text("Descrição"),
            $("<th>").text("Ações")
        )
    );
    tabela.append(thead);

    var tbody = $("<tbody>");
    $.each(data, function(index, assunto) {
        var linha = $("<tr>").append(
            $("<td>").text(assunto.descricao),
            $("<td>").append(
                $("<button>")
                    .addClass("btn btn-warning btn-sm btn-editar-assunto")
                    .text("Editar")
                    .data("assunto", assunto), 
                $("<button>")
                    .addClass("btn btn-danger btn-sm btn-excluir-assunto")
                    .text("Excluir")
                    .data("assunto_id", assunto.id_assunto) 
            )
        );
        tbody.append(linha);
    });
    tabela.append(tbody);
    resultados.append(tabela);

    $(".btn-editar-assunto").click(function() {
        var assunto = $(this).data("assunto");
        $("#edit_assunto_id").val(assunto.id_assunto);
        $("#edit_descricao").val(assunto.descricao);
        $("#cad_assunto").hide();
        $("#edit_assunto").show();
    });

    $(".btn-excluir-assunto").click(function() {
        if (confirm("Tem certeza que deseja excluir este assunto?")) {
            var assunto_id = $(this).data("assunto_id");
            $.ajax({
                url: "delete_assunto.php",
                type: "POST",
                data: { id_assunto: assunto_id },
                success: function(response) {
                    if (response === "success") {
                        alert("Assunto excluído com sucesso!");
                        $("#btn_buscar_assunto").click();
                    } else {
                        alert("Erro ao excluir assunto: " + response);
                    }
                },
                error: function() {
                    alert("Erro ao excluir assunto.");
                }
            });
        }
    });
}
// Buscar autor
$("#btn_buscar_autor").click(function() {
    var nome = $("#nome_busca").val(); 
    $.ajax({
        url: "buscar_autor.php", 
        type: "POST",
        data: { nome: nome }, 
        dataType: "json", 
        success: function(data) {
            exibirResultadosAutor(data);
        },
        error: function() {
            alert("Erro ao buscar autor.");
        }
    });
});

// Cadastrar autor
$("#btn_cadastrar_autor").click(function(event) {
    event.preventDefault();
    enviarFormularioAutor("inserir_autor.php", "#cad_autor");
});

// Editar autor
$("#btn_salvar_autor").click(function(event) {
    event.preventDefault();
    enviarFormularioAutor("editar_autor.php", "#edit_autor");
});

// Cancelar edição de autor
$("#btn_cancelar_autor").click(function() {
    $("#edit_autor")[0].reset();
    $("#edit_autor").hide();
    $("#cad_autor").show();
});

// Limpar busca de autor
$("#btn_limpar_busca_autor").click(function() {
    $("#nome_busca").val('');
    $("#resultados_busca_autor").empty();
});

function enviarFormularioAutor(url, formId) {
    var nome = $(formId + " input[name='nome']").val().trim();
    var nacionalidade = $(formId + " input[name='nacionalidade']").val().trim();

    if (!nome) {
        alert('O campo nome é obrigatório!');
        return; // Impede o envio do formulário
    }

    var formData = $(formId).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(response) {
            if (response === "duplicado") {
                alert("Autor já existe!");
            } else if (response === "success") {
                alert("Autor salvo com sucesso!");
                $(formId)[0].reset();
                $("#resultados_busca_autor").empty();
                $("#cad_autor").show();
                $("#edit_autor").hide();
            } else {
                alert("Erro ao salvar autor: " + response);
            }
        },
        error: function() {
            alert("Erro ao salvar autor.");
        }
    });
}

function exibirResultadosAutor(data) {
    var resultados = $("#resultados_busca_autor");
    resultados.empty();
    if (data.length === 0) {
        resultados.append("<p>Nenhum autor encontrado.</p>");
        return;
    }

    var tabela = $("<table>").addClass("table table-striped");
    var thead = $("<thead>").append(
        $("<tr>").append(
            $("<th>").text("Nome"),
            $("<th>").text("Nacionalidade"),
            $("<th>").text("Ações")
        )
    );
    tabela.append(thead);

    var tbody = $("<tbody>");
    $.each(data, function(index, autor) {
        var linha = $("<tr>").append(
            $("<td>").text(autor.nome),
            $("<td>").text(autor.nacionalidade),
            $("<td>").append(
                $("<button>")
                    .addClass("btn btn-warning btn-sm btn-editar-autor")
                    .text("Editar")
                    .data("autor", autor), 
                $("<button>")
                    .addClass("btn btn-danger btn-sm btn-excluir-autor")
                    .text("Excluir")
                    .data("autor_id", autor.id_autor) 
            )
        );
        tbody.append(linha);
    });
    tabela.append(tbody);
    resultados.append(tabela);

    $(".btn-editar-autor").click(function() {
        var autor = $(this).data("autor");
        $("#edit_autor_id").val(autor.id_autor);
        $("#edit_nome").val(autor.nome);
        $("#edit_nacionalidade").val(autor.nacionalidade);
        $("#cad_autor").hide();
        $("#edit_autor").show();
    });

    $(".btn-excluir-autor").click(function() {
        if (confirm("Tem certeza que deseja excluir este autor?")) {
            var autor_id = $(this).data("autor_id");
            $.ajax({
                url: "delete_autor.php",
                type: "POST",
                data: { id_autor: autor_id },
                success: function(response) {
                    if (response === "success") {
                        alert("Autor excluído com sucesso!");
                        $("#btn_buscar_autor").click();
                    } else {
                        alert("Erro ao excluir autor: " + response);
                    }
                },
                error: function() {
                    alert("Erro ao excluir autor.");
                }
            });
        }
    });
}
// Buscar sugestões de usuários
    var nome = $(this).val();
    if (nome.length >= 3) {
        $.ajax({
            url: "buscar_usuario.php",
            type: "POST",
            data: { nome: nome },
            dataType: "json",
            success: function(data) {
                var listaUsuarios = $("#lista_usuarios");
                listaUsuarios.empty();
                $.each(data, function(index, usuario) {
                    listaUsuarios.append("<div class='usuario-item' data-id='" + usuario.id_usuario + "'>" + usuario.nome + "</div>");
                });
                $(".usuario-item").click(function() {
                    $("#usuario").val($(this).text());
                    $("#usuario").data("id_usuario", $(this).data("id"));
                    listaUsuarios.empty();
                });
            },
            error: function() {
                alert("Erro ao buscar usuários.");
            }
        });
    }
});

$(document).ready(function() {
    // Buscar todos os usuários
    $("#usuario").keyup(function() {
        var nome = $(this).val();
        $.ajax({
            url: "listar_usuario_reserva.php",
            type: "POST",
            data: { nome: nome },
            dataType: "json",
            success: function(data) {
                var listaUsuarios = $("#lista_usuarios");
                listaUsuarios.empty();
                $.each(data, function(index, usuario) {
                    listaUsuarios.append("<div class='usuario-item' data-id='" + usuario.id_usuario + "'>" + usuario.nome + "</div>");
                });
                $(".usuario-item").click(function() {
                    $("#usuario").val($(this).text());
                    $("#usuario").data("id_usuario", $(this).data("id"));
                    listaUsuarios.empty();
                });
            },
            error: function() {
                alert("Erro ao buscar usuários.");
            }
        });
    });

    // Buscar livros com quantidade >= 0
    $("#livros").keyup(function() {
        var titulo = $(this).val();
        $.ajax({
            url: "listar_livro_reserva.php",
            type: "POST",
            data: { titulo: titulo },
            dataType: "json",
            success: function(data) {
                var listaLivros = $("#lista_livros");
                listaLivros.empty();
                $.each(data, function(index, livro) {
                    listaLivros.append("<div class='livro-item' data-id='" + livro.id_livro + "'>" + livro.titulo + " (" + livro.quantidade_disponivel + " disponível)</div>");
                });
                $(".livro-item").click(function() {
                    $("#livros").val($(this).text());
                    $("#livros").data("id_livro", $(this).data("id"));
                    listaLivros.empty();
                });
            },
            error: function() {
                alert("Erro ao buscar livros.");
            }
        });
    });

    // Reservar livro
    $("#btn_reservar").click(function(event) {
        event.preventDefault();
        var id_usuario = $("#usuario").data("id_usuario");
        var id_livro = $("#livros").data("id_livro");
        if (!id_usuario || !id_livro) {
            alert("Selecione um usuário e um livro.");
            return;
        }

        $.ajax({
            url: "inserir_reserva.php",
            type: "POST",
            data: {
                id_usuario: id_usuario,
                id_livro: id_livro
            },
            success: function(response) {
                if (response === "success") {
                    alert("Reserva realizada com sucesso!");
                    $("#cad_reserva")[0].reset();
                    $("#resultados_busca_reserva").empty();
                } else {
                    alert("Erro ao realizar reserva: " + response);
                }
            },
            error: function() {
                alert("Erro ao realizar reserva.");
            }
        });
    });

    // Listar reservas
    $("#btn_listar").click(function() {
        $.ajax({
            url: "buscar_reserva.php",
            type: "POST",
            dataType: "json",
            success: function(data) {
                exibirResultadosReserva(data);
            },
            error: function() {
                alert("Erro ao buscar reservas.");
            }
        });
    });

    // Limpar listagem
    $("#btn_limpar_listagem").click(function() {
        $("#resultados_busca_reserva").empty();
    });

    // Exibir resultados de reservas
    function exibirResultadosReserva(data) {
        var resultados = $("#resultados_busca_reserva");
        resultados.empty();
        if (data.length === 0) {
            resultados.append("<p>Nenhuma reserva encontrada.</p>");
            return;
        }

        var tabela = $("<table>").addClass("table table-striped");
        var thead = $("<thead>").append(
            $("<tr>").append(
                $("<th>").append($("<input>").attr("type", "checkbox").attr("id", "select_all")),
                $("<th>").text("Data da Reserva"),
                $("<th>").text("Usuário"),
                $("<th>").text("Livro"),
                $("<th>").text("Ações")
            )
        );
        tabela.append(thead);

        var tbody = $("<tbody>");
        $.each(data, function(index, reserva) {
            var linha = $("<tr>").append(
                $("<td>").append($("<input>").attr("type", "checkbox").addClass("select-checkbox").data("id_reserva", reserva.id_reserva)),
                $("<td>").text(reserva.data_reserva),
                $("<td>").text(reserva.nome_usuario),
                $("<td>").text(reserva.nome_livro),
                $("<td>").append(
                    $("<button>")
                        .addClass("btn btn-success btn-sm btn-emprestar-reserva")
                        .text("Emprestar")
                        .data("id_reserva", reserva.id_reserva)
                        .prop("disabled", reserva.quantidade_disponivel <= 0)
                )
            );
            tbody.append(linha);
        });
        tabela.append(tbody);
        resultados.append(tabela);

        // Selecionar todas as reservas
        $("#select_all").click(function() {
            $(".select-checkbox").prop('checked', this.checked);
        });

        // Excluir reservas selecionadas
        $("#btn_excluir").click(function() {
            if (confirm("Tem certeza que deseja excluir as reservas selecionadas?")) {
                var ids_reservas = [];
                $(".select-checkbox:checked").each(function() {
                    ids_reservas.push($(this).data("id_reserva"));
                });

                if (ids_reservas.length > 0) {
                    $.ajax({
                        url: "delete_reserva.php",
                        type: "POST",
                        data: { id_reserva: ids_reservas },
                        success: function(response) {
                            if (response === "success") {
                                alert("Reservas excluídas com sucesso!");
                                $("#btn_listar").click();
                            } else {
                                alert("Erro ao excluir reservas: " + response);
                            }
                        },
                        error: function() {
                            alert("Erro ao excluir reservas.");
                        }
                    });
                } else {
                    alert("Nenhuma reserva selecionada para exclusão.");
                }
            }
        });
    }
});
    
    
// Função para exibir o formulário de cadastro
function showCadastro() {
    $("#formLogin").hide();
    $("#cad_usuario")[0].reset();
    $("#cad_usuario").show();
}

// Função para exibir o formulário de login
function showLogin() {
    $("#cad_usuario").hide();
    var formLogin = $("#formLogin")[0];
    if (formLogin) {
        formLogin.reset();
    } else {
        console.error("Elemento com ID 'formLogin' não encontrado.");
    }
    $("#formLogin").show();
}


// Inicialmente, exibir o formulário de login
showLogin();

// Submeter o formulário de login
$("#formLogin").submit(function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: "login.php",
        type: "POST",
        data: formData,
        success: function(response) {
            if (response === "Usuário não cadastrado!") {
                alert(response);
                showCadastro();
            } else if (response === "Usuário ou senha inválidos!") {
                alert(response);
            } else {
                window.location.href = "indexlogado.php";
            }
        },
        error: function() {
            alert("Erro ao tentar fazer login.");
        }
    });
});

//---------------------------------------------------//
$(document).ready(function() {
    // Exibir ou ocultar a data de devolução real
    $("#chk_data_devolucao_real").change(function() {
        if ($(this).is(":checked")) {
            $("#data_devolucao_real").show();
        } else {
            $("#data_devolucao_real").hide();
        }
    });

    // Buscar sugestões de usuários
    $("#usuario1").keyup(function() {
        var nome = $(this).val();
        if (nome.length >= 3) {
            $.ajax({
                url: "buscar_usuarios_emprestimo.php",
                type: "POST",
                data: { nome: nome },
                dataType: "json",
                success: function(data) {
                    var listaUsuarios = $("#lista_usuarios1");
                    listaUsuarios.empty();
                    $.each(data, function(index, usuario) {
                        listaUsuarios.append("<div class='usuario-item' data-id='" + usuario.id_usuario + "'>" + usuario.nome + "</div>");
                    });
                    $(".usuario-item").click(function() {
                        $("#usuario1").val($(this).text());
                        $("#usuario1").data("id_usuario", $(this).data("id"));
                        listaUsuarios.empty();
                    });
                },
                error: function() {
                    alert("Erro ao buscar usuários.");
                }
            });
        } else {
            $("#lista_usuarios1").empty();
        }
    });

    // Buscar sugestões de livros
    $("#livros1").keyup(function() {
        var titulo = $(this).val();
        if (titulo.length >= 3) {
            $.ajax({
                url: "buscar_livros_emprestimo.php",
                type: "POST",
                data: { titulo: titulo },
                dataType: "json",
                success: function(data) {
                    var listaLivros = $("#lista_livros1");
                    listaLivros.empty();
                    $.each(data, function(index, livro) {
                        listaLivros.append("<div class='livro-item' data-id='" + livro.id_livro + "' data-quantidade='" + livro.quantidade_disponivel + "'>" + livro.titulo + " (" + livro.quantidade_disponivel + " disponível)</div>");
                    });
                    $(".livro-item").click(function() {
                        var livroQuantidade = $(this).data("quantidade");
                        if (livroQuantidade <= 0) {
                            alert("Livro indisponível para empréstimo.");
                        } else {
                            var selectedLivros = $("#livros1").data("selected") || [];
                            selectedLivros.push({ id: $(this).data("id"), titulo: $(this).text() });
                            $("#livros1").data("selected", selectedLivros);
                            atualizarLivrosSelecionados();
                        }
                        $("#lista_livros1").empty();
                        $("#livros1").val('');
                    });
                },
                error: function() {
                    alert("Erro ao buscar livros.");
                }
            });
        } else {
            $("#lista_livros1").empty();
        }
    });

    // Atualizar lista de livros selecionados
    function atualizarLivrosSelecionados() {
        var selectedLivros = $("#livros1").data("selected") || [];
        var listaLivrosSelecionados = $("#lista_livros_selecionados1");
        listaLivrosSelecionados.empty();
        $.each(selectedLivros, function(index, livro) {
            listaLivrosSelecionados.append("<div class='selected-item'>" + livro.titulo + "</div>");
        });
    }
});

//-------Emprestimo Mode ---------------//
$(document).ready(function() {
    // Exibir ou ocultar a data de devolução real
    $("#chk_data_devolucao_real1").change(function() {
        if ($(this).is(":checked")) {
            $("#data_devolucao_real1").show();
        } else {
            $("#data_devolucao_real1").hide();
        }
    });

    // Buscar sugestões de usuários
    $("#usuario1").keyup(function() {
        var nome = $(this).val();
        if (nome.length >= 3) {
            $.ajax({
                url: "buscar_usuarios_emprestimo.php",
                type: "POST",
                data: { nome: nome },
                dataType: "json",
                success: function(data) {
                    var listaUsuarios = $("#lista_usuarios1");
                    listaUsuarios.empty();
                    $.each(data, function(index, usuario) {
                        listaUsuarios.append("<div class='usuario-item' data-id='" + usuario.id_usuario + "'>" + usuario.nome + "</div>");
                    });
                    $(".usuario-item").click(function() {
                        $("#usuario1").val($(this).text());
                        $("#usuario1").data("id_usuario", $(this).data("id"));
                        listaUsuarios.empty();
                    });
                },
                error: function() {
                    alert("Erro ao buscar usuários.");
                }
            });
        } else {
            $("#lista_usuarios1").empty();
        }
    });

    // Buscar sugestões de livros
    $("#livros1").keyup(function() {
        var titulo = $(this).val();
        if (titulo.length >= 3) {
            $.ajax({
                url: "buscar_livros_emprestimo.php",
                type: "POST",
                data: { titulo: titulo },
                dataType: "json",
                success: function(data) {
                    var listaLivros = $("#lista_livros1");
                    listaLivros.empty();
                    $.each(data, function(index, livro) {
                        listaLivros.append("<div class='livro-item' data-id='" + livro.id_livro + "' data-quantidade='" + livro.quantidade_disponivel + "'>" + livro.titulo + " (" + livro.quantidade_disponivel + " disponível)</div>");
                    });
                    $(".livro-item").click(function() {
                        var livroQuantidade = $(this).data("quantidade");
                        if (livroQuantidade <= 0) {
                            alert("Livro indisponível para empréstimo.");
                        } else {
                            var selectedLivros = $("#livros1").data("selected") || [];
                            selectedLivros.push({ id: $(this).data("id"), titulo: $(this).text() });
                            $("#livros1").data("selected", selectedLivros);
                            atualizarLivrosSelecionados();
                        }
                        $("#lista_livros1").empty();
                        $("#livros1").val('');
                    });
                },
                error: function() {
                    alert("Erro ao buscar livros.");
                }
            });
        } else {
            $("#lista_livros1").empty();
        }
    });

    // Atualizar lista de livros selecionados
    function atualizarLivrosSelecionados() {
        var selectedLivros = $("#livros1").data("selected") || [];
        var listaLivrosSelecionados = $("#lista_livros_selecionados1");
        listaLivrosSelecionados.empty();
        $.each(selectedLivros, function(index, livro) {
            listaLivrosSelecionados.append("<div class='selected-item'>" + livro.titulo + "</div>");
        });
    }

    // Emprestar livro
    $("#btn_emprestar1").click(function(event) {
        event.preventDefault();
        var id_usuario = $("#usuario1").data("id_usuario");
        var selectedLivros = $("#livros1").data("selected") || [];
        var id_livros = selectedLivros.map(function(livro) { return livro.id; });
        var data_devolucao_prevista = $("#data_devolucao_prevista1").val();

        if (!id_usuario || id_livros.length === 0 || !data_devolucao_prevista) {
            alert("Preencha todos os campos obrigatórios.");
            return;
        }

        $.ajax({
            url: "inserir_emprestimo.php",
            type: "POST",
            data: {
                id_usuario: id_usuario,
                id_livros: id_livros,
                data_devolucao_prevista: data_devolucao_prevista
            },
            success: function(response) {
                if (response === "success") {
                    alert("Empréstimo realizado com sucesso!");
                    $("#cad_emprestimo1")[0].reset();
                    $("#resultados_busca_emprestimo1").empty();
                    $("#usuario1").data("id_usuario", null);
                    $("#livros1").data("selected", []);
                    atualizarLivrosSelecionados();
                } else {
                    alert("Erro ao realizar empréstimo: " + response);
                }
            },
            error: function() {
                alert("Erro ao realizar empréstimo.");
            }
        });
    });

    // Função para verificar reservas do usuário
    function verificarReservas(id_usuario) {
        $.ajax({
            url: "verificar_reserva_emprestimo.php",
            type: "POST",
            data: { id_usuario: id_usuario },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    var reservas = "Este usuário possui reservas:";
                    $.each(data, function(index, reserva) {
                        reservas += "\n- " + reserva.titulo + " (Reservado em: " + reserva.data_reserva + ")";
                    });
                    alert(reservas);
                }
            },
            error: function() {
                alert("Erro ao verificar reservas.");
            }
        });
    }
});
//segunda etapa
$(document).ready(function() {
    // Listar empréstimos
    $("#btn_listar_emprestimos1").click(function() {
        $.ajax({
            url: "buscar_emprestimo.php",
            type: "POST",
            dataType: "json",
            success: function(data) {
                exibirResultadosEmprestimo(data);
            },
            error: function() {
                alert("Erro ao buscar empréstimos.");
            }
        });
    });

    // Limpar listagem de empréstimos
    $("#btn_limpar_listagem_emprestimos1").click(function() {
        $("#resultados_busca_emprestimo1").empty();
    });

    // Exibir resultados de empréstimos
    function exibirResultadosEmprestimo(data) {
        var resultados = $("#resultados_busca_emprestimo1");
        resultados.empty();
        if (data.length === 0) {
            resultados.append("<p>Nenhum empréstimo encontrado.</p>");
            return;
        }

        var tabela = $("<table>").addClass("table table-striped");
        var thead = $("<thead>").append(
            $("<tr>").append(
                $("<th>").append($("<input>").attr("type", "checkbox").attr("id", "select_all_emprestimos1")),
                $("<th>").text("Data do Empréstimo"),
                $("<th>").text("Data de Devolução Prevista"),
                $("<th>").text("Data de Devolução Real"),
                $("<th>").text("Usuário"),
                $("<th>").text("Livro"),
                $("<th>").text("Ações")
            )
        );
        tabela.append(thead);

        var tbody = $("<tbody>");
        $.each(data, function(index, emprestimo) {
            var linha = $("<tr>").append(
                $("<td>").append($("<input>").attr("type", "checkbox").addClass("select-checkbox").data("id_emprestimo", emprestimo.id_emprestimo)),
                $("<td>").text(emprestimo.data_emprestimo),
                $("<td>").text(emprestimo.data_devolucao_prevista),
                $("<td>").text(emprestimo.data_devolucao_real || "-"),
                $("<td>").text(emprestimo.nome_usuario),
                $("<td>").text(emprestimo.nome_livro),
                $("<td>").append(
                    emprestimo.data_devolucao_real === null ? 
                    $("<button>")
                        .addClass("btn btn-success btn-sm btn-devolver1")
                        .text("Devolver")
                        .data("id_emprestimo", emprestimo.id_emprestimo) : 
                    "-"
                )
            );
            tbody.append(linha);
        });
        tabela.append(tbody);
        resultados.append(tabela);

        // Selecionar todos os empréstimos
        $("#select_all_emprestimos1").click(function() {
            $(".select-checkbox").prop('checked', this.checked);
        });

        // Devolver livro individual
        $(document).on('click', '.btn-devolver1', function() {
            var id_emprestimo = $(this).data("id_emprestimo");
            $.ajax({
                url: "atualizar_devolucao.php",
                type: "POST",
                data: { id_emprestimo: id_emprestimo },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        alert("Livro devolvido com sucesso! Multa: " + response.multa);
                        $("#btn_listar_emprestimos1").click(); // Atualiza a lista de empréstimos
                    } else {
                        alert("Erro ao devolver livro.");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Erro ao devolver livro: ", textStatus, errorThrown);
                    alert("Erro ao devolver livro.");
                }
            });
        });

        // Excluir empréstimos selecionados
        $("#btn_excluir1").click(function() {
            if (confirm("Tem certeza que deseja excluir os empréstimos selecionados?")) {
                var ids_emprestimos = [];
                $(".select-checkbox:checked").each(function() {
                    ids_emprestimos.push($(this).data("id_emprestimo"));
                });

                if (ids_emprestimos.length > 0) {
                    $.ajax({
                        url: "delete_emprestimo.php",
                        type: "POST",
                        data: { id_emprestimo: ids_emprestimos },
                        success: function(response) {
                            if (response === "success") {
                                alert("Empréstimos excluídos com sucesso!");
                                $("#btn_listar_emprestimos1").click();
                            } else {
                                alert("Erro ao excluir empréstimos: " + response);
                            }
                        },
                        error: function() {
                            alert("Erro ao excluir empréstimos.");
                        }
                    });
                } else {
                    alert("Nenhum empréstimo selecionado para exclusão.");
                }
            }
        });

        // Devolver livros selecionados
        $("#btn_devolver1").click(function() {
            var ids_emprestimos = [];
            $(".select-checkbox:checked").each(function() {
                ids_emprestimos.push($(this).data("id_emprestimo"));
            });

            if (ids_emprestimos.length > 0) {
                $.ajax({
                    url: "atualizar_devolucao.php",
                    type: "POST",
                    data: { id_emprestimo: ids_emprestimos },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            alert("Livros devolvidos com sucesso!");
                            $("#btn_listar_emprestimos1").click(); // Atualiza a lista de empréstimos
                        } else {
                            alert("Erro ao devolver livros.");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erro ao devolver livros: ", textStatus, errorThrown);
                        alert("Erro ao devolver livros.");
                    }
                });
            } else {
                alert("Nenhum empréstimo selecionado para devolução.");
            }
        });
    }
});

