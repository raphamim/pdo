<?php 
//On appelle la def de la base
include 'pdo.php';

Class Ajax {
 

 	
	public function deleteDatas() 
	{
		self::deleteLinkDatas();
		$id_to_delete = $_POST['id'];
			try {
					$pdo = new PDO(DSN, USER, MDP);
				} catch (Exception $e) {
					echo 'La bdd est indisponible <br/>'.$e;
				}
					$music_delete= $pdo->prepare('DELETE FROM `song` WHERE `song`.`id` = :id' );

					$music_delete->execute(array(
						'id' => $id_to_delete
					));

					// $song_delete= $pdo->prepare('DELETE FROM `song_artist` WHERE `song_artist`.`song_id` = :song_id' );

					// $song_delete->execute(array(
					// 	'song_id' => $id_to_delete
					// ));

	} 	

	public function deleteLinkDatas(){
		$id_to_delete = $_POST['id'];
			try {
					$pdo = new PDO(DSN, USER, MDP);
				} catch (Exception $e) {
					echo 'La bdd est indisponible <br/>'.$e;
				}

		 $song_delete= $pdo->prepare('DELETE FROM `song_artist` WHERE `song_artist`.`song_id` = :song_id' );

			 $song_delete->execute(array(
			 	'song_id' => $id_to_delete
			 ));
	}	
}
 
$ajax = new Ajax();
$ajax->deleteDatas();




