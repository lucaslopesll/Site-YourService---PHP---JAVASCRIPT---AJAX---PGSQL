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

   $result = pg_query($conexao, "INSERT INTO imagem_servico (id_img_servico, img_serv_prof) VALUES ('$id', '$path')");
   if($deu_certo)
        echo "<p>Arquivo enviado com sucesso!</p>";
      } 
  }
  ?>