<?php
require_once "login.php";
require_once "IConn.php";
require_once "Conn.php";
$db = new Conn();
$conn = $db->connect();
$id = $_GET['idp'];

//ENVIAR OS DADOS PRA LIXEIRA ANTES DE APAGAR
$query = "Select * from produtos where idp = :id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':id',$id);
$stmt->execute();
$res = $stmt->fetchAll();

//APAGAR OS DADOS ANTIGOS DA LIXEIRA
$query = "DELETE FROM produtos WHERE idp = :id";
$stmt = $conn->prepare($query);
$stmt->bindValue(":id", 207);
$stmt->execute();


//INSERINDO OS DADOS NA LIXEIRA
foreach ($res as $row) {
    $query = "insert into produtos (idp, nome, dia, preco, qtd) values (:idp, :nome, :dia, :preco, :qtd)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':idp', 207);
    $stmt->bindValue(':nome', $row['nome']);
    $stmt->bindValue(':dia', $row['dia']);
    $stmt->bindValue(':preco', (float)$row['preco']);
    $stmt->bindValue(':qtd', $row['qtd']);
    $stmt->execute();
}

$query = "DELETE FROM produtos WHERE idp = :id";
$stmt = $conn->prepare($query);
$stmt->bindValue(":id", $id);
$stmt->execute(); 
header("Location: ".$_SERVER['HTTP_REFERER'].""); 
