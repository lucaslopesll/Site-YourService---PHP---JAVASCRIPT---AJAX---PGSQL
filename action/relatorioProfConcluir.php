<?php
//Adicona a data que foi aceito o servico
session_start();
require_once "conecta.php";

$idServ = $_GET["idservico"];
$dataFim = date("Y/m/d");
$finalizado = "Serviço Finalizado";

    if(!$conexao)
    {
        die("Falha ao conectar com o Banco de Dados");
    }
    else {
        $result = pg_query($conexao, "UPDATE realiza_prof_servico SET data_fim_real='$dataFim', status_serv_prof='$finalizado' WHERE id_serv_real='$idServ'");
        if(!$result){
            die("Falha ao realizar modificação");
        }
        else{
            //header("Location: ../pgs/perfilProfi.php");
        }
    }

   
?>