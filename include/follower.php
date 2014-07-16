<?php 
function showIDFollower($username) {
	$sql = 'SELECT id_user FROM user WHERE username = :username';
	$follow = connect()->prepare($sql);
	$data = array('username' => $username);

	try{
		$follow->execute($data);

		foreach($follow as $row) {
			$results = $row['id_user'];
		}
	}catch(PDOException $e){
	 die($e->getMessage());
	}

	return $results;
}

function followUser() {
	$sql = 	'INSERT INTO followers (id_user, id_user_followers) 
			VALUES(:id_user, :id_user_followers)';
	$follow = connect()->prepare($sql);
	$data = array(
		'id_user_followers' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null,
		'id_user' => showIDFollower($_POST['username'])
		);

	try{
		$follow->execute($data);
		header('location: .');
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}
} 
?>