<?php
namespace Mma;

require_once 'lutador.php';

interface RepositorioLutador
{
	function adicionar(Lutador $lutador);
	function remover(int $id);
}