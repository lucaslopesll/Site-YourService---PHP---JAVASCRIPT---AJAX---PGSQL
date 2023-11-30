<?php

session_start();
require_once "conecta.php";
$id_servico = $_GET['idserv'];
echo ($id_servico);

if (!$conexao) {
    die("Falha ao conectar com o Banco de Dados");
} else {
    if (isset($_FILES['uploade'])) {
        $uploade = $_FILES['uploade'];

        for ($cont = 0; $cont < count($uploade['name']); $cont++) {


            $pasta = "../uploads/";
            $nomedoArquivo = $uploade['name'][$cont];
            $novoNomedoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomedoArquivo, PATHINFO_EXTENSION));

            if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'GIF' && $extensao != 'pdf' && $extensao != 'jpeg')
                die("Tipo de arquivo não aceito");

            $path = $pasta . $novoNomedoArquivo . "." . $extensao;

            $deu_certo = move_uploaded_file($uploade["tmp_name"][$cont], $path);
            echo("INSERT INTO imagem_servico (id_img_servico, img_serv_prof) VALUES ('$id_servico', '$path')");
            $resultaf = pg_query($conexao, "INSERT INTO imagem_servico (id_img_servico, img_serv_prof) VALUES ('$id_servico', '$path')");

            if ($deu_certo) {
                header("Location: ../pgs/relatorioCliente.php");
            }
        }
    }

    if (!$resultaf) {
        die("Falha ao realizar teste");
    } else {
    }
}
