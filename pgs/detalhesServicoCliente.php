<?php
session_start();
require_once "../action/conecta.php";

$id = $_SESSION["id_cliente"];
$idServico = $_GET["id"];


$result = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE id_serv_real= '$idServico'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourService</title>
    <link rel="stylesheet" href="../css/detalhesServico.css">
</head>

<body>
    <div id="cabecalho">
    <a href="relatorioCliente.php"><button id="voltar">Voltar</button></a>
        <div class="container">
            <a href="../index.php"><img src="../img/photo.png" id="logo"></a>
        </div>

        <div id="perfil">

            <div class="box">
                <h3>Detalhar Serviços</h3>

                <br><br>
                <div id="perfil">
                    <?php
                    $data = pg_fetch_array($result); ?>



                    <div class="inputBox">
                        <input type="hidden" name="id" class="inputUsuario" value="<?php echo $data["id_serv_real"]; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="text" name="nome" class="inputUsuario" value="<?php echo $data['nome_prof']; ?>">
                        <label for="nome" class="labelInput">Nome Profissional: </label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="date" name="data_inic" class="inputUsuario" value="<?php echo $data['data_inic_real']; ?>">
                        <label for="endereco" class="labelInput">Data inicial do Serviço: </label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="date" name="data_fim" class="inputUsuario" value="<?php echo $data['data_fim_real']; ?>">
                        <label for="endereco" class="labelInput">Data final do Serviço: </label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="tiposervico" class="inputUsuario" value="<?php echo $data['tiposervico_lista']; ?>">
                        <label for="servico" class="labelInput">Serviço Selecionado:</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="servico" class="inputUsuario" value="<?php echo $data['nome_lista']; ?>">
                        <label for="servico" class="labelInput">Tipo de serviço efetuado:</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="cpf" class="inputUsuario" value="<?php echo $data['status_serv_prof']; ?>">
                        <label for="cpf" class="labelInput">Status do Serviço:</label>
                    </div>
                    <br><br>
                    <!-- <form action="../action/fotos.php" method="POST" enctype="multipart/form-data">
                        <form action="../action/fotosServFim.php" method="POST" enctype="multipart/form-data">
                            <?php //$data = pg_fetch_array($result); 
                            ?>
                             <p>Adicione fotos dos serviço finalizado</p>
                            <div class="inputBox">
                                <input type="hidden" name="id" class="inputUsuario" value="<//?php echo $data["id_prof"]; ?>">
                            </div>
                            <input type="file" name="uploade[]" multiple="multiple" onchange="showThumbnail2(this);" />
                            <br><br>
                            <input type="submit" id="botao" name="SalvarFoto" />
                        </form>-->
                       
                        

                </div>
                    <script src="../js/editarPerfil.js"></script>
</body>

</html>