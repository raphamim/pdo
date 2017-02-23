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

				if ( !empty($_POST['title']) ) {
					

					$music_send= $pdo->prepare('INSERT INTO `song` ( `title`, `duration`) VALUES ( :title, :duration)' );

					$music_send->execute(array(
						'title' => $title,
						'duration' =>  $duration,
					));
				}
				if ( !empty($_POST['artist']) ) {
					

					$artist_send= $pdo->prepare('INSERT INTO `artist` ( `first_name`, `age`) VALUES ( :first_name, :age)' );

					$artist_send->execute(array(
						'first_name' => $artist,
						'age' =>  00,
					));
				}
	} 		
}
 
$ajax = new Ajax();
$ajax->sendDatas();