<?php 

class ServicesProduct{

    private $db;
    private $product;

    public function __construct(IConn $db, IProduct $product)
    {
        $this->db = $db->connect();
        $this->product = $product;
    }

    public function list($idp)
    {
        $query = "Select * from produtos where idp = :idp order by nome";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idp',$idp);
        $stmt->execute();
        $res =$stmt->fetchAll();
        return $res;
    }


    public function save()
    { 
        if (isset($_REQUEST['cadastrar'])) {
            if ($_REQUEST['produto']=="" || $_REQUEST['preco']== null || $_REQUEST['qtd']== null) {
                header('Location: produtos.php?idp='.$_GET['idp']);
            } else {
                $nome = $_REQUEST['produto'];
                $preco = (float)$_REQUEST['preco'];
                $qtd = (int)$_REQUEST['qtd'];
                $dia = (string)date("d/m/Y");
                $idp = $_REQUEST['idp'];
                $query = "insert into produtos (idp, nome, dia, preco, qtd) values (:idp, :nome, :dia, :preco, :qtd)";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':idp', $idp);
                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':dia', $dia);
                $stmt->bindValue(':preco', $preco);
                $stmt->bindValue(':qtd', $qtd);
                $stmt->execute();
                header('Location: produtos.php?idp='.$_REQUEST['idp']);
            }
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function nameClient($idp){
        $query = "Select (nome) from `cliente` where id = :idp";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idp',$idp);
        $stmt->execute();
        $name =$stmt->fetch();
        return $name;
    }

    public function valorTotal($total){
        $total=number_format($total, 2, ',', '.');
        echo $total.' '.'R$';
    }


}
