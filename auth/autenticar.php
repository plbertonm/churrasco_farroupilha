<?php

require_once "../config/conexao.php";
session_start();

function get_dados_login(string &$email, string &$senha): bool {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($email === '' || $senha === '') {
        return false;
    }

    return true;
}

function validate_dados_login(): bool {
    $email = '';
    $senha = '';

    if (!get_dados_login($email, $senha)) {
        return false;
    }

    return compare_dado_com_banco($email, $senha);
}

function compare_dado_com_banco(string $email, string $senha): bool {
    global $conexao;

    $sql = "SELECT senha FROM usuarios WHERE email = ? LIMIT 1";

    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    $stmt->close();

    if (!$usuario) {
        return false;
    }

    return password_verify($senha, $usuario['senha']);
}

function get_nome_por_email(string $email): ?string {
    global $conexao;

    $sql = "SELECT nome FROM usuarios WHERE email = ? LIMIT 1";

    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        return null;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    $stmt->close();

    if (!$usuario) {
        return null;
    }

    return $usuario['nome'];
}

function main(): void {
    $email = '';
    $senha = '';

    if (!get_dados_login($email, $senha)) {
        header("Location: login.php?error=DataError");
        exit();
    }

    if (!compare_dado_com_banco($email, $senha)) {
        header("Location: login.php?error=DataError");
        exit();
    }

    $_SESSION['usuario'] = get_nome_por_email($email);
    $_SESSION['email'] = $email;

    header('Location: ../index.php');
    exit();
}

main();