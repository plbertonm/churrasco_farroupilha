<?php

include_once __DIR__ . "/config/conexao.php";

session_start();

if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header('Location: auth/login.php');
    exit();
}

$totalInscritos = $conexao->query(
    "SELECT COUNT(*) AS total FROM participantes"
)->fetch_assoc()["total"];

$confirmados = $conexao->query(
    "SELECT COUNT(*) AS total FROM participantes WHERE confirmado = 1"
)->fetch_assoc()["total"];

$naoConfirmados = $conexao->query(
    "SELECT COUNT(*) AS total FROM participantes WHERE confirmado = 0"
)->fetch_assoc()["total"];

$pagamentosRealizados = $conexao->query(
    "SELECT COUNT(*) AS total FROM participantes WHERE pago = 1"
)->fetch_assoc()["total"];

$pagamentosPendentes = $conexao->query(
    "SELECT COUNT(*) AS total FROM participantes WHERE pago = 0"
)->fetch_assoc()["total"];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Churrasco da Semana Farroupilha</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

    <h1>Churrasco da Semana Farroupilha</h1>

    <h2>Resumo</h2>

    <h3>Total de inscritos: <?= $totalInscritos ?></h3>

    <h3>Confirmados: <?= $confirmados ?></h3>

    <h3>Não confirmados: <?= $naoConfirmados ?></h3>

    <h3>Pagamentos realizados: <?= $pagamentosRealizados ?></h3>

    <h3>Pagamentos pendentes: <?= $pagamentosPendentes ?></h3>

    <hr>

    <h2>Participantes</h2>

    <a href="participantes/cadastrar.php">
        Cadastrar participante
    </a>

    <br><br>

    <a href="participantes/listar.php">
        Listar participantes
    </a>

    <br><br>

    <a href="auth/logout.php">
        Sair
    </a>

</body>

</html>
