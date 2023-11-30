<?php
session_start();
require_once "conecta.php";

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$datanasc = $_POST["datanasc"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$profissao = $_POST["profissao"];
$senha = $_POST["senha"];
$tempo = $_POST["tempo"];
$foto = $_POST["foto"];


$result = pg_query($conexao, "INSERT INTO profissional (nome_prof, cpf_prof, endereco_prof,telefone_prof, datanasc_prof, tipo_prof, temposervico_prof, email_prof, senha_prof, foto_prof ) 
        VALUES ('$nome', '$cpf', '$endereco', '$telefone', '$datanasc', '$profissao', '$tempo', '$email', md5('$senha'), '$foto')");

if (!$result) {
    echo "Falha ao realizar cadastro";
} else {
    header("Location: ../pgs/login.php");
}


?>