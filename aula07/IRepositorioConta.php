<?php

require_once 'RepositorioException.php';

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
  function depositar();
}

?>