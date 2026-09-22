<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login - Churrasco</h1>
    <form action="autenticar.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email...">
        <label for="usuario">Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Senha...">
        <button type="submit">Logar</button>
    </form>

    <div id="error">
        <?php
        if ($_GET['error']) {
            $error = $_GET['error'];
            if ($error == 'DataError') {
                echo "<h2>Erro: Dados Inválidos Enviados ou conexão com banco falhou!</h2>";
            }
        }
        ?>
    </div>
</body>
</html>