<?php
session_start();  // sert à démarrer une session

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['login']) && isset($_POST['mdp'])) {
    require 'fonction.php';
    $bdd = getBdd();
    // cette requête permet de récupérer l'utilisateur depuis la bD
    $requete = "SELECT * FROM utilis WHERE LoginUtil=? AND PassUtil=?";
    $resultat = $bdd->prepare($requete);
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $resultat->execute(array($login, $mdp));
    if ($resultat->rowCount() == 1) {
        // l'utilisateur existe ds la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        // cette variable indique que l'authentification a bien marché
        $authOK = true;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Résultat de l'authentification</title>
</head>
<body>
    <h1>Résultat de l'authentification</h1>
    <?php
    if (isset($authOK)) {
        echo "<p>Vous avez été reconnu(e) en tant que " . escape($login) . "</p>";
        echo '<a href="liste.php">Poursuivre vers la page d\'accueil</a>';
    }
    else { ?>
        <p>Vous n'avez pas été reconnu(e)</p>
        <p><a href="index.php">Nouvel essai</p>
    <?php } ?>
</body>
</html>