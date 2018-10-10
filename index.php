
<html>
<head>
	<meta charset="utf-8">
	<title>Naviguer et Télécharger</title>
	<link rel="stylesheet" media="all" type="text/css" href="monstyle.css"/>
</head>
<body>
<br>
<?php

include 'configuration.php';
include 'fonctions.php';

if(isset($_GET['dir'])) //si $_GET['dir'] existe
{
$dir = $_GET['dir'];
}
else
{
$dir = "";

}
$chemin = $data.'/'.$dir;
?>
	<div class="contenu">
		<div class="bleu-italic">
		<h1>
		Naviguer et télécharger
		</h1>
		</div><!--bleu-italic-->

		<div class="droit">
			<span id="google">
				<FORM method=GET action="http://www.google.fr/search">
				<INPUT TYPE=text name=q size=31 maxlength=255 value="">
				<INPUT TYPE=hidden name=hl value=fr>
				<INPUT type=submit name=btnG VALUE="Recherche Google">
				</FORM>
			</span><!--Google -->
		</div> <!--droit-->

		<div class="gauche">
		La navigation se fait que sur l'arbre de gauche.
		</div> <!--gauche-->

		<div class="main">
			<div class="tableau">
				<span class="plein">
					<table width="100%" border="0" cellspacing="0">
						<tr><td>
							<div class="centrer">
								- Naviguer<img src="images/Fleche-G_B.png" /><br/><br/><br/><br/>
							</div>
							<?php
								echo '<a href='.$_SERVER['PHP_SELF'].'><img src="images/dir-close.gif" border=0 />&nbsp;/</a><br/>';
								explorer_rep($data, $chemin, 1);
							?>
							</td>
				<td>
					- Télécharger <img src="images/Fleche-bas.png" /><br/><br/>
				<table width="100%" border="0" cellspacing="0">
					<tr>
						<th>Nom</th>
						<th>Taille</th>
						<th>Dernière modif</th>
						<th>Type</th>
						<th>Extention</th>
						<th>Dernier accès</th>
						<th>Permission</th>
					</tr>

					<?php
						explorer_fichier($chemin);
					?>

				</table>
				</td></tr>
			</table>
		</span><!--plein-->
		</div><!--tableau-->
		<div id="cacher">
			<?php include 'footer.php'; ?>
		</div>
		</div><!--main-->
	</div><!--contenu -->
	<!--bar -->


	<div class="taskbar">
			 <div class="icons">
					 <div class="icons-left">
						 <form method="post">
							 <!-- ********* Formulaire de Création de dossier********* -->
							<input type="text" class="nom_doc" name="nom" placeholder="Nom du dossier">
							<button  id="start-menu">Créer un dossier</button>

							<!-- *********Formulaire de Suppression dossier********* -->
 							<input type="text" class="nom_doc" name="doc" placeholder="doc à supprimer">
 							<input type="submit" id="start-menu" name="supprimer" value="Supprimer">

							<!-- *********Formulaire de Copie dossier********* -->
							<!-- <input type="text" name="copier" id="docopier" placeholder="Non du doc à copier">
        			<input type="text" name="copier1" id="docopier1" placeholder="Spécificier la destination">
        			<input type="submit" name="validcopie" value="Copier fichier"> -->
						 </form>

						 <!-- les fonctions de Création, de Suppression et de Copie -->
						 <?php
						 	if(isset($_POST['nom'])) //si le nom existe pas
						 	{
						 		$nom_doc = $_POST['nom'];
						 		$path = 'partage'.'/'.$nom_doc.'';
						 			mkdir($path, 0777, true);
						 	}
						 	else
						 	{
						 	echo "le dossier existe ";
						 	}
							// Supprimer
							if (isset($_POST['supprimer']))
    					{
								$doc = $_POST['doc'];
								$delete = 'partage'.'/'.$doc.'';
								if (isset($delete))
	  					{
	 						if (is_dir($delete))
							{
								rmdir($delete);
							}
							else
	  					{
								unlink($delete);
							}
							}
							header('location: index.php');//actualiser la page
    					}
							// Fin de la suppression

							//copie et coller
							// if (isset($_POST['Validcopie'])){
							// 	$docopie = $_POST['copier'];
							// 	$docopie1 = $_POST['copier1'];
							// 	$file = 'partage'.'/'.$docopie.'';
							// 	$newfile = 'partage'.'/'.$docopie1.'';
							// 	if (!copy($file, $newfile)) {
							// 		echo "La copie $file du fichier a échoué...\n";
							// 	}
							// }
							//copie et coller
						  ?>
					 </div>



			 </div>
	 </div>
</body>
</html>
