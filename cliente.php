<?php
require_once "Class/login.php";
require 'autoload.php';
$db = new Conn();
$client = new Client;
$service = new ServicesClient($db,$client);
$res=$service->list();
$service->save();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Clientes</title>
	<link rel="stylesheet" type="text/css" href="css/cliente.css">
</head>
<body>
	<header class="cabecalho">
	</header>
	<div class="box1">
		<div class="cliente">
		<h1>Seus Clientes</h1>
		<form action="cliente.php" method="post">
		<input type="text" name="cliente" placeholder="Cliente" maxlength="50">
		<input type="submit" name="cadastrar" value="Cadastrar">
		</form>
		<table>
			<tr>
				<td id="id">ID</td>
				<td id="nome">Nome</td>
				<td id="remover">Remover</td>
			</tr>
			<?php foreach ($res as $ress){?>
			<tr> 
				<td id="id"> <?php echo $ress['id'] ?></td>
				<td id="nome"> <a href="produtos.php?idp=<?php echo $ress['id']?>"> <?php echo $ress['nome']?> </a></td>
				<td id="remover"><a href="Class/DeleteClient.php?id=<?php echo $ress['id']?>"> Remover </a></td>

			</tr> 
			<?php }?>
		</table>
				<h2 id="total">Total de todas as contas: <?php $service->allValor(); ?>R$ </h2>
		</div>
	</div>
	<footer class='rodape'>
		<h1>Contato</h1>
		<h2>© 2019 | All directs reserved 
		| Developed by: Alairton Lima 
		| <a href="https://www.instagram.com/alairtonfl/" target="_blank">Instagram</a>
		| <a href="https://www.facebook.com/alairton.ferreira" target="_blank">Facebook</a></h2>
	</footer>
</body>
</html>