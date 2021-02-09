<?php 

class ServicesClient{

    private $db;
    private $client;

    public function __construct(IConn $db, IClient $client)
    {
        $this->db = $db->connect();
        $this->client = $client;
    }

    public function list()
    {
        $query = "Select * from `cliente` order by `nome`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $res =$stmt->fetchAll();
        return $res;
    }
    public function save()
    {
        if (isset($_REQUEST['cadastrar'])) {
            if ($_REQUEST['cliente']=="") {
                header('Location: cliente.php');
            } else {
                $query = "insert into cliente (nome) values (:nome)";
                $stmt = $this->db->prepare($query);
                $nome = $_REQUEST['cliente'];
                $stmt->bindValue(":nome", $nome);
                $stmt->execute();
                header('Location: cliente.php');
            }
        } else {
           
        }
        

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function allValor()
    {
        $query = "select * from produtos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $total+=$row['qtd']*$row['preco'];
        }
        echo $total=number_format($total, 2, ',', '.');
    }


}
