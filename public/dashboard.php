<?php

require_once '../includes/auth_check.php';

$nome_usuario = $_SESSION['usuario_nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Leshar</title>
        <link rel="stylesheet" href="assets/css/dashboard.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Bem-vindo, <?php echo htmlspecialchars($nome_usuario); ?>!</h1>
        <p> Esta é a sua área logada. Estamos em desenvolvimento!</p>
        <a href="logout.php">Sair</a>
    </body>
</html>