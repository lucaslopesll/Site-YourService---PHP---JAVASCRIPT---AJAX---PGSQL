<?php
require_once "../action/conecta.php";
session_start();
$id = $_SESSION["id_cliente"];


if(!empty($_GET['search'])){
    $datas = $_GET['search'];
     $result = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE (real_cliente_fk= '$id' AND cliente.nome_cliente LIKE '%$datas%' AND data_inic_real IS NULL AND data_fim_real IS NULL) OR (real_cliente_fk= '$id' AND lista_servicos.nome_lista LIKE '%$datas%'AND data_inic_real IS NULL AND data_fim_real IS NULL)");
}
else{
    $result = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE real_cliente_fk= '$id' AND data_inic_real IS NULL AND data_fim_real IS NULL AND status_serv_prof IS NULL");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Service</title>
    <link rel="stylesheet" href="../css/relatorioProfi.css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/fonts-icones.css">
</head>
<header>
    <!-- menu retrátil lateral esquerda -->
    <input type="checkbox" id="check" onclick="principal()" id="menuSelecao">
    <label id="icone" for="check"></label>
    <div class="barra">
        <nav>
            <a href="../index.php">
                <div class="Link">Home</div>
            </a>
            <a href="relatorioProfi.php">
                <div class="Link">Histórico Serviços</div>
            </a>
            <a href="sobrenos.php">
                <div class="Link">Sobre Nós</div>
            </a>
            <a href="../action/logout.php">
                <div class="Link">Sair</div>
            </a>
        </nav>
    </div>
    <!-- barra fixa horizontal -->

    <nav class="menu">
        <a href="index.html">
            <a href="../index.php"><img src="../img/photo.png" id="logo"></a>
        </a>
    </nav>

    <label for="menu-hamburguer">
        <div class="mburg">
            <span class="hamburguer"></span>
        </div>
    </label>
</header>
<body>

    

        <div id="areaPrincipal">
            <h3>MEUS RELATÓRIOS</h3>
            <div id="areaIni">
                <select onclick="selected(value)" name="profissao" id="select">
                    <option value="selecionado" >Selecione o status</option>
                    <option value="aberto" selected>Em aberto</option>
                    <option value="andamento">Em andamento</option>
                    <option value="finalizado">Finalizados</option>
                    <option value="cancelar">Cancelados</option>
                </select>
                <?php
                
                ?>
                <div class="box-busca">
                    <div class="search-box">
                        <input type="text" class="search-box-input" id="pesquisar" name="busca" placeholder="Encontre o serviço">
                        <button class="search-box-button" onclick="searchData()"><i class="search-box-icone icon icon-search"></i></button>
                    </div><!-- Search -->

                </div><!--Box Busca-->
                <a href="painelcliente.php"> <button type="button" id="btn-visu">Contrate outro Serviço</button></a>
            </div>
            <hr>
            <br><br>
            <div class="pai" >
            <div id="aberto" class="aberto">
            <fieldset>
                <table class="table">
                    
                        <legend>Em Aberto</legend>
                        <thead>

                            <tr>
                                <th scope="col">Data Inicio</th>
                                <th scope="col">Data Final</th>
                                <th scope="col">Nome Profissional</th>
                                <th scope="col">Endereço Cliente</th>
                                <th scope="col">Tipo de Serviço</th>
                                <th scope="col" id='bt'>...</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                     
                            while ($data = pg_fetch_assoc($result)) { ?>
                                <tr>
                                <td>  <?php echo $data['data_inic_real'] ?> </td>
                                <td>  <?php echo $data['data_fim_real'] ?> </td>
                                <td>  <?php echo $data['nome_prof'] ?> </td>
                                <td>  <?php echo $data['endereco_cliente'] ?> </td>
                                <td>  <?php echo $data['nome_lista'] ?> </td>
                                <td>
                                <button type='button' id='cancela' onclick='cancelarServico()' value="<?php echo $data['id_serv_real'];?>"><img id ='imgcancelar' src="../img/botaocancelar2.png"></button>
                                
                                <!--<input type="image" id='imgrecusar' src="../img/recusar.png" onclick='cancelarServico()'  value=" //echo $data['id_serv_real'];?>"/>-->
                            </td>
                              
                        </tbody>
                        <?php 
                                }?> 
                        
                </table>
                </fieldset>

            </div>
            
            <div id="andamento" class="andamento" style="display:none;">
            <fieldset>
                <table class="table">
                   
                        <legend>Em Andamento</legend>
                        <thead>

                            <tr>
                                
                                <th scope="col">Data Inicio</th>
                                <th scope="col">Data Final</th>
                                <th scope="col">Nome Profissional</th>
                                <th scope="col">Endereço Cliente</th>
                                <th scope="col">Tipo de Serviço</th>
                                <th scope="col">Status Serviço</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             // Consulta Para Andamento  - UPDATE realiza_prof_servico SET data_inic_real = '2023-05-01' WHERE id_serv_real = 7;
                            
                            if(!empty($_GET['search'])){
                                $datas = $_GET['search'];
                                $resultado = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE (real_cliente_fk= '$id' AND cliente.nome_cliente LIKE '%$datas%' AND data_inic_real IS NULL AND data_fim_real IS NULL) OR (real_cliente_fk= '$id' AND lista_servicos.nome_lista LIKE '%$datas%'AND data_inic_real IS NULL AND data_fim_real IS NULL)");
                                    }
                                else{
                                $resultado = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE real_cliente_fk= '$id' AND data_inic_real IS NOT NULL AND data_fim_real IS NULL");
                                    }
                            
                            //$resultado = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista WHERE real_cliente_fk= '$id' AND data_fim_real IS NULL AND data_inic_real IS NOT NULL");
                            while ($data = pg_fetch_assoc($resultado)) { ?>
                                <tr>
                                
                                <td>  <?php echo $data['data_inic_real'] ?> </td>
                                <td>  <?php echo $data['data_fim_real'] ?> </td>
                                <td>  <?php echo $data['nome_prof'] ?> </td>
                                <td>  <?php echo $data['endereco_cliente'] ?> </td>
                                <td>  <?php echo $data['nome_lista'] ?> </td>
                                <td>  <?php echo $data['status_serv_prof'] ?> </td>       
                        </tbody>
                        <?php 
                                }?> 
                   
                </table>
                </fieldset>
            </div>
            
            
            <div id="finalizado" class="finalizado" style="display:none;">
            <fieldset>
                <table class="table">
                    
                        <legend>Finalizado</legend>
                        <thead>

                            <tr>
                            
                                <th scope="col">Data Inicio</th>
                                <th scope="col">Data Final</th>
                                <th scope="col">Nome Profissional</th>
                                <th scope="col">Endereço Cliente</th>
                                <th scope="col">Tipo de Serviço</th>
                                <th scope="col">...</th>
                                <th scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                
                            <?php

                            // Consulta Para Finalizar  - UPDATE realiza_prof_servico SET data_fim_real = '2023-05-01' WHERE id_serv_real = 7;
                            if(!empty($_GET['search'])){
                            $datas = $_GET['search'];
                             $resultad = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE (real_cliente_fk= '$id' AND cliente.nome_cliente LIKE '%$datas%' AND data_inic_real IS NULL AND data_fim_real IS NULL) OR (real_cliente_fk= '$id' AND lista_servicos.nome_lista LIKE '%$datas%'AND data_inic_real IS NULL AND data_fim_real IS NULL)");
                            }
                            else{
                                $resultad = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE real_cliente_fk= '$id' AND status_serv_prof = 'Serviço Finalizado'");

                                }
                            //$resultad = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista WHERE real_cliente_fk= '$id' AND data_inic_real IS NULL AND data_fim_real IS NULL");
                            while ($data = pg_fetch_assoc($resultad)) { ?>
                                <tr>
                                
                                <td>  <?php echo $data['data_inic_real'] ?> </td>
                                <td>  <?php echo $data['data_fim_real'] ?> </td>
                                <td>  <?php echo $data['nome_prof'] ?> </td>
                                <td>  <?php echo $data['endereco_cliente'] ?> </td>
                                <td>  <?php echo $data['nome_lista'] ?> </td>
                                <td>
                            <a href="detalhesServicoCliente.php?id=<?php echo $data['id_serv_real'];?>"><button type='button' name='detalhar' id="detalhar" onclick="searchServ()" value="<?php echo $data['id_serv_real'];?>"> <img src='../img/botaodetalha.png' id="imgdetalhar" > </button></a> 
                            </td>
                            <td>
                            <a href="avaliarProfissional.php?id=<?php echo $data['id_serv_real'];?>"><button type='button' name='avaliar' id="avaliar" onclick='avaliarServ()' value="<?php echo $data['id_serv_real'];?>"> <img src='../img/botaoAvaliar.png' id="imgavaliar" > </button></a>
                            </td>
        
                              
                        </tbody>
                        <?php 
                                }?> 
                    
                </table>
                </fieldset>
            </div>

            <div id="cancelar" class="cancelar" style="display:none;">
            <fieldset>
                <table class="table">
                    
                        <legend>Cancelados</legend>
                        <thead>

                            <tr>
                            <th scope="col">#</th>
                                <th scope="col">Data Inicio</th>
                                <th scope="col">Data Final</th>
                                <th scope="col">Nome Profissional</th>
                                <th scope="col">Endereço Cliente</th>
                                <th scope="col">Tipo de Serviço</th>
                                <th scope="col">Status Serviço</th>
                            </tr>
                        </thead>
                        <tbody>
                
                            <?php

                            // Consulta Para cancelar  - UPDATE realiza_prof_servico SET data_fim_real = '2023-05-01' WHERE id_serv_real = 7;
                            if(!empty($_GET['search'])){
                            $datas = $_GET['search'];
                             $resultad = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE (real_cliente_fk= '$id' AND cliente.nome_cliente LIKE '%$datas%' AND data_inic_real IS NULL AND data_fim_real IS NULL) OR (real_cliente_fk= '$id' AND lista_servicos.nome_lista LIKE '%$datas%'AND data_inic_real IS NULL AND data_fim_real IS NULL)");
                            }
                            else{
                                $resultad = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE real_cliente_fk= '$id' AND status_serv_prof = 'Serviço Encerrado'");

                                }
                            //$resultad = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista WHERE real_cliente_fk= '$id' AND data_inic_real IS NULL AND data_fim_real IS NULL");
                            while ($data = pg_fetch_assoc($resultad)) { ?>
                                <tr>
                                <td>  <?php echo $data['real_prof_fk'] ?> </td>
                                <td>  <?php echo $data['data_inic_real'] ?> </td>
                                <td>  <?php echo $data['data_fim_real'] ?> </td>
                                <td>  <?php echo $data['nome_prof'] ?> </td>
                                <td>  <?php echo $data['endereco_cliente'] ?> </td>
                                <td>  <?php echo $data['nome_lista'] ?> </td>
                                <td>  <?php echo $data['status_serv_prof'] ?> </td>
                                
        
                              
                        </tbody>
                        <?php 
                                }?> 
                    
                </table>
                </fieldset>
            </div>


            </div>


    


        </div>
    </div>

    <script src="../js/relatorioCliente.js"></script>
</body>

</html>





