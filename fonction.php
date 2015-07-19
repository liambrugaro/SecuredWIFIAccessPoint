<?php

$fichier='param_recup';
$texte = file($fichier);
function getValeur($clee)
{

	$fichier='param_recup';
	$texte = file($fichier);

foreach( $texte as $ligne)
{
	$cleeEtVal = split(":",$ligne);
	if ( $cleeEtVal[0] === $clee )
	{
		return substr($cleeEtVal[1],0,strlen($cleeEtVal[1])-1);;
	}
	//print_r($cleeEtVal);
}
	return "Clée pas bonne mdr";
}
?>
