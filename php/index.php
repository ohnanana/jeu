<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <h1>Connexion utilisateur</h1>
        <form action="login_post.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" name="login" id="nom" required />
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" required />
            <input type="submit" value="Connexion">
        </form>
    </body>
</html>