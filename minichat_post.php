<?php

$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);

try
{
	$bdd = new PDO('mysql:host=us-cdbr-iron-east-04.cleardb.net;dbname=ad_066728bfc999067;charset=utf8', 'be78ea75adc48e', '0104c83f ');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');
$req->execute(array(
	'pseudo' => $pseudo,
	'message' => $message
	));
	
header('Location: index.php');

?>
