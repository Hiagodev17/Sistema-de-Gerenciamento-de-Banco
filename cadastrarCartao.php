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
    
    $numero = $conexao->real_escape_string($_POST['numero']);
    $idCliente = $conexao->real_escape_string($_POST['idCliente']);

    $sql = "INSERT INTO cartao (`numero`, `idCliente`) 
            VALUES ( '".$numero."', '".$idCliente."');";

   
    $resultado = $conexao->query($sql);
   

    $conexao->close();
    header('Location: telaCliente.php');
    exit();

}

?>