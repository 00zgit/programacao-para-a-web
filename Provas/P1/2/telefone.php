<?php

$telefone = '12345678901';

if(is_numeric($telefone) && (mb_strlen($telefone) == 11 || mb_strlen($telefone) == 10))
{
	if(mb_strlen($telefone) == 10)
	{
		$t0 = mb_substr($telefone,0,2);
		$t0 = '('.$t0.')';
		$t1 = mb_substr($telefone,2,4);
		$t2 = mb_substr($telefone,6,4);
		echo $t0.' '.$t1.'-'.$t2;
	}
	else
	{
		$t0 = mb_substr($telefone,0,2);
		$t0 = '('.$t0.')';
		$t1 = mb_substr($telefone,2,5);
		$t2 = mb_substr($telefone,7,4);
		echo $t0.' '.$t1.'-'.$t2;	
	}
}else echo '';