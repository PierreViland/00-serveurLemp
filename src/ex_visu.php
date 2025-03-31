<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Visu client</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Liste clients<h2> 
		
		<p>
				
		<?php
		
		$bdd = new PDO('mysql:host=mysql;port=3306;dbname=compte_visualisation;charset=utf8', 'root', 'root');		
		
	
		
		$rep = $bdd->query('SELECT * FROM bddHash');
				
			while ($reponse_bdd = $rep->fetch())
			{		
				 echo $reponse_bdd['ID'] .' ---- ' .
						$reponse_bdd['Nom'] . ' - ' .
						$reponse_bdd['Prenom'] . ' - XXXXXX  Euros'.'<br>';						
			}
		
		?>
	<p>		
	<li > <a href="index.html">Accueil</a> </li >
	</p>
			
		
    </body>
</html>
