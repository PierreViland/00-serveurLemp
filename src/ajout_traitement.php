<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Ajout client</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Visualisation de mon comptes<h2> 
		
		<p>
		<?php 

		echo $_POST['nom'].'<br>';
		echo $_POST['prenom'].'<br>';
		echo $_POST['mdp'].'<br>';
		echo $_POST['solde'].'<br>';		
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];		
		$mdp = $_POST['mdp'];
		$solde = $_POST['solde'];
				
		try
		{					
			$bdd = new PDO('mysql:host=mysql;port=3306;dbname=compte_visualisation;charset=utf8', 'root', 'root');			
			//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
			//$rep = $bdd->query("SELECT * from liste_compte WHERE Nom ='".$_POST['nom']."' AND Mot_de_passe = '".$_POST['mdp']."'"  );
			
			
				$rep = $bdd->query("INSERT INTO bddHash (ID, Nom, Prenom, Mot_de_passe, solde) VALUES (NULL, '$nom', '$prenom', '$mdp', '$solde')");;
		echo "Compte créé";	
			
			
							
			
		}
		catch (Exception $e)
		{
			echo 'ID n\'ont valide';
			die('Erreur : ' . $e->getMessage());
		}		
		?>
		
		
		
	
	<p>		
	<li > <a href="index.html">Accueil</a> </li >
	</p>	
		
    </body>
</html>
