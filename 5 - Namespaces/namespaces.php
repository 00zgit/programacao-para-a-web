<?php

require_once 'namespace1.php';
require_once 'namespace2.php';
use cefet\Aluno;
use cefet\Turma;

$b = new Turma();
$b->codigo = '007';

$a = new Aluno('Teste',$b);
$a->nome = 'Teste';

echo $a->nome;
echo PHP_EOL;
echo $a->turma->codigo;

?>