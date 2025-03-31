<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Visu compte</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Visualisation du solde<h2> 
		
		<p>
		<?php 
		echo 'Client :  '.htmlspecialchars($_POST['nom']). '<br>';

		?>		
		
		
		<?php	
		echo  '<br>'.'-----------------------'.'Premier TEST'. '<br>';		
		
		try
		{					
			$bdd = new PDO('mysql:host=mysql;port=3306;dbname=compte_visualisation;charset=utf8', 'root', 'root');			
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
			//$rep = $bdd->query("SELECT * from liste_compte WHERE Nom ='".$_POST['nom']."' AND Mot_de_passe = '".$_POST['mdp']."'"  );
			


			$rep = $bdd->query("SELECT * from bddHash WHERE Nom ='".$_POST['nom']."' AND Mot_de_passe = '".$_POST['mdp']."'"  );
		
			
			// INjection : aa ' OR 1=1# (l plus imple mais pas propre
			//  aaa' OR  1=1 "'".     "'"   
			if($rep->rowCount() > 0) {
			    // Il y a des résultats	
			
				while ($reponse_bdd = $rep->fetch())
				{		
					 echo $reponse_bdd['ID'] .' ---- ' .
							$reponse_bdd['Nom'] . ' - ' .
							$reponse_bdd['Prenom'] . ' - ' . 
							$reponse_bdd['solde'] . ' Euros'.'<br>';						
				}
			} else {
				echo "Erreur d'authentification. ";
				echo "Pour des raisons de sécurité : ".'<br>';
				echo "Ne pas dire si c'est le login ou le mot de passe";
			}				
			
		}
		catch (Exception $e)
		{
			echo 'ID n\'ont valide';
			die('Erreur : ' . $e->getMessage());
		}		
		?>
		
	
	
		<?php	
		echo  '<br>'. '<br>'.'-----------------------'.'Deuxime TEST'. '<br>';	
		//AUTRE METHODE POUR VISUALISER		
		try
		{					
		
			$N = $_POST['nom'];
			$P = $_POST['mdp'];
			
			$rep=$bdd->prepare("SELECT * from bddHash WHERE Nom =:nom AND Mot_de_passe = :mot_de_passe");
			$rep->bindParam(':nom', $_POST['nom']);
			$rep->bindParam(':mot_de_passe', $_POST['mdp']);
			$rep->execute();
			
						
                        if($rep->rowCount() > 0) {
                        // Il y a des résultats
  	
				while ($reponse_bdd = $rep->fetch())
				{		
					echo $reponse_bdd['ID'] .' ---- ' .
						$reponse_bdd['Nom'] . ' - ' .
						$reponse_bdd['Prenom'] . ' - ' . 
						$reponse_bdd['solde'] . ' Euros'.'<br>';						
				}						
		 	} else {
				echo "Erreur d'authentification. ";
    				echo "Pour des raisons de sécurité : ".'<br>';
    				echo "Ne pas dire si c'est le login ou le mot de passe";
			}	
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
