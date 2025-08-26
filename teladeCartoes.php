<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
	.sair{
				float: right;
				text-decoration: none;	
				color: white;
                margin-left:  10px;
                
			}
			
			#menu{
				background-color: #5ec4ffff;
				margen: 0px;
				padding: 10px;
			}
			#submit_telaCliente{
				
				border: none;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				cursor: pointer;
			}
			.corBranca{
				color: white;
				font-weight: bold;
				margin-right: 20px;
			}
            
            #menu {
                background: #007bff;
                color: #fff;
                padding: 10px;
            }
            .sair {
                float: right;
               color: #fff;
                text-decoration: none;
                margin-left: 10px;
            }
            table {
                background: #fff;
                border-collapse: collapse;
                width: 350px;
                margin: 20px 0;
            }
            td {
                border: 1px solid #ccc;
                padding: 8px;
            }
            
</style>
<body>
    <?php
        session_start();
        $hostname = "127.0.0.1";
    	$user = "root";
		$password = "root";
		$database = "saGerente";
		
		$conexao = new mysqli($hostname,$user,$password,$database);
        $idCliente = $_POST["idCliente"];
		$sql="SELECT * FROM `saGerente`.`cliente`
				WHERE `id_cliente` = '".$idCliente."';";
                 
		$resultado = $conexao->query($sql);
		$row = mysqli_fetch_array($resultado);	
         
        $sql2="SELECT * FROM `saGerente`.`cartao`
                    WHERE `idCliente` = '".$idCliente."';";
        $resultado2 = $conexao->query($sql2);
        $row2 = mysqli_fetch_array($resultado2);
        echo '<div id="menu">
							<span class="corBranca">Bem vindo, '.$_SESSION['nome'].'</span>
							<a href="site.php" class="sair">Voltar</a>
                            
							<a href="index.php" class="sair">Sair</a>
							
							</div>
					';

		echo '<hr>';
        echo '<h2>Cliente</h2>
			<table border="1" width="100%">
				<tr>
					<td>Nome</td>
					<td>'.$row[1].'</td>
				</tr>';
        echo '<tr>
                <td>E-mail</td>
                <td>'.$row[2].'</td>
                </tr>';
        
        echo '<tr>
                <td>Número do Cartão</td>
                <td>'.$row2[1].'</td>
                </tr>';         
        echo '</table>';	
    ?>
    
    <a href="sair.php" class='sair'>Sair</a>
</body>
</html>