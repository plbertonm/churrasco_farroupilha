document.getElementById("formUsuario").addEventListener("submit", function(event) {

    const nome = document.getElementById("nome").value.trim();
    const email = document.getElementById("email").value.trim();
    const senha = document.getElementById("senha").value;
    const confirmarSenha = document.getElementById("confirmar_senha").value;

    if (nome === "") {
        alert("O nome é obrigatório.");
        event.preventDefault();
        return;
    }

    if (email === "") {
        alert("O e-mail é obrigatório.");
        event.preventDefault();
        return;
    }

    if (senha === "") {
        alert("A senha é obrigatória.");
        event.preventDefault();
        return;
    }

    if (senha.length < 6) {
        alert("A senha deve ter pelo menos 6 caracteres.");
        event.preventDefault();
        return;
    }

    if (senha !== confirmarSenha) {
        alert("As senhas não coincidem.");
        event.preventDefault();
        return;
    }

});
