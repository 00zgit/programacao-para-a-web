<?php
$pessoas = [];

const SAIR = 0;
const INSERIR_PESSOA = 1;
const REMOVER_PESSOA = 2;
const PROCURAR_PESSOA = 3;
const EDITAR_PESSOA = 4;
const LISTAR = 5;

do{
  echo "\n\t1 - Inserir uma pessoa\n
  \t2 - Remover uma pessoa\n
  \t3 - Procurar por uma pessoa\n
  \t4 - Editar pessoa\n
  \t5 - Listar pessoas alfabeticamente\n
  \t0 - Sair\n
  \t>> ";
  $escolha = readline();

  switch($escolha){
    case INSERIR_PESSOA:{
      inserePessoa($pessoas);
    }break;
    case REMOVER_PESSOA:{
      if(checaListaVazia($pessoas)){
        echo "\n\nLista vazia\n\n";
        break;
      }
      removePessoa($pessoas);
    }break;
    case LISTAR:{
      if(checaListaVazia($pessoas)){
        echo "\n\nLista vazia\n\n";
        break;
      }
      listaAlfabeticamente($pessoas);
    }break;
    case SAIR: break;
    case EDITAR_PESSOA:{
      if(checaListaVazia($pessoas)){
        echo "\n\nLista vazia\n\n";
        break;
      }
      editaPessoa($pessoas);
    }
    case PROCURAR_PESSOA:{
      if(checaListaVazia($pessoas)){
        echo "\n\nLista vazia\n\n";
        break;
      }
      if(!procuraPessoa($pessoas)){
        echo "\n\nNome não encontrado\n\n";
      }
    }
    default: echo "\n\nEscolha inválida\n\n";
  }
} while ($escolha != 4);


function inserePessoa(&$pessoas){
  $nome = readline("Nome: ");
  $idade = readline("Idade: ");
  $p = [ 'nome'=>$nome, 'idade'=>$idade ];
  $pessoas []= $p;

  return;
}

function removePessoa(&$pessoas){
  $nome = readline("Nome: ");
  $indice = -1;
  foreach($pessoas as $id => $p){
    if($nome === $p['nome']){
      $indice = $id;
      break;
    }
  }
  if($indice != -1){
    unset($pessoas[$indice]);
    echo "\n\nElemento removido\n\n";
    return;
  }
  echo "\n\nNome não encontrado\n\n";

  return;
}

function checaListaVazia(&$pessoas){
  return empty($pessoas);
}

function listaAlfabeticamente(&$pessoas){
  usort($pessoas, function($nome1,$nome2){
    if($nome1 === $nome2){
      return 0;
    }
    else if($nome1 > $nome2){
      return 1;
    }
    else return -1;
  });

  foreach($pessoas as $ind => $p){
      echo $ind . " : " . $p['nome'] . " = " . $p['idade'];
  }

  return;
}

function editaPessoa(&$pessoas){
  //...

  
  return;
}

function procuraPessoa(&$pessoas){
  $nome = readline("Nome: ");
  $indice = -1;
  foreach($pessoas as $id => $p){
    if($nome === $p['nome']){
      $indice = $id;
      break;
    }
  }
  if($indice != -1){
    //...

    return true;
  }

  return false;
}

?>