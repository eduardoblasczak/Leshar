<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$servidor = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "LESHAR";

$conexao = new mysqli ($servidor, $usuario_db, $senha_db, $banco, 3307);

if ($conexao->connect_error){
    die("Falha na conexão com o banco de dados:" . $conexao->connect_error);
}
?>