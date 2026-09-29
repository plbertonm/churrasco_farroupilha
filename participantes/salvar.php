<?php

include_once __DIR__ . "/../auth/verificar_login.php";
include_once __DIR__ . "/../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastrar.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$turma = trim($_POST["turma"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$tipo_churrasco = $_POST["tipo_churrasco"] ?? "";
$acompanhamento = trim($_POST["acompanhamento"] ?? "");
$confirmado = $_POST["confirmado"] ?? "";
$pago = $_POST["pago"] ?? "";

if ($nome === "" || $turma === "" || $tipo_churrasco === "") {
    die("Preencha todos os campos obrigatórios.");
}

$sql = "INSERT INTO participantes
        (nome, turma, telefone, tipo_churrasco, acompanhamento, confirmado, pago)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssssss",
    $nome,
    $turma,
    $telefone,
    $tipo_churrasco,
    $acompanhamento,
    $confirmado,
    $pago
);

if ($stmt->execute()) {
    echo "<h1>Cadastro realizado com sucesso!</h1>";
    echo "<p>O participante foi cadastrado no sistema.</p>";
    echo '<a href="cadastrar.php">Cadastrar outro participante</a><br>';
    echo '<a href="listar.php">Voltar para a lista</a>';
} else {
    echo "<h1>Erro ao cadastrar</h1>";
    echo "<p>Não foi possível cadastrar o participante.</p>";
}

$stmt->close();
$conexao->close();

?>
