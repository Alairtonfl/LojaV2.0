<?php 
session_start();
    if(isset($_POST['usuario']) || isset($_POST['senha'])) {
        require_once "IConn.php";
        require_once "Conn.php";

        $db = new Conn("localhost","loja","bd_loja","lojafaveira");
        $conn = $db->connect();

        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);

        $query = "SELECT `usuario` FROM `usuario` WHERE `usuario` = :usuario  AND `senha` = :senha;";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":usuario",$usuario);
        $stmt->bindValue(":senha",$senha);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $_SESSION['usuario']=$usuario;
            header('Location: ../cliente.php');
        } else {
            header('Location: ../index.php');
        }
} 

if(!$_SESSION['usuario']){
    header('Location: ../index.php');
    exit();
}


