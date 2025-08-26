<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
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

			$sql="SELECT * FROM `saGerente`.`cliente`
					WHERE `idGerente` = '".$_SESSION['id_gerente']."';";
                 
			$resultado = $conexao->query($sql);
			echo '<div id="menu">
							<span class="corBranca">Bem vindo, '.$_SESSION['nome'].'</span>
							<a href="site.php" class="sair">Voltar</a>
							<a href="index.php" class="sair">Sair</a>
							
							</div>
					';
            

			echo '<hr>';
			echo '<h2>CLIENTES</h2>
				<table border="1" width="100%">
					<tr>
						<th>NÚMERO</th>
						<th>NOME</th>
						<th>NÚMERO_BANCO</th>
                        <th>AÇÃO</th>

					</tr>
					';	
			while($row = mysqli_fetch_array($resultado)){
				echo '<tr>';
				echo '<td>'.$row[0].'</td>';
				echo '<td><center>'.$row[1].'</center></td>';
				echo '</td>';
                echo '<td>';
				$sql2="SELECT * FROM `saGerente`.`cartao`
					WHERE `idCliente` = '".$row[0]."';";
				$resultado2 = $conexao->query($sql2);
				if($resultado2){
				$row2 = mysqli_fetch_array($resultado2);
				if($row2){
					echo $row2[1];
				} else {
					echo 'NÃO POSSUI CARTÃO';
				}} else {
					echo 'NÃO POSSUI CARTÃO';
				}
				echo '</td>';
				echo '<td>';
				echo '<form method="post" action="CadastrarCartao.php" id="CadastrarCartao" name="CadastrarCartao">
				<input type="hidden" value ="'.$row[0].'" name="idCliente" id="idCliente" size="20">
				<input type="text" value="" name="numero" id="numero" size="20">
				<input type="submit" value="Cadastrar Cartão">
				
				</form>';
				
                
                    echo '</tr>';
			}
            echo '</table>';
			$conexao -> close();
    ?>
	<a href="site.php" class='sair'>Voltar</a>
	<a href="sair.php" class='sair'>Sair</a>
</body>
</html>