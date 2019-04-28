<?php

  // démarrage d'une session

// on vérifie que les variables de session identifiant l'utilisateur existent
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['mdp'])) { 

	include 'fonction.php';
	include 'fonctiontable.php';
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id = $_GET["id"];
	} else {
		$id = $_GET["id"];
		$Title = $_GET["Title"];
		$ReleaseDate = $_GET["ReleaseDate"];
		$idPlatform = $_GET["idPlatform"];
		$idPublisher = $_GET["idPublisher"];
		$idDeveloper = $_GET["idDeveloper"];
		
	}
	

	if ($action == "CREATE") {
		createtitle($Title, $ReleaseDate, $idPlatform, $idPublisher, $idDeveloper);

		echo "Jeu crée <br>";
		echo "<a href='liste.php'>Liste des Jeux</a>";
		
	}
	
	if ($action == "UPDATE") {
		updatetitle($id, $Title, $ReleaseDate, $idPlatform, $idPublisher, $idDeveloper);
		echo "Jeu mis à jour <br>";
		echo "<a href='liste.php'>Liste des Jeux</a>";
	}
	if ($action == "DELETE") {
		deletetitle($id);
		echo "Jeu supprimé <br>";
		echo "<a href='liste.php'>Liste des Jeux</a>";
	}
	
}
else {
			echo 'vous n\'etes pas connecté'.'<br>';
			?> <a href="index.php">Se connecter </a>
		<?php	
		}
	
?>
<button onclick="self.location.href='logout.php'">Se deconnecter</button>