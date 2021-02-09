<?php 

class Product implements IProduct{

    private $idp;
    private $name;
    private $preco;
    private $qtd;


    public function getIdp()
    {
        return $this->idp;
    }


    public function setIdp($idp)
    {
        $this->idp = $idp;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }


    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }


    public function getQtd()
    {
        return $this->qtd;
    }


    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
        return $this;
    }

}