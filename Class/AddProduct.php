<?php
require_once "login.php";
require_once "IConn.php";
require_once "Conn.php";
$db = new Conn();
$conn = $db->connect();
$id = $_GET['id'];

// SELECIONANDO O PRODUTO PARA AUMENTAR A QTD
$query = "select * from produtos where id = :id";
$stmt = $conn->prepare($query);
$stmt->bindValue(":id", $id);
$stmt->execute();
$row = $stmt->fetch();
$idp=$row['idp'];
$nome=$row['nome'];
$prec=$row['preco'];
$dia = (string)date("d/m/Y");

// EXECUTANDO O INSERT
$query = "insert into produtos (idp, nome, dia, preco, qtd) values (:idp, :nome, :dia, :preco, :qtd)";
$stmt = $conn->prepare($query);
$stmt->bindValue(":idp", $idp);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":dia", $dia);
$stmt->bindValue(":preco", $prec);
$stmt->bindValue(":qtd", 1);
$stmt->execute(); 
header("Location: ".$_SERVER['HTTP_REFERER']."");