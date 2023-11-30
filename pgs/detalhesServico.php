<?php
session_start();
require_once "../action/conecta.php";

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
    <a href="relatorioProfi.php"><button id="voltar">Voltar</button></a>
        <div class="container">
        <a href="../index.php"><img src="../img/photo.png" id="logo"></a>
        </div>
        
        <div id="perfil">
        
            <div class="box">
            <h3>Detalhar Serviço</h3> 
                <form method="POST" action="../action/update.php" id="formularioprincipal" enctype="multipart/form-data">
                    <br><br>
                    <div id="perfil">
                    <?php
                    $data = pg_fetch_array($result); ?>

                    <p id="nome_pro"> </p>

                        <div class="inputBox">
                            <input type="hidden" name="id" class="inputUsuario" id="id_prof" value="<?php echo $data["id_serv_real"]; ?>">
                        </div>
                        <div class="inputBox">
                            <input type="text" name="nome" class="inputUsuario" id="nome_pro" value="<?php echo $data['nome_cliente']; ?>" >
                            <label for="nome" class="labelInput">Nome do Cliente: </label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="date" name="dataIni" class="inputUsuario" id="data_ini_real" value="<?php echo $data['data_inic_real']; ?>" >
                            <label for="cpf" class="labelInput">Data Inicio:</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="date" name="dataFim" class="inputUsuario" id="data_fim_real" value="<?php echo $data['data_fim_real']; ?>" >
                            <label for="endereco" class="labelInput">Data Final: </label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="datanasc" class="inputUsuario" id="datanascprof" value="<?php echo $data['tiposervico_lista']; ?>" >
                            <label for="datanasc" class="labelInput">Serviço Selecionado:</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="email" class="inputUsuario" id="email_prf" value="<?php echo $data['nome_lista']; ?>">
                            <label for="email" class="labelInput">Tipo de Serviço:</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="telefone" class="inputUsuario" id="telefoneprof" value="<?php echo $data['status_serv_prof']; ?>">
                            <label for="telefone" class="labelInput">Status do Serviço: </label>
                        </div>
                       
                        
                </form>



                <script src="../js/relatorioProfi.js"></script>
</body>

</html>