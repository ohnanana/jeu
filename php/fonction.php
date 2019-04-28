<?php



function getdatabaseconnexion(){
	try{
		$user = "root";
		$pass = "";
		$pdo =  new PDO('mysql:host=localhost;port=3307; dbname=videogames;charset=utf8', $user, $pass);
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}

}
function getalltitle(){
	$con = getdatabaseconnexion();
	$requete = 
	'SELECT videogames.id, Title, ReleaseDate, platform.name, publishers.name, developers.name, genres.name  
	FROM videogames
	INNER JOIN platform ON platform.id = videogames.idPlatform 
	LEFT JOIN gamesgenres ON gamesgenres.idVideoGame = videogames.id
	LEFT JOIN genres ON genres.id = gamesgenres.idVideoGame
	INNER JOIN publishers ON publishers.id = videogames.idPublisher 
	INNER JOIN developers ON developers.id = videogames.idDeveloper ';
	$ro = $con->query($requete);
	return $ro;
}
function createtitle($Title,$ReleaseDate,$idPlatform,$idPublisher,$idDeveloper){
	try{
		$con = getdatabaseconnexion();
		$sql = "INSERT INTO videogames (Title, ReleaseDate, idPlatform, idPublisher, idDeveloper)
		VALUES ('$Title', '$ReleaseDate', '$idPlatform', '$idPublisher', '$idDeveloper') ";
		$con->exec($sql);
	}
	catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
	}
	
}
function updatetitle($id,$Title,$ReleaseDate,$idPlatform,$idPublisher,$idDeveloper){
	try{
		$con = getdatabaseconnexion();
		$requete = "UPDATE videogames set 
		Title = '$Title',
		ReleaseDate = '$ReleaseDate',
		idPlatform = '$idPlatform',
		idPublisher = '$idPublisher',
		idDeve per = '$idDeveloper'
		where id = '$id' ";
		$stmt = $con->query($requete);
	}
	catch(PDOException $e){
		echo $requete . "<br>" . $e->getMessage();
	}
	
}
function deletetitle($id){
	try{
		$con = getdatabaseconnexion();
		$requete = "DELETE FROM  videogames where id = '$id' ";
		$stmt = $con->query($requete);
	}
	catch(PDOException $e){
		echo $requete . "<br>" . $e->getMessage();
	}
}
function readtitle($id){
	$con = getdatabaseconnexion();
	$requete = "SELECT * FROM videogames where id ='$id'";
	$stmt = $con->query($requete);
	$row = $stmt->fetchAll();
	if (!empty($row)){
		return $row[0];
	}

}

function getnewtitle() {
		$title['id'] = "";
		$title['Title'] = "";
		$title['ReleaseDate'] = "";
		$title['idPlatform'] = "";
		$title['idPublisher'] = "";
		$title['idDeveloper'] = "";
		
	}
function searchtitle(){

try{
		$user = "root";
		$pass = "";
		$pdo =  new PDO('mysql:host=localhost;dbname=videogames;charset=utf8', $user, $pass);
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}

$var1 = $_GET['var1'];


$query = "SELECT * FROM videogames WHERE Title LIKE :search ";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_STR);
$stmt->execute();

print("Liste de résultats:\n").'<br>';


 
 

if ($stmt->rowCount() > 0) { 
$result = $stmt->fetchAll();

foreach( $result as $row ) {
echo '<a href=formulaireutilisateur.php?id='.$row["id"].' >'.$row["id"].'</a>'; ["id"].'  '  ;
echo $row["Title"].'<br>';
}
} else {
echo 'Rien à afficher';
}
}


/**
 * Nettoie une valeur insérée dans une page HTML
 * Doit être utilisée à chaque insertion de données dynamique dans une page HTML
 * Permet d'éviter les problèmes d'exécution de code indésirable (XSS)
 * @param string $valeur Valeur à nettoyer
 * @return string Valeur nettoyée
 */
function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

/**
 * Gère la connexion à la base de données
 * @return PDO Objet de connexion à la BD
 */
function getBdd() {
    return new PDO("mysql:host=localhost;port=3307;dbname=videogames;charset=utf8",
        "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

?>
