<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mercearia O Jacinto Maria</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="box">
		<div class="tela">
			<img src="Includes/user.png" class="logo">
			<h1>Entrar</h1>
			<form action="Class/Login.php" method="post">
				<p>Username</p>
				<input type="text" name="usuario" placeholder="Usuario" maxlength="10">
				<p>Senha</p>
				<input type="password" name="senha" placeholder="Senha" maxlength="8">
				<input type="submit" name="submit" value="Login">
			</form>
		</div>
	</div>
	<footer class='rodape'>
		<h1>Contato</h1>
		<h2>© 2019 | All directs reserved 
		| Developed by: Alairton Lima 
		| <a href="https://www.instagram.com/_alairton/" target="_blank">Instagram</a>
		| <a href="https://www.facebook.com/alairton.ferreira" target="_blank">Facebook</a></h2>
	</footer>
	<script src="JavaScript/login.js"></script>
</body>
</html>