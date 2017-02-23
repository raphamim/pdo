<?php  
$bdd = new PDO('mysql:host=localhost;dbname=etudiant', 'root', '');
$sql = 'SELECT * FROM `liste`';

$query = $bdd->prepare($sql);

$query->execute();

$etudiants = $query->fetchAll();
print_r($etudiants);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>


	<tr>
		<th>prenom</th>
		<th>nom</th>
		<th>age</th>	
	</tr>
	<?php foreach ($etudiants as $e) { ?>
		<tr>
			<td><?= $e['prenom']?></td>
			<td><?= $e['nom']?></td>
			<td><?= $e['age']?></td>
		</tr>
	<?php } ?>


</table>
</body>
</html>