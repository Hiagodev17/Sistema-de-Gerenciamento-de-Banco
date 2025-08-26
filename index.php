<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>

			.botao:link, .botao:visited {
			background-color: white;
			color: black;
			border: 2px solid green;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			}

			.botao:hover, .botao:active {
			background-color: green;
			color: white;
			}

			.divLogin{
				border: 2px solid #696969ff;
				width: 300px;
				padding: 10px;
				margin: auto;
				margin-top: 100px;
				text-align: center;

			}
			.inf{
				border: 1px solid #696969ff;
				padding: 5px;
			}
			.submit{
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
<body>
	
    <div class="divLogin">
		<h1>  Bem vindo  </h1>
        <form method="post" action="verificaLogin.php" id="formlogin" name="formlogin">
            <label>E-mail: </label><br>
            <input type="text" name="email" id="email" class="inf" size="20"><br>
			<br>
            <label>Senha: </label><br>
            <input type="password" name="senha" id="senha" size="20"><br>
            <center><br>
                <input type="submit" value="LOGAR" class="submit">
            </center><br>
        </form>
    </div>

    


</body>
</html>