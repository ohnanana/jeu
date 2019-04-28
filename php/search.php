<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
  // démarrage d'une session

// on vérifie que les variables de session identifiant l'utilisateur existent
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['mdp'])) { 
?>
	<a href="liste.php">Liste Jeux</a>
	<button onclick="self.location.href='logout.php'">Se deconnecter</button><br>
<?php
include 'fonction.php';
include 'fonctiontable.php';

searchtitle();
	
}


else {
			echo 'vous n\'etes pas connecté'.'<br>';
			?> <a href="index.php">Se connecter </a>
			<?php 
		}
?>
</body>
</html>