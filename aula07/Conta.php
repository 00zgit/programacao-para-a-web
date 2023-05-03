<?php

class Conta 
{
    public $id = 0;
    public $dono = '';
    public $cpf = '';
    public $senha = '';
    public $saldo = 0.00;

    public function __construct(
        $id = 0, $dono = '', $cpf = '', $senha = '', $saldo = 0.00)
    {
        $this->id = $id;
        $this->dono = $dono;
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->saldo = $saldo;
    }

    public function meuHash()
    {
        return hash('sha256', $this->senha . '##SUPER_SECRET_SALT##');
    }
}
?>