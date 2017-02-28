<?php 
//On appelle la def de la base
include 'pdo.php';

Class Ajax {


 	
	public function updateDatas() 
	{
		try {
					$pdo = new PDO(DSN, USER, MDP);
				} catch (Exception $e) {
					echo 'La bdd est indisponible <br/>'.$e;
				}

		$id_to_modify = htmlspecialchars($_POST['id']);
		$title_to_modify = htmlspecialchars($_POST['title']);
		$minute_to_modify = htmlspecialchars($_POST['minute']);
		$seconde_to_modify = htmlspecialchars($_POST['seconde']);
		$artist_to_modify = htmlspecialchars($_POST['artist']);

		if ( !empty($_POST['title']) ) {
			$title_upd = $pdo->prepare('UPDATE `song` SET `title` = :title WHERE `song`.`id` = :id');

			$title_upd->execute(array(
				'title' => $title_to_modify,
				'id' => $id_to_modify
			));
		}

		if ($minute_to_modify != 0 || $seconde_to_modify != 00) {
			$duration_upd = $pdo->prepare('UPDATE `song` SET `duration` = :duration WHERE `song`.`id` = :id');

			$duration_upd->execute(array(
				'duration' => '00:0'.$minute_to_modify.':'.$seconde_to_modify,
				'id' => $id_to_modify
			));
		}

		if ($artist_to_modify != "nochange") {
			$change_artist = 'SELECT `id` FROM `artist`WHERE `first_name` = "'.$artist_to_modify.'" LIMIT 1';

			$read_change_artist = $pdo->query($change_artist);

			$change_artists = $read_change_artist->fetchAll(PDO::FETCH_OBJ);

			foreach ($change_artists as $line) {
					$id_to_change = $line->id;
			}

			$duration_upd = $pdo->prepare('UPDATE `song_artist` SET `artist_id` = :artist WHERE `song_artist`.`song_id` = :song');

			$duration_upd->execute(array(
				'artist' => $id_to_change,
				'song' => $id_to_modify
			));
		}
	}
 		
}
 
$ajax = new Ajax();
$ajax->updateDatas();