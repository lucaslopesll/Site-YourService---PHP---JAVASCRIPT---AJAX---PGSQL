<?php
session_start();
require_once "conecta.php";
$id = $_POST["id"];

if(isset($_FILES['uploade'])){
  $uploade = $_FILES['uploade'];
 
  for($cont = 0; $cont < count($uploade['name']); $cont++){
  

   $pasta = "../uploads/";
   $nomedoArquivo = $uploade['name'][$cont];
   $novoNomedoArquivo = uniqid();
   $extensao = strtolower(pathinfo($nomedoArquivo, PATHINFO_EXTENSION));
 
   if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'GIF' && $extensao != 'pdf'&& $extensao != 'jpeg')
     die("Tipo de arquivo não aceito");
 
   $path = $pasta . $novoNomedoArquivo . "." . $extensao;
 
   $deu_certo = move_uploaded_file($uploade["tmp_name"][$cont], $path );

   $result = pg_query($conexao, "INSERT INTO imagens_servicos (id_imgs_prof_fk, imgs_servs_prof) VALUES ('$id', '$path')");
   if($deu_certo)
        header("Location: ../pgs/perfilProfi.php");
      } 
  }
  ?>