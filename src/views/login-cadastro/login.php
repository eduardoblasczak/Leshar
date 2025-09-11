<?php

header('Content-Type: application/json');

$arquivoBD = 'users.json';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Email e senha são obrigatórios.']);
    exit;
}

if (!file_exists($arquivoBD)) {
    echo json_encode(['success' => false, 'message' => 'Email ou senha inválidos.']);
    exit;
}

$usuarios = json_decode(file_get_contents($arquivoBD), true);
$achouUsuario = null;

foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $email) {
        $achouUsuario = $usuario;
        break;
    }
}

if ($achouUsuario && password_verify($senha, $achouUsuario['senha'])) {
    echo json_encode([
        'success' => true, 
        'message' => 'Login efetuado com sucesso!',
        'user' => ['name' => $achouUsuario['nome']] 
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Email ou senha inválidos.']);
}
?>