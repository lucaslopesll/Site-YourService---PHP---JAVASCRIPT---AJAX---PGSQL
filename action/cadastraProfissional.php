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


$result = pg_query($conexao, "INSERT INTO profissional (nome_prof, cpf_prof, endereco_prof,telefone_prof, datanasc_prof, tipo_prof, temposervico_prof, email_prof, senha_prof ) 
        VALUES ('$nome', '$cpf', '$endereco', '$telefone', '$datanasc', '$profissao', '$tempo', '$email', md5('$senha'))");


$resultProfissional = pg_query($conexao, "SELECT MAX(id_prof) FROM profissional");

if(!$resultProfissional){
    die("Erro ao realizar a consulta");
}else{
    $linha = pg_fetch_array($resultProfissional);
}

$listaCheckbox = null;
if(isset($_POST['servico']))
    $listaCheckbox = $_POST['servico'];

    if($listaCheckbox !== null){
        for($i =0; $i < count($listaCheckbox); $i++){

   
    $result=pg_query($conexao, "INSERT INTO especialidade (especialidade_prof_fk, especialidade_lista_fk) 
            VALUES ($linha[0],'$listaCheckbox[$i]')");
    
        }
    }       

if (!$result) {
    echo "Falha ao realizar cadastro";
} else {
    
    header("Location: ../pgs/login.php");
}



?>