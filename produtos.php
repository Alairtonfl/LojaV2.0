<?php 
session_start();
require_once "Class/login.php";
require 'autoload.php';
$db = new Conn();
$idp = $_GET['idp'];
$product = new Product;
$service = new ServicesProduct($db,$product);
$res = $service->list($idp);
$service->save();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Produtos</title>
	<link rel="stylesheet" type="text/css" href="css/produtos.css">
</head>
<body>
	<header class="cabecalho">
	<a href="cliente.php" ><img src="Includes/voltar.png" class="back"></a>

	</header>
	<div class="box1">
		<div class="produto">
		<h1><?php echo $service->nameClient($idp)['nome'];?>
        </h1>
		<form action="" method="post">
		<input type="text" name="produto" placeholder="Produto" maxlength="50">
		<input type="number" name="preco" placeholder="Preço" min="0" max="1000" maxlength="4" step=".01">
		<input id="qtd" type="number" name="qtd" placeholder="Qtd" min="0" max="1000" maxlength="4">
		<input type="submit" name="cadastrar" value="Cadastrar">
		</form>
		<table>
			<tr>
				<td id="nome">Produto</td>
				<td id="data">Data</td>
				<td id="preco">Preço</td>
				<td id="qtd">Qtd</td>
				<td id="remover">Remover</td>
			</tr>
			<?php foreach ($res as $ress){?>
			<tr>
				<td id="nome"> <?php echo $ress['nome'] ?> </td>
				<td id="data"> <?php echo $ress['dia'] ?> </td>
				<td id="preco"> <?php echo $ress['preco'] ?></td>
				<td id="qtd">  <?php echo $ress['qtd'] ?>  <a href="Class/AddProduct.php?id=<?php echo $ress['id']?>"> <?php echo "+"?> </a> 
				</td>
				<td id="remover"><a href="Class/DeleteProduct.php?id=<?php echo $ress['id']?>" onclick="return confirm('Tem certeza que deseja deletar este produto?')"> Remover </a></td>
				<?php $total+=$ress['qtd']*$ress['preco']?>
			</tr>
			<?php }?>
		<tr>
				<td id="preco">Total</td>
				<td id="qtd"> <?php $service->valorTotal($total); ?> </td> 
				<td id="qtd"> <a href="Class/PayAccount.php?idp=<?php echo $idp?>" onclick="return confirm('Tem certeza que deseja deletar todos os produtos?')">Pagar</a></td>
			</tr>
		</table>
		</div>
	</div>
	<footer class='rodape'>
		<h1>Contato</h1>
		<h2>© 2019 | All directs reserved 
		| Developed by: Alairton Lima 
		| <a href="https://www.instagram.com/alairtonfl/" target="_blank">Instagram</a>
		| <a href="https://www.facebook.com/alairton.ferreira" target="_blank">Facebook</a></h2>
	</footer>
	<script src="JavaScript/login.js"></script>
</body>
</html>