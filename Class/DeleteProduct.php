<?php
require_once "login.php";
require_once "IConn.php";
require_once "Conn.php";
$db = new Conn();
$conn = $db->connect();
$id = $_GET['id'];

$query = "DELETE FROM produtos WHERE id = :id limit 1";
$stmt = $conn->prepare($query);
$stmt->bindValue(":id", $id);
$stmt->execute(); 
header("Location: ".$_SERVER['HTTP_REFERER']."");