<html>
    <head>
        <title>Sistema de Gerenciamento</title>
    
		<style>
			.sair{
				float: right;
				text-decoration: none;	
				color: white;
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
			.cadastro{
				margin-bottom: 20px;
				margin-top: 20px;
				border: none;
				background-color: #46acffff;
				color: white;
				padding: 10px 20px;
				text-align: center;
			}
			.b_exluir{
				border: none;
				background-color: #ff4c4cff;
				color: white;
				padding: 10px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				cursor: pointer;
				margin-right: 10px;
			}
			.b_visualizar{
				border: none;
				background-color: #46acffff;
				color: white;
				padding: 10px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				cursor: pointer;
			}
		</style>
	</head>
	
    <body>
		<?php
			// iniciar uma sessão
			session_start();

			if (empty($_SESSION['id_gerente'])){
				// Logado??? Não?? Tchau, bb.
				header('Location: sair.php');
				exit();
			} else {
				echo '<div id="menu">
							<span class="corBranca">Bem vindo, '.$_SESSION['nome'].'</span>
							
							<a href="index.php" class="sair">Sair</a>
							
							</div>
					';
				echo '<br><form method="post" action="cadastro.php" id="cadastro" name="cadastro">
						<input type="hidden" value ="'.$_SESSION['id_gerente'].'" name="id_gerente" id="id_gerente" size="20">
						<input type="submit" class="cadastro" value="CADASTRAR CLIENTE">
					</form>';
				
				echo '<h2>CLIENTES</h2>
				<table border="1" width="100%">
					<tr>
						<th>NÚMERO</th>
						<th>NOME</th>
						<th>AÇÂO</th>
					</tr>
					';
			}

			$hostname = "127.0.0.1";
			$user = "root";
			$password = "root";
			$database = "saGerente";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			$sql="SELECT * FROM `saGerente`.`cliente`
					WHERE `idGerente` = '".$_SESSION['id_gerente']."';";
                 
			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($row = mysqli_fetch_array($resultado)){
				echo '<tr>';
				echo '<td><center>'.$row[0].'</center></td>';
				echo '<td><center><form method="post" action="telaCliente.php" id="telaCliente" name="telaCliente">
						<input type="hidden" value ="'.$_SESSION['id_gerente'].'" name="id_gerente" id="id_gerente" size="20">
						<input type="submit" id="submit_telaCliente" value="'.$row[1].'">
					</form></center></td>';
				echo '<td><center><br><form method="post" action="excluirCliente.php" id="excluirCliente" name="excluirCliente" onsubmit="return confirm(\'Deseja excluir o cliente?\')">
						<input type="hidden" name="idCliente" value="'.$row[0].'">
						<input type="submit" class="b_exluir" value="EXCLUIR"/>
					</form>';
				echo '<form method="post" action="teladeCartoes.php" id="teladeCartoes" name="teladeCartoes" >
						<input type="hidden" name="idCliente" value="'.$row[0].'">
						<input type="submit" class="b_visualizar" value="VISUALIZAR"/>
					</form>';
				echo '</center></td></tr>';
			}
			echo '</table>';
			$conexao -> close();
           
		?>
		<br>
		
	</body>
</html>