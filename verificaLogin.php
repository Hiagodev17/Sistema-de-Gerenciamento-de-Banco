<?php
    //Iniciar uma sessão
    session_start();

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
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql = "SELECT `id_gerente`, `nome` FROM `gerente`
                WHERE `email` = '".$email."'
                AND `senha` = '".$senha."';";
    
        $resultado = $conexao->query($sql);

        if($resultado->num_rows != 0){
            $row = $resultado-> fetch_array();
            $_SESSION['id_gerente'] = $row[0];
            $_SESSION['nome'] = $row[1];
            $conexao->close();
            header('Location: site.php', true, 301);
            exit();
        } else{
            $conexao->close();
            header('Location: index.php', true, 301);
        }

        

    }



?>