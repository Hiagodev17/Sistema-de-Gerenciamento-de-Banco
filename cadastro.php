<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
           
            margin: 0;
            padding: 40px;
        }
        table {
            background: #fff;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow:black;
            width: 350px;
        }
        th {
            background: #007bff;
            color: #fff;
            font-size: 1.2em;
            padding: 12px;
            text-align: center;
        }
        td {
            padding: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 95%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
<body>
    

<?php
   
    $id_gerente = $_POST["id_gerente"];

    echo '<table border= 1px solid black;><tr><th>CADASTRAR CLIENTE</th></tr>
				<form method="post" action="cadastrarCliente.php" id="cadastrarCliente" name="cadastrarCliente" >
					<tr><td><label>Nome</label></td><td><input type="text" name="nome"></td></tr>
					<tr><td><label>E-mail</label></td><td><input type="text" name="email"></td></tr>
					<tr><td><label>Senha</label></td><td><input type="text" name="senha"></td></tr>
					<input type="hidden" name="id_gerente" value="'.$id_gerente.'">
					<tr><td><input type="submit" value="CADASTRAR"></td></tr>
					</form>
				</table>';
    
    
   
    exit();


?>
</body>
</html>