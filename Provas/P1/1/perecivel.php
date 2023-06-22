<?php

class Perecivel
{
	function __construct(string $descricao = '', string $validade = '')
	{
		$this->descricao = $descricao;
		$this->validade = $validade;
	}

	public $descricao;
	public $validade;
}