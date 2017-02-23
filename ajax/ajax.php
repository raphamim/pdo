<?php 
//On appelle la def de la base
include 'pdo.php';

 Class Ajax {
 

 	// on recup les données de la bdd
	public function getDatas() 
	{
			 	try {
					$pdo = new PDO(DSN, USER, MDP);

				} catch (Exception $e) {
					echo 'La bdd est indisponible <br/>'.$e;
				}


			$data = 'SELECT s.`id`, s.`title`, s.duration, a.first_name, a.last_name FROM song s
					LEFT JOIN song_artist sa ON s.id = sa.song_id
					LEFT JOIN artist a ON sa.artist_id = a.id';

			$read_data = $pdo->query($data);

			$datas = json_encode($read_data->fetchAll(PDO::FETCH_OBJ));
			echo $datas;
	} 		
 }
 
$ajax = new Ajax();
$ajax->getDatas();

