<?php

session_start();
require_once "conecta.php";
$avaliacao = $_GET['copiaAvaliacao'];
$id_servico = $_GET['idservico'];
$comentario = $_GET['comentario'];
//$foto = $_GET['foto'];
$data = date("Y/m/d");

if (!$conexao) {
    die("Falha ao conectar com o Banco de Dados");
} else{

    $consulta = pg_query($conexao, "SELECT avalia_real_fk FROM avaliacao WHERE avalia_real_fk ='$id_servico'");
    if (pg_num_rows($consulta) == 0) {        
        $result = pg_query($conexao, "INSERT INTO avaliacao (avalia_real_fk, data_avaliacao, nota_avaliacao, comentario_avaliacao) VALUES ('$id_servico','$data','$avaliacao', '$comentario')");
    }else{
        
        
        $result = pg_query($conexao, "UPDATE avaliacao SET data_avaliacao= '$data', nota_avaliacao='$avaliacao', comentario_avaliacao='$comentario' WHERE avalia_real_fk='$id_servico'");
    }

    if (!$result) {
        die("Falha ao realizar modificação");
    } 
}