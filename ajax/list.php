<?php 
//On appelle la def de la base
include 'pdo.php';

 Class Ajax {
 

 	// on recup les données de la bdd
	public function getDatasList() 
	{
			 	try {
					$pdo = new PDO(DSN, USER, MDP);

				} catch (Exception $e) {
					echo 'La bdd est indisponible <br/>'.$e;
				}


			$list_artist = 'SELECT * FROM artist';

			$read_list_artist = $pdo->query($list_artist);

			$list_artists = json_encode($read_list_artist->fetchAll(PDO::FETCH_OBJ));
			echo $list_artists;
	} 		
 }
 
$ajax = new Ajax();
$ajax->getDatasList();