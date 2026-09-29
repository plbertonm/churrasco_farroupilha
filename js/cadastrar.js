document.getElementById("formCadastro").addEventListener("submit", function(event) {

    const nome = document.getElementById("nome").value.trim();
    const turma = document.getElementById("turma").value.trim();
    const tipoChurrasco = document.getElementById("tipo_churrasco").value;
    const telefone = document.getElementById("telefone").value.trim();

    if (nome === "") {
        alert("O nome é obrigatório.");
        event.preventDefault();
        return;
    }

    if (turma === "") {
        alert("A turma é obrigatória.");
        event.preventDefault();
        return;
    }

    if (tipoChurrasco === "") {
        alert("Selecione o tipo de churrasco.");
        event.preventDefault();
        return;
    }

    if (telefone === "") {
        alert("O telefone é obrigatório.");
        event.preventDefault();
        return;
    }

});
