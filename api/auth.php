<?php

require_once '../db/conexao.php';

header('Content-Type: application/json');

$action = $_POST['action'] ?? '';

//Rota de Cadastro
if ($action === 'register') {

    $nome = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';

    if (empty($nome) || empty($email) || empty($senha)) {
        echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
        exit;
    }

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("INSERT INTO usuario (nome, email, senha, tipo_usuario) VALUES (?,?,?, 'USUARIO')");
    $stmt->bind_param("sss", $nome, $email, $senhaCriptografada);

    if ($stmt->execute()) {
        $id_novo_usuario = $conexao->insert_id;

        $conexao->query("INSERT INTO aluno (usuario_id_usuario) VALUES ($id_novo_usuario)");
        $conexao->query("INSERT INTO mentor (usuario_id_usuario) VALUES ($id_novo_usuario)");
    
        echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
    } else{
        if ($conexao->errno === 1062) {
            echo json_encode(['success' => false, 'message' => 'Email já cadastrado.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar usuário.']);
        }
    }
    $stmt->close();
}
//Rota de Login
elseif ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';

    if (empty($email) || empty($senha)) {
        echo json_encode(['sucess' => false, 'message' => 'Por favor, preencha todos os campos']);
        exit;
    }

    $stmt = $conexao->prepare("SELECT id_usuario, nome, senha, senha FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            // Login sucedido
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            
            echo json_encode(['success' => true, 'message' => 'Login efetuado com sucesso!']);
        } else {
            // Senha incorreta.
            echo json_encode(['success' => false, 'message' => 'Email ou senha inválidos.']);
        }
    } else {
            echo json_encode(['success' => false 'message' => 'Email ou senha inválidos.']);
    }

    $stmt->close();
}
else{
    echo json_encode(['success' => false, 'message' => 'Ação inválida.']);
}

$conexao->close();
?>
