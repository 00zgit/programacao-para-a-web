<?php

require_once 'repositorio-lutador.php';

class RepositorioLutadorEmBdr implements RepositorioLutador
{
	private $pdo;

	function __construct(PDO $p)
	{
		$this->pdo = $p;
	}

	function cadastrar($lutador)
	{
		try{
			$ps = $this->pdo->prepare('INSERT INTO lutador (nome, peso_em_quilos, altura_em_metros) VALUES (?,?,?)');
			$ps->prepare([$lutador->nome, $lutador->pesoEmQuilos, $lutador->alturaEmMetros]);
			$ps->execute();
		}catch(Exception $ex){ $ex->getMessage(); }
	}

	function remover($id)
	{
		try{
			$this->pdo->beginTransaction();
			$ps = $this->pdo->prepare('DELETE FROM lutador WHERE id = ?');
			$ps->prepare([$id]);
			$ps->execute();
			$this->pdo->commit();
		}catch(Exception $ex) { $this->pdo->rollback(); }
	}
}