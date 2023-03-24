<?php

# Concatenação é com '.'
$nome = 'Rodrigo';
$c = "Meu nome é " . $nome . "!";
$c .= ' Tudo bem? :D';
//$end

# Debug
var_dump( $nome );
//$end

# Operadores unários pré e pós fixados
$x = 10;
$y = $x++; // x = 11 e y = 10
$y = ++$x; // x = 10 e y = 11
// obs: comum a todas as linguagens....
// precedência é o que conta
//$end


?>