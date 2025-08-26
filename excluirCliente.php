<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "saGerente";

$conexao = new mysqli($hostname, $user, $password, $database);

if($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else{
    // Evita caracteres especiais (SQL Inject)
    $idCliente = $conexao->real_escape_string($_POST['idCliente']);

    $sql = "DELETE FROM `cliente` WHERE `id_cliente` = '".$idCliente."';";
    $resultado = $conexao->query($sql);
    $conexao->close();
    header('Location: site.php', true, 301);
    exit();
}

?>