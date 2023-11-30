<?php

require_once "conecta.php";
$dados = $_GET["idProf"];

$result = pg_query($conexao, "SELECT * FROM profissional INNER JOIN especialidade ON id_prof=especialidade_prof_fk INNER JOIN lista_servicos ON lista_servicos.id_lista = especialidade.especialidade_lista_fk WHERE id_prof='$dados'");
    
            if(!$result){
                 die("Não foi possível adicionar os dados");
                }
             else{
                
               while ($linha = pg_fetch_array($result)){

                  echo $linha["nome_prof"]."|".$linha["tipo_prof"]."|".$linha["temposervico_prof"]."|".$linha["nome_lista"]."|".$linha["email_prof"];

               }
                
             }

?>