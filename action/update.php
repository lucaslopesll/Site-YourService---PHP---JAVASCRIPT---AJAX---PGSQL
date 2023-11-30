<?php
session_start();
require_once "conecta.php";
$id = $_POST["id"];

echo($_FILES['upload']['name']);

 


if(isset($_FILES['upload'])){
 
  $upload = $_FILES['upload'];
  if($upload['error'])
  
     die("Falha ao enviar arquivo");
  

   if($upload['size'] > 2097152)
     die("Arquivo muito grande!! Max: 2MB");
 
   $pasta = "../uploads/";
   $nomedoArquivo = $upload['name'];
   $novoNomedoArquivo = uniqid();
   $extensao = strtolower(pathinfo($nomedoArquivo, PATHINFO_EXTENSION));
 
   if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'GIF' && $extensao != 'pdf'&& $extensao != 'jpeg')
     die("Tipo de arquivo não aceito");
 
   $path = $pasta . $novoNomedoArquivo . "." . $extensao;
 
   $deu_certo = move_uploaded_file($upload["tmp_name"], $path );
   $result = pg_query($conexao, "UPDATE profissional SET foto_prof='$path' WHERE id_prof= '$id'");
    if($deu_certo)
        echo "<p>Arquivo enviado com sucesso!</p>";
     
  }


$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$datanasc = $_POST["datanasc"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$profissao = $_POST["profissao"];
$tempo = $_POST["tempo"];


    if(!$conexao)
    {
        die("Falha ao conectar com o Banco de Dados");
    }
    else {
        $result = pg_query($conexao, "UPDATE profissional SET nome_prof='$nome', cpf_prof='$cpf', endereco_prof='$endereco',telefone_prof='$telefone',  datanasc_prof='$datanasc', tipo_prof='$profissao', temposervico_prof='$tempo' , email_prof='$email' WHERE id_prof='$id'");
        if(!$result){
            die("Falha ao realizar modificação");
        }
        else{
            header("Location: ../pgs/perfilProfi.php");
        }
    }

   
?>