<?php

namespace Acme;

public interface RepositorioProduto{
	function salvar(array $produtos);
	function carregar();
}

?>