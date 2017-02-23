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
			 	// echo json_encode($_POST['artist']);
	} 		
}
 
$ajax = new Ajax();
$ajax->sendDatas();