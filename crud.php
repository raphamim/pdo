



<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 
 	<section id="add">
 		<h1> Listes des musiques: </h1>
 		<a href="#" id="plus"><img src="img/plus.png"></a>
 		<div id="form-add"> 
 			<!-- <form action="php/action.php" method="post"> -->
 				<input type="text" placeholder="title" id="title" name="title"></input>
 				<input type="text" placeholder="duration(Format MM:ss)" id="duration" name="duration"></input>
 				<input type="text" placeholder="artist" id="artist" name="artist"></input>
 				<!-- <input type="submit" value="Envoyez vos données"></input> -->
 				<img src="img/mini-plus.png" id="send-datas">
 			<!-- </form> -->
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