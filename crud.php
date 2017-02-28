



<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


		<!-- FORM POUR MODIFIER -->
		<div id="form-upd"> 

				<a id="hide-upd" href="#"><img src="img/quit.png" id="quit-upd"></a>
				<p>Update</p>
 				<input type="text" placeholder="title" id="title-upd" name="title-upd"></input>
 				<select id="minute-upd">
 					<?php for ($i=0; $i < 10 ; $i++) { 
 						echo '<option value="'.$i.'">'.$i.' mn</option>';
 					} ?>
 				</select>
 				<select id="seconde-upd">
 					<?php for ($i=0; $i < 10; $i++) { 
 						echo '<option value="0'.$i.'">0'.$i.' sec</option>';
 					} ?>
 					<?php for ($i=10; $i <= 60 ; $i++) { 
 						echo '<option value="'.$i.'">'.$i.' sec</option>';
 					} ?>
 				</select>
 				<select id="artist-upd">
 					<option value="nochange">Selectionner l'artiste</option>
 					
 				</select>
 				<a id="send-upd" href="#"><img src="img/refresh-button.png"></a>
 		</div>

 		<!-- PARTIE POUR AJOUTER DES MUSIQUES -->
 	<section id="add">
 		<h1> Listes des musiques: </h1>
 		<a href="#" id="plus"><img src="img/plus.png"></a>
 		<div id="form-add"> 
 				<input type="text" placeholder="title" id="title" name="title"></input>
 				<select id="minute">
 					<?php for ($i=1; $i < 10 ; $i++) { 
 						echo '<option value="'.$i.'">'.$i.' mn</option>';
 					} ?>
 				</select>
 				<select id="seconde">
 					<?php for ($i=1; $i < 10; $i++) { 
 						echo '<option value="0'.$i.'">0'.$i.' sec</option>';
 					} ?>
 					<?php for ($i=10; $i <= 60 ; $i++) { 
 						echo '<option value="'.$i.'">'.$i.' sec</option>';
 					} ?>
 				</select>
 				<input type="text" placeholder="artist" id="artist" name="artist"></input>
 				<img src="img/mini-plus.png" id="send-datas">
 		</div>
	</section>

<section id="tab">
	<table>
		   <tr>
		   	   <th><p>  identifiant de la musique  </p></th>
		       <th><p>  Titre de la musique </p></th>
		       <th><p>  Durée (en mn)  </p></th>
		       <th><p>  Compositeur de la musique  </p></th>
		       <th><p>  Modif  </p></th>
		       <th><p>  Supp  </p></th>
		   </tr>
	</table>
</section>



</body>
</html>