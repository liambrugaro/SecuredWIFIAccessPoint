<?php
/*
	* Hey, ca va?
	* Bon, le truc, le voici :
	* 1) TOn fichier de donnée doit avoir une clée et une valeur, sinon tu ne va pas t'y retrouver, et toujours avec la meme syntaxe. Genre
	* "cle:valeur
	* cle:valeur" ect....
	* 
	* On va partir sur ce texte la :
	* "wpa-pwd:123456789
	* ssid:superPatate
	* canal:5"
	* 
	* 2) Dans l'algo, tu vas vouloirs, par exemple, chercher la valeur d'une clée. Tu vas crée une fonction qui donne la valeur en échange de la clé
	* genre "getValeurDonnee("ssid") -> Ca va retourner "superpatate"
	* 
	* 3) La fonction va faire ces choses la :
	* a -> récupéré sous forme de string le contenu du fichier data
	* b -> spliter le string avec comme indicateur le retour a la ligne "\n"
	* 
	* puis,
	* parcourir pour i chaque élement du tableau qui resort du splitage
	* 	Spliter i avec l'indicateur ":", de cette facon, i[0]-> la clee, et i[1] -> la valeur
	* 	si la clee(i[0]) et égale a la clée rentrer en argument, on retourne sa valeur(i[1])
	* si on vien jusqu'a la fn de la boucle, c'est que rien n'a été retourné, et donc que la clée est invalide. TU retourne donc genre "clée Invalide"
	* 
	* En code, plus ou moins, ca donne ca :
 */

function getValeurDonnee($clee)
{
	$texte = getValeurDeTonFicher();
	$tabValeur = explode("\n", $texte); // On split
	
	foreach( $tabValeur as $ligneTexte)
	{
		$cleEtVal = explode(":", $ligneTexte);
		if($cleEtVal[0] === $clee) //Je viens d'apprendre le coup du triple égale. Un truck chouette !
			return $$cleEtVal[1];
	}
	return "Clée pas bonne mdr";
}
?>
