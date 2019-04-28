<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<title></title>

<?php
  // démarrage d'une session

// on vérifie que les variables de session identifiant l'utilisateur existent
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['mdp'])) { 
?>
</head>

<body>
	
     <header>
   <img src="logo.jpg" alt="logo">  	

     </header>   

<a href=formulaireutilisateur.php?id=0 >Créer un Nouveau Jeu Vidéo</a>
<form  method="get" action="search.php">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="var1" type="text" id="var1">
      <input type="submit" value="search"></th>
    </tr>
  </table>
</form>
<button onclick="self.location.href='logout.php'">Se deconnecter</button>
<?php
include 'fonction.php';
include 'fonctiontable.php';
 

$headers = getHeaderTable();
		$title = getalltitle();
		afficherTableau($title, $headers);}
		else {
			echo 'vous n\'etes pas connecté';
			?> <a href="index.php">Connexion </a>
			<?php 
		}
?>




</body>
</html>