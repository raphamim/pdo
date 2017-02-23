<?php 
//On appelle la def de la base
include 'pdo.php';

Class Ajax {
 

 	
	public function sendDatas() 
	{
				try {
					$pdo = new PDO(DSN, USER, MDP);
				} catch (Exception $e) {
					echo 'La bdd est indisponible <br/>'.$e;
				}
			 	 // echo json_encode($_POST['title']);
			 	 // echo json_encode($_POST['duration']);
			 	 // echo json_encode($_POST['seconde']);
			 	 // echo json_encode($_POST['artist']);
				$title = $_POST['title'];
				$duration = '00:0'.$_POST['minute'].':'.$_POST['seconde'];
				$artist = $_POST['artist'];
				//ENVOI DE LA MUSIQUE
				if ( !empty($_POST['title']) ) {
					

					$music_send= $pdo->prepare('INSERT INTO `song` ( `title`, `duration`) VALUES ( :title, :duration)' );

					$music_send->execute(array(
						'title' => $title,
						'duration' =>  $duration,
					));
					// récupération de l'id
					$music_id = 'SELECT * FROM song WHERE title = "'.$title.'"';

					$read_music_id = $pdo->query($music_id);

					$get_music_id = $read_music_id->fetchAll(PDO::FETCH_OBJ);
					foreach ($get_music_id as $gmi) {
						$id_song = $gmi->id;
					}
				}
				//ENVOI DE L'ARTISTE
				if ( !empty($_POST['artist']) ) {
					

					$artist_send= $pdo->prepare('INSERT INTO `artist` ( `first_name`, `age`) VALUES ( :first_name, :age)' );

					$artist_send->execute(array(
						'first_name' => $artist,
						'age' =>  00,
					));
					// récupération de l'id
					$artist_id = 'SELECT * FROM artist WHERE first_name = "'.$artist.'"';

					$read_artist_id = $pdo->query($artist_id);

					$get_artist_id = $read_artist_id->fetchAll(PDO::FETCH_OBJ);
					foreach ($get_artist_id as $gai) {
						$id_artist = $gai->id;
					}
				}
				//LIENS ENTRE MUSIQUES ET ARTISTES
				if ( !empty($_POST['artist']) && !empty($_POST['title'])) {

					$songHasArtist_send= $pdo->prepare('INSERT INTO `song_artist` ( `song_id`, `artist_id`) VALUES ( :song_id, :artist_id)' );

					$songHasArtist_send->execute(array(
						'song_id' => $id_song,
						'artist_id' =>  $id_artist,
					));

				}

	} 		
}
 
$ajax = new Ajax();
$ajax->sendDatas();