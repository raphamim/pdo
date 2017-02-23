
<?php 
define('DSN', 'mysql:host=localhost;dbname=music');
define('USER', 'root');
define('MDP', '');

try {
	$pdo = new PDO(DSN, USER, MDP);
} catch (Exception $e) {
	echo 'La bdd est indisponible';
}
// $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_SILENT);
// $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_WARNING);
// $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_EXCEPTION);

$query = 'SELECT s.title, a.first_name FROM song s 
JOIN song_artist sa ON s.id = sa.song_id
JOIN artist a ON sa.artist_id = a.id';

$second_query = 'SELECT u.`name` usernames, p.`name` playlists, s.`title` musics FROM user u 
JOIN playlist_user pu ON u.id = pu.user_id
JOIN playlist p ON pu.playlist_id = p.id
JOIN playlist_song ps ON p.id = ps.playlist_id
JOIN song s ON ps.song_id = s.id ';

$third_query = 'SELECT a.`name` album, CONCAT(art.first_name," ", art.last_name) artiste  FROM album a JOIN song_album sa ON a.id = sa.album_id
JOIN song s ON sa.song_id = s.id
JOIN song_artist sart ON sart.song_id = s.id
JOIN artist art ON sart.artist_id = art.id GROUP BY a.`name`';

$title = $pdo->query($query);
$user = $pdo->query($second_query);
$album = $pdo->query($third_query);

$datas = $title->fetchAll(PDO::FETCH_OBJ);
$second_datas = $user->fetchAll(PDO::FETCH_OBJ);
$third_datas = $album->fetchAll(PDO::FETCH_OBJ);
if ($pdo) {
	$pdo = NULL; 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

		<section id="title-name">
		<h2> Titres / Artistes</h2>	

				<?php 
				
					foreach ($datas as $line) {

						echo '<div><p>'.$line->title.'</p>';
						echo '<p>'.$line->first_name.'</p></div>';
					}
 				?>
		</section>

		<section id="album">
		<h2> Albums / Artistes</h2>	

				<?php 
				
					foreach ($third_datas as $line) {

						echo '<div><p>'.$line->album.'</p>';
						echo '<p>'.$line->artiste.'</p></div>';
					}
 				?>
		</section>

		<section id="user">
		<h2>Musiques / Playlist / Utilisateurs</h2>
			<?php 
				
					foreach ($second_datas as $lines) {

						echo '<div class="users"><p>'.$lines->usernames.'</p>';
						echo '<div class="playlists"> <h3>'.$lines->playlists.'</h3>';
						echo '<p class="music">'.$lines->musics.'</p></div></div>';
					}		
 			?>
		</section>

		
</body>
</html>








