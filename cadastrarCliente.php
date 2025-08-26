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
    $nome = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);
    $id_gerente = $conexao->real_escape_string($_POST['id_gerente']);

    $sql = "INSERT INTO cliente (`nome`, `email`, `senha`, `idGerente`) 
            VALUES ('".$nome."', '".$email."' , '".$senha."', '".$id_gerente."');";
   
    $resultado = $conexao->query($sql);

    $conexao->close();
    header('Location: site.php', true, 301);

}

?>