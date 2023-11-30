<?php
require_once "../action/conecta.php";
session_start();

$id = $_SESSION["idProf"];

$result = pg_query($conexao, "SELECT * FROM profissional INNER JOIN especialidade ON id_prof = especialidade_prof_fk INNER JOIN lista_servicos ON especialidade_lista_fk = id_lista WHERE id_prof= '$id'");


$med = pg_query($conexao,"SELECT AVG (nota_avaliacao) from avaliacao INNER JOIN realiza_prof_servico ON avalia_real_fk = id_serv_real WHERE real_prof_fk = '$id'" );

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Service</title>
    <link rel="stylesheet" href="../css/perfil.css" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
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

        <?php
        $servicosprof = '';
        $data = pg_fetch_all($result);
        for ($i = 0; $i < pg_fetch_row($result); $i++) {
            $servicos = $servicosprof . $data[$i]['nome_lista'];
            $arrayObjetos[] = $servicos;
        }
        ?>
        <div id="perfil">
            <div id="campFoto"><img src="<?php echo $data[0]['foto_prof']; ?>" class="perf"></div>
            <div id="descricao">
                <h2><?php echo $data[0]['nome_prof']; ?></h2>
                <ul>
                    <li>Profissão: <?php echo $data[0]['tipo_prof']; ?></li>
                    <li>Atua: Há mais de <?php echo $data[0]['temposervico_prof']; ?> anos</li>
                    <li>Serviços: <?php
                                    if (count($arrayObjetos) > 2) {
                                        $arraydata = implode(', ', $arrayObjetos);
                                        echo $arraydata;
                                    } else {
                                        $arraydata = implode(' e ', $arrayObjetos);
                                        echo $arraydata;
                                    }
                                    ?>...</li>
                </ul>
            </div>
            
            <div id="avaliacao">
                <h1>Avaliação</h1>
                <?php
                 $media = pg_fetch_array($med); 
                                        
                 ?>
                 <?php
                if($media["avg"] == 1){?>
                    <img src="../img/star1.png" id="s1">
                    <img src="../img/star0.png" id="s2">
                    <img src="../img/star0.png" id="s3">
                    <img src="../img/star0.png" id="s4">
                    <img src="../img/star0.png" id="s5">

                <?php
                }
                else if($media["avg"] >= 2 && $media["avg"] < 3){?>
                    <img src="../img/star1.png" id="s1">
                    <img src="../img/star1.png" id="s2">
                    <img src="../img/star0.png" id="s3">
                    <img src="../img/star0.png" id="s4">
                    <img src="../img/star0.png" id="s5">
                    <?php
                    }
                else if($media["avg"] >= 3 && $media["avg"] < 4){?>
                        <img src="../img/star1.png" id="s1">
                        <img src="../img/star1.png" id="s2">
                        <img src="../img/star1.png" id="s3">
                        <img src="../img/star0.png" id="s4">
                        <img src="../img/star0.png" id="s5">
                        <?php
                        }
                    
                else if($media["avg"] >= 4 && $media["avg"] < 5){?>
                    <img src="../img/star1.png" id="s1">
                    <img src="../img/star1.png" id="s2">
                    <img src="../img/star1.png" id="s3">
                    <img src="../img/star1.png" id="s4">
                    <img src="../img/star0.png" id="s5">
                    <?php
                    }
                else if($media["avg"] >= 5){?>
                        <img src="../img/star1.png" id="s1">
                        <img src="../img/star1.png" id="s2">
                        <img src="../img/star1.png" id="s3">
                        <img src="../img/star1.png" id="s4">
                        <img src="../img/star1.png" id="s5">
                        <?php
                        }
                        else{?>
                        <img src="../img/star0.png" id="s1">
                        <img src="../img/star0.png" id="s2">
                        <img src="../img/star0.png" id="s3">
                        <img src="../img/star0.png" id="s4">
                        <img src="../img/star0.png" id="s5">
                    <?php
                        }
                    
                    ?>
            </div>
           
            <a href="editarPerfil.php"><button id="editarPerfil">Editar Perfil</button></a>

            

            <div id="servicos">
                <h2>Fotos</h2>
                <?php
                $datas = '';
                $resultad = pg_query($conexao, "SELECT * FROM imagens_servicos WHERE id_imgs_prof_fk= '$id'");
                while ($datas  = pg_fetch_array($resultad)) {
                    $data = $datas;

                ?>
                    
                    <div id=quadrin ><img src="<?php print_r($data['imgs_servs_prof']) ?>" id="foto"></div>
                    
                    <?php } ?>
                <!-- <form action="fotos.php" method="post" enctype="multipart/form-data">
                    <img id="fotoCapa" src="../img/perfil.jpg">
                    <div class="upload">
                    <input type="file" name="upload" onchange="showThumbnail2(this);"/> -->
            </div>

            <!--<form action="processa_imagem_perfil.php" method="post" enctype="multipart/form-data">
                <label>Imagem de perfil: <input type="file" name="image[]" multiple="multiple"></label>
                <input type="submit" value="Submit">
            </form>-->

        <div id="comentarios">
            <h2>Comentários</h2>
            <br>
            <table class="table">

                <thead>
                </thead>
                <tbody>

                    <?php
                    $result = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join avaliacao ON id_serv_real = avalia_real_fk WHERE real_prof_fk= '$id'");

                    while ($data = pg_fetch_array($result)) { ?>
                        <td><p>Em:</p><?php echo $data['data_avaliacao'] ?><p></p>  </td>
                        <td> <p>O Cliente: </p><?php echo $data['nome_cliente'] ?></td>
                        <td> <p>diz: </p><?php echo $data['comentario_avaliacao'] ?> </td>
                        <!--<td> <?php echo $data['img_serv_prof'] ?> </td>-->

                </tbody>

            <?php
                    } ?>

            </table>
        </div>

        </div>
    </div>
    </div>

    <script src="../js/perfilProfi.js"></script>
</body>

</html>
<!--
//Processamento de tuplos.-
$query = 'SELECT NumBI, Salário FROM EMPREGADO
WHERE NumDep = 4';
$res = pg_query($lig, $query);
$tups = pg_fetch_all($res);
echo 'linha 0 coluna 0: '.$tups[0]['NumBI'];
echo 'linha 1 coluna 1: '.$tups[1]['Salário'];
$val0 = pg_fetch_result($res, 0, 'NumBI');
$val1 = pg_fetch_result($res, 0, 'Salário');
echo 'linha 0 coluna 0: '.$val0;
echo 'linha 0 coluna 1: '.$val1;-->