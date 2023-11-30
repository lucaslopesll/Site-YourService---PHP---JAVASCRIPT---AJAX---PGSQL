<?php
session_start();
require_once "conecta.php";

$listaCheckbox = null;
if(isset($_POST['servico']))
    $listaCheckbox = $_POST['servico'];

    if($listaCheckbox !== null){
        $servicosSelecionados  = " ";
        for($i =0; $i < count($listaCheckbox); $i++){
            //concatenar os serviços
            if(count($listaCheckbox) == 1){
                $servicosSelecionados = " '$listaCheckbox[$i]'";
                break;
            }
            else{
                $servicosSelecionados .= " '$listaCheckbox[$i]' ";
                if($i < count($listaCheckbox)-1){
                    $servicosSelecionados .= " ,";
                }
            }
           
        }

        $capturaid = pg_query($conexao, "SELECT distinct especialidade_prof_fk FROM especialidade WHERE especialidade_lista_fk IN ( $servicosSelecionados) ");
        while($capid = pg_fetch_array($capturaid)){
            $id = $capid['especialidade_prof_fk'];       
            if(pg_num_rows($capturaid)==0){ // se nao encontrar resultado
            echo "Nunhum profissinal encontrado";
            }
            else{  
                    echo $id;

                }
                

                }
            }
                
            
?>

    
             
    



