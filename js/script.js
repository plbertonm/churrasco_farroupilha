function confirmarExclusao() {
    return confirm("Deseja realmente apagar?")
};

function easterEggs() {
    const easterEggs = {
        "fih": "FIH 🐟",
        "ronaldo": "RONAAAALDO!",
        "bora bill": "BORA BILL 🗣️"
    };

    const pesquisa = document.getElementById("pesquisa").value.toLowerCase();

    if (easterEggs[pesquisa]) {
        alert(easterEggs[pesquisa]);
    }
};
