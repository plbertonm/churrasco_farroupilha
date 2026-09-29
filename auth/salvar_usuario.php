<?php

require_once __DIR__ . "/../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastrar.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";
$confirmar_senha = $_POST["confirmar_senha"] ?? "";

if ($nome === "" || $email === "" || $senha === "") {
    die("Preencha todos os campos obrigatórios.");
}

if ($senha !== $confirmar_senha) {
    die("As senhas não coincidem.");
}

if (strlen($senha) < 6) {
    die("A senha deve ter pelo menos 6 caracteres.");
}

$sql = "SELECT id FROM usuarios WHERE email = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $stmt->close();
    $conexao->close();

    die("Este e-mail já está cadastrado.");
}

$stmt->close();

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha)
        VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sss",
    $nome,
    $email,
    $senhaHash
);

if ($stmt->execute()) {

    echo "<h1>Cadastro realizado com sucesso!</h1>";
    echo "<p>O usuário foi cadastrado.</p>";

    echo '<a href="login.php">Ir para o login</a>';

} else {

    echo "<h1>Erro ao cadastrar</h1>";
    echo "<p>Não foi possível cadastrar o usuário.</p>";

}

$stmt->close();
$conexao->close();

?>
