<?php
session_start();
require_once "conecta.php";

$upload = $_POST["upload"];


$result = pg_query($conexao, "INSERT INTO profissional (foto_prof) VALUES ('$upload')");

/*if (!$result) {
    echo "Falha ao adicionar foto";
} else {
    header("Location: ../pgs/login.php");
}*/


?>