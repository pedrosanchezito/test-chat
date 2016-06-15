<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
        <title>mini chat</title>
    </head>
    <body>
	
	<div id="main_page">
	<form method="post" action="minichat_post.php" >
		Pseudo: <input type="text" name="pseudo" placeholder="votre pseudo ..." /><br />
		Message: <textarea name="message" placeholder="votre message ..."></textarea><br />
		<p><input type="submit" name="Envoyer" value="Envoyer"/></p>
	</form>	
	
	<div id="chat">
	<?php	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
	die('Erreur : ' . $e->getMessage());
	}

	$req = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0, 10 ');
	
	while ($data = $req->fetch())	
	{
	?>
	<section class="message">
	<p><strong><?php echo $data['pseudo']; ?> : </strong><?php echo $data['message']; ?></p>
	</section>
	<?php
	}
	$req->closeCursor();
	?>
	</div>
	</div>
	</body>
</html>