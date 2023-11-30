<?php
require_once "../action/conecta.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>

    <div class="box">

        <a href="../index.php"><img id="logo" src="../img/photo2.png"></a>

        <fieldset>
            <?php
            if (isset($_SESSION['nao_autenticado'])){;
            ?>
            <div id="CampoErro">
                <p>ERRO: Usuário ou senha inválidos.</p>
            </div>
            <?php
            }        
            unset($_SESSION['nao_autenticado']);
            ?>

            <legend><b>Login</b></legend>

            <form method="POST" action="../action/fazlogin.php">
                <br>
                <div class="inputBox">
                    <input type="text" id="email" name="email" class="inputUsuario" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUsuario" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <input type="submit" name="aceitar" id="botao" value="Entrar">
                
            </form>
            
            <br>
            <a href="cadastra.php" id="novo">É novo por aqui? Cadastre-se</a>
        </fieldset>
    </div>

</body>

</html>