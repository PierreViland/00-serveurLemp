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

    <script>
        // Fonction exécutée une fois que la librairie est chargée
        function librairieChargee() {
            // Événement de soumission du formulaire
            document.getElementById("loginForm").addEventListener("submit", function(event) {
                event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

                // Hasher le mot de passe et soumettre le formulaire
                hashPasswordAndSubmit();
            });
        }

        // Fonction pour hasher le mot de passe et soumettre le formulaire
        function hashPasswordAndSubmit() {
            var mdpInput = document.getElementById("mdp");
            var mdpValue = mdpInput.value;	
	    console.log("Test");
            // Vérifier si la fonction sha256 est définie
            if (typeof sha256 === "function") {
                // Hashage du mot de passe en SHA-256
                var hashedPassword = sha256(mdpValue);
	
		// Afficher le hash dans la console
        	console.log("hashedPassword:");
	
		console.log("Ca crain");
                // Convertir le hash SHA-256 en Base64
                var base64Hash = btoa(hashedPassword);
		console.log("base64 " , hashedPassword);

                // Affecter le hash Base64 à l'élément input du formulaire
                mdpInput.value = base64Hash;

                // Soumettre le formulaire
                document.getElementById("loginForm").submit();
            } else {
                // Si sha256 n'est pas défini, afficher une erreur dans la console
                console.error("La fonction sha256 n'est pas définie. Veuillez vérifier le chargement de la librairie js-sha256.");
            }
        }

        // Charger la librairie de manière asynchrone
        var script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.9.0/sha256.min.js';
        script.onload = librairieChargee; // Appeler librairieChargee lorsque la librairie est chargée
        document.head.appendChild(script);
    </script>

</body>
</html>

