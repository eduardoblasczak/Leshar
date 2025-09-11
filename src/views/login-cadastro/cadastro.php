<?php

header("Content-Type: application/json");


$arquivoBD = 'users.json'; 
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($nome) || empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}


$usuarios = file_exists($arquivoBD) ? json_decode(file_get_contents($arquivoBD), true) : [];

foreach ($usuarios as $usuario) {
    
    if ($usuario['email'] === $email) {
        echo json_encode(['success' => false, 'message' => 'Email já cadastrado.']);
        exit;
    }
}

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

$novoUsuario = [
    'nome' => $nome,
    'email' => $email,
    'senha' => $senhaCriptografada 
];

$usuarios[] = $novoUsuario;
file_put_contents($arquivoBD, json_encode($usuarios, JSON_PRETTY_PRINT));

echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
?>