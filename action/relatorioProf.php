<?php
//Adiciona a data que foi aceito o servico
session_start();
require_once "conecta.php";

$idServ = $_GET["idservico"];
$dataInic = date("Y/m/d");
$andamento = "Serviço em Andamento";

    if(!$conexao)
    {
        die("Falha ao conectar com o Banco de Dados");
    }
    else {
        $result = pg_query($conexao, "UPDATE realiza_prof_servico SET data_inic_real='$dataInic', status_serv_prof='$andamento' WHERE id_serv_real='$idServ'");
        if(!$result){
            die("Falha ao realizar modificação");
        }
        else{
            //header("Location: ../pgs/perfilProfi.php");
        }
    }

   
?>