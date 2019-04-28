<?php


  // démarrage d'une session

// on vérifie que les variables de session identifiant l'utilisateur existent
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
	include 'fonction.php';
	include 'fonctiontable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$user = getnewtitle();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$user = readtitle($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
	
	


?>

<html>
<header>
	<link rel="stylesheet" href="style.css">
</header>
<body>

		<button onclick="self.location.href='logout.php'">Se deconnecter</button>
	<form action="createupdate.php" method="get">
	<p>	
		<a href="liste.php">Liste des utilisateurs</a>

		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<input type="hidden" name="action" value="<?php echo $action;  ?>"/>
		 <div>
        	<label for="title">Titre :</label>
        	<input type="text" id="Title" name="Title" value="<?php echo $user['Title'];  ?>">
	    </div>
	    <div>
	        <label for="ReleaseDate">Release date</label>
	        <input type="text" id="ReleaseDate" name="ReleaseDate" value="<?php echo $user['ReleaseDate'];  ?>">
	    </div>
	    <div>
	        <label for="idPlatform">IdPlatform:</label>
	        <input type="number" id="idPlatform" name="idPlatform" value="<?php echo $user['idPlatform'];  ?>">
	    </div>
	    <div>
	        <label for="idPublisher">IdPublisher:</label>
	        <input type="number" id="idPublisher" name="idPublisher" value="<?php echo $user['idPlatform'];  ?>">
	    </div>
	    <div>
	        <label for="idDeveloper">IdDeveloper:</label>
	        <input type="number" id="idDeveloper" name="idDeveloper" value="<?php echo $user['idPlatform'];  ?>">
	    </div>
	    
		<div class="button">
			<button type="submit"><?php echo $libelle;  ?></button>
		</div>
	</p>
	</form>
	<br>
	

	<?php if ($action!="CREATE") { ?>
	<form action="createupdate.php" onsubmit="return confirm('Etes-vous sur de votre choix ?');" method="get">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit" >Supprimer</button>
		</div>
		</p>
	</form>
	<?php }}
	else {
			echo 'vous n\'etes pas connecté'.'<br>';
			?> <a href="index.php">Se connecter </a>
		<?php	
		}
	
?> 

</body>
</html>