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

		$id_to_modify = $_POST['id'];
		$title_to_modify = $_POST['title'];
		$minute_to_modify = $_POST['minute'];
		$seconde_to_modify = $_POST['seconde'];
		$artist_to_modify = $_POST['artist'];
		echo json_encode($id_to_modify);
		echo json_encode($title_to_modify);
		echo json_encode($minute_to_modify);
		echo json_encode($seconde_to_modify);
		echo json_encode($artist_to_modify);
	}
 		
}
 
$ajax = new Ajax();
$ajax->updateDatas();