<?php

require_once "conecta.php";
$dados = $_GET["idservico"];

$result = pg_query($conexao, "SELECT * FROM profissional INNER JOIN realiza_prof_servico ON realiza_prof_servico.real_prof_fk = profissional.id_prof WHERE id_serv_real='$dados'");
    
            if(!$result){
                 die("Não foi possível consultar os dados");
                }
             else{
                
                $linha = pg_fetch_array($result);
                echo $linha["id_prof"]."|".$linha["id_serv_real"]."|".$linha["nome_prof"]."|".$linha["data_inic_real"]."|".$linha["data_fim_real"]."|".$linha["datanasc_prof"]."|".$linha["email_prof"]."|".$linha["telefone_prof"];
                
             }

?>