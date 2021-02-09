<?php

class Conn implements IConn
{
    private $host = "localhost";
    private $dbname = "loja";
    private $user = "bd_loja";
    private $pass = "";


    public function connect()
    {
        try{
            return new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->user,
                $this->pass
            );
            echo "conectado";
        }catch(PDOException $e){
            echo "Error! Message:".$e->getMessage()." Code:".$e->getCode();
            exit;
        }
    }
}