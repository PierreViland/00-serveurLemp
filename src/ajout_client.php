<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Ajout client </title>
        <meta charset="utf-8" />
    </head>
	
    <body>
    
	<h2> Informations à fournir</h2>
	<p>
	
 
	</p>
	
	<!-- Debut du formulaire -->
	<form id="newForm" method="post" action="ajout_traitement.php" >
	
		<p>Nom : <input type="text" name="nom" /input> </p> 
		<p>Prenom : <input type="text" name="prenom" /input> </p> 
		<p>Mot de passe  : <input type="password" id="mdp" name="mdp" /input> </p>	
		<p>Solde  : <input type="text" name="solde" /input> </p>
		
		<p> 
		<input type="submit" name="valider " value="ajout client" />
		</form>
		</p>
	
	</form>
		
<script>
        // Fonction exécutée une fois que la librairie est chargée
        function librairieChargee() {
            // Événement de soumission du formulaire
            document.getElementById("newForm").addEventListener("submit", function(event) {
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
                document.getElementById("newForm").submit();
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


		<p>		
	<li > <a href="index.html">Accueil</a> </li >
	</p>
		
	
    </body>
</html>
