<?php
require_once "login.php";
require_once "IConn.php";
require_once "Conn.php";
$db = new Conn();
$conn = $db->connect();
$id = $_GET['id'];


$query = "Select * from produtos where idp = :id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':id',$id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../cliente.php');
} else {
    $query = "DELETE FROM cliente WHERE id = :id limit 1";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute(); 
    header('Location: ../cliente.php');
} 




