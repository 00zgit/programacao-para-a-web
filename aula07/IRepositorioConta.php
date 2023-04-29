<?php

interface IRepositorioConta
{
  /**
   * Cadastra uma conta.
   * 
   * @throws RepositorioException
   */
  function cadastrar( Conta $conta );

  /**
   * Retorna contas existentes (no pass)
   * 
   * @throws RepositorioException
   */
  function listarContas(): array;

  /**
   * Permite depósito numa conta
   * 
   * @throws RepositorioException
   */
  function depositar();
}

?>