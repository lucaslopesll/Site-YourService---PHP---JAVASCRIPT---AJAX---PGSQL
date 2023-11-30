<?php
session_start();
require_once "conecta.php";

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$datanasc = $_POST["datanasc"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$senha = $_POST["senha"];

$result = pg_query($conexao, "INSERT INTO cliente (nome_cliente, endereco_cliente, datanasc_cliente, email_cliente, telefone_cliente, senha_cliente) 
        VALUES ('$nome', '$endereco', '$datanasc', '$email', '$telefone', md5('$senha'))");

if (!$result) {
    echo "Falha ao realizar cadastro";
} else {
    header("Location: ../pgs/login.php");
}

?>