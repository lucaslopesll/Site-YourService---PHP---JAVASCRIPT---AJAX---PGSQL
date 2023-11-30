<?php
session_start();
require_once "conecta.php";
$dados = $_GET["idProfServico"];
$idServicos = $_SESSION['idServicos'];
$idCliente = $_SESSION["id_cliente"];


$result = pg_query($conexao, "SELECT * FROM profissional WHERE id_prof='$dados'");
    
            if(!$result){
                 die("Não foi possível adicionar os dados");
                }
             else{
                
                $linha = pg_fetch_array($result);
                echo $linha["telefone_prof"]."|".$linha["tipo_prof"];
                
             }
             $array = explode(" , ", $idServicos);

             foreach($array as $valores){
               $servico = pg_query($conexao, "INSERT INTO realiza_prof_servico (real_prof_fk, real_lista_fk, real_cliente_fk) 
               VALUES ('$dados', $valores, '$idCliente')");
               echo "'INSERT INTO realiza_prof_servico (real_prof_fk, real_lista_fk, real_cliente_fk) 
               VALUES ('$dados', $valores, '$idCliente')'";
             }
               
            

     ?>