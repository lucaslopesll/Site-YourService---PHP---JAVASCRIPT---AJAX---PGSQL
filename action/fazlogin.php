<?php
require_once "conecta.php";
session_start();
if (empty($_POST['email']) || empty($_POST['senha'])) {

    $_SESSION['nao_autenticado'] = true;
    header("Location:../pgs/login.php");
    exit();
}
if (ISSET($_POST['email']) || ISSET($_POST['senha'])){
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];

    $resultC = pg_query($conexao, "SELECT * from cliente where email_cliente='$email' and senha_cliente=md5('$senha')");
    }
    if (pg_num_rows($resultC) > 0) {
        $dadosC = pg_fetch_assoc($resultC);
        $_SESSION['user'] = $dadosC["email_cliente"];
        $_SESSION['name'] = $dadosC["nome_cliente"];
        $_SESSION["id_cliente"] = $dadosC["id_cliente"];
        $_SESSION["tipo"] = "C";
        session_start();
        header("Location: ../pgs/painelcliente.php");
  
}
    $resultP = pg_query($conexao, "SELECT * from profissional where email_prof='$email' and senha_prof=md5('$senha')");
   
     if (pg_num_rows($resultP) > 0) {
            $dadosP = pg_fetch_assoc($resultP);
            $_SESSION['userProf'] = $dadosP["email_prof"];
            $_SESSION['nameProf'] = $dadosP["nome_prof"];
            $_SESSION['idProf'] = $dadosP["id_prof"];
            $_SESSION["tipo"] = "P";
            session_start();
            header("Location: ../pgs/relatorioProfi.php");
        }
        if (pg_num_rows($resultP) == 0 && pg_num_rows($resultC) == 0 ){
            $_SESSION['nao_autenticado'] = true;
            header("Location:../pgs/login.php");
            echo "Usuario ou senha não encontrados!";
            exit();
        }



/*
$email = $_REQUEST["email"];
$senha = $_REQUEST["senha"];

function login($connect){
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
$email = filter_input(INPUT_POST , "email", FILTER_VALIDATE_EMAIL);   
$senha = sha1($_POST['senha']);
$result = pg_query($conexao, "SELECT * from cliente where email_cliente='$email' and senha_cliente=md5('$senha')");   
$executar = pg_query($conexao, $result );
$return = pg_fetch_assoc($executar);

if(!empty($return['email'])){
    echo $return['email'];
    header("Location: ../pgs/painelcliente.php"); 
}else{
    echo "usuario ou senha não encontrados!";
}
}
// print_r($_REQUEST);
//if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
     Acessa
    require_once "conecta.php";
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // print_r('Email: ' . $email);
    // print_r('<br>');
    // print_r('Senha: ' . $senha);

    $result = pg_query($conexao, "SELECT * from cliente where email_cliente='$email' and senha_cliente=md5('$senha')");

    // print_r($sql);
    // print_r($result);

    if (pg_num_rows($result) > 0) 
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    else
    {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: ../pgs/painelcliente.php"); 
    }
}
else
{
    // Não acessa
    header('Location: ../pgs/login.php');
}*/


 /* $result = pg_query($conexao, "SELECT * from cliente where email_cliente='$email' and senha_cliente=md5('$senha')");
    if (!$result) {
     header("Location:../pgs/cadastra.php");
    
    }
    if (pg_num_rows($result) > 0) {
    $dados = pg_fetch_array($result);
    $_SESSION["id_cliente"] = $dados["id_cliente"];
    $_SESSION["nome_cliente"] =$dados["nome_cliente"];
    $_SESSION["tipo"] = "C";
    header("Location: ../pgs/painelcliente.php"); 
    }

    else{
    $result = pg_query($conexao, "SELECT * from profissional where email_prof='$email' and senha_prof=md5('$senha')");
    if (!$result) {
        header("Location:../pgs/cadastra .php");
    }
    if (pg_num_rows($result) > 0) {    
    $dados = pg_fetch_array($result);
            $_SESSION["senha_prof"] = $dados["senha_prof"];
            $_SESSION["tipo"] = "P";
            header("Location: ../pgs/perfilProfi.php");
        }
    }*/
