<?php

namespace acme;

class Produto 
{
    public $codigo = '';
    public $descricao = '';
    public $estoque = 0;
    public $preco = 0.00;

    public function __construct($codigo = '', $descricao = '', $estoque = 0, $preco = 0.00)
    {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco = $preco;
    }
}
?>