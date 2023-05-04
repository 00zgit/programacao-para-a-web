<?php

require_once 'BancoException.php';

interface IRepositorioConta
{
  /**
   * Cadastra uma conta.
   * 
   * @return true ou false
   * @throws RepositorioException
   */
  function cadastrar( Conta $conta );

  /**
   * Retorna contas existentes (no pass)
   * 
   * @return Array de Conta
   * @throws RepositorioException
   */
  function listarContas();

  /**
   * Permite depósito numa conta
   * 
   * @return true ou false
   * @throws RepositorioException
   */
  function depositar(string $cpf, string $montante);

  /**
   * Permite a transferência entre duas contas
   * 
   * @return true ou false
   * @throws ContaException
  */
  function transferir(string $origem, string $destino, string $montante);
}

?>