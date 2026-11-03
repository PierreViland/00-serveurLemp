<!DOCTYPE html>
<html>
<head>
    <title>Visualisation compte</title>
    <meta charset="utf-8" />
</head>
<body>

    <h2>Identifiez-vous pour visualiser votre compte</h2>
    <p>
        Pour vous identifier, entrez votre nom et votre mot de passe (nom tout en minuscules)
    </p>

    <!-- Début du formulaire -->
    <form id="loginForm" method="post" action="visu_compte.php">
        <p>Nom : <input type="text" id="nom" name="nom"></p>
        <p>Mot de passe : <input type="password" id="mdp" name="mdp"></p>

        <p>
            <input type="submit" name="valider" value="Visualiser solde compte">
        </p>
    </form>

    <p>
        <a href="index.html">Accueil</a>
    </p>

</body>
</html>

