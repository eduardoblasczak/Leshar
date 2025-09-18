<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$servidor = "localhost";
$usuario_db = "root";
$senha_db = "gu260806";
$banco = "LESHAR";

$conexao = new mysqli ($servidor, $usuario_db, $senha_db, $banco);

if ($conexao->connect_error){
    die("Falha na conexão com o banco de dados:" . $conexao->connect_error);
}
?>