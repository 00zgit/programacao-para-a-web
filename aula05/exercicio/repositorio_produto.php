<?php

namespace Acme;

interface IRepositorioProduto{
	function salvar(array $produtos);
	function carregar(): array;
}

?>