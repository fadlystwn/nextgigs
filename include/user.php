<?php 
require_once 'pdo.php';

function showUser($username) {
	$sql = 'SELECT nama_depan, nama_belakang, alamat, url_facebook, url_twitter, about, gambar_profile FROM user 
	WHERE username = :username';
	
	$user = connect()->prepare($sql);
	$data = array('username' => $username );

	try{
		$user->execute($data);
		$results = $user->fetchAll(PDO::FETCH_ASSOC);
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}

	return $results;	
}	

function createUser() {
	$sql = 'INSERT INTO user(nama_depan, nama_belakang, email, username, password, tgl_lahir)
			VALUES(:nama_depan, :nama_belakang, :email, :username, :password, :lahir)';

	$user = connect()->prepare($sql);

	$data = array(
		'nama_depan' => $_POST['nama_depan'],
		'nama_belakang' => $_POST['nama_belakang'],
		'email'	=> $_POST['email'],
		'username' => $_POST['username'],
		'password' => md5($_POST['password']),
		'lahir'	=> $_POST['lahir']
		);
	
	try{
		$user->execute($data);
	} catch(PDOException $e) {
	 	 die($e->getMessage());
	}

	header('location: .');
}

function checkEmailUser(){
	$sql = 'SELECT id_user, email, username FROM user WHERE email = :email AND username = :username';
	$user = connect()->prepare($sql);
	$data = array(
				'email' => $_POST['email'],
				'username' => $_POST['username']
				);
	try{
		$user->execute($data);
		$results = $user->fetchAll();
		if($user->rowCount() == 1) {
			foreach($results as $row){
				$_SESSION['id_user'] = $row['id_user'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['username'] = $row['username'];
			} 
			echo "email dan username sudah ada";
		}
			else{
				createUser();
			}
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

function newUser() {
	require_once 'daftar.php';
}

function loginUser() {

	require_once 'login.php';
}

function checkLoginUser(){
	$sql = 'SELECT id_user, nama_depan, email, username  FROM user WHERE email = :email AND password = :password 
	OR username = :email AND password = :password';
	
	$user = connect()->prepare($sql); 
	$data = array(
		'email' => $_POST['email'],
		'password' => md5($_POST['password'])
		);

	try{
		$user->execute($data);
		$results = $user->fetchAll();

		if($user->rowCount() == 1) {
			foreach($results as $row){
				$_SESSION['id_user'] = $row['id_user'];
				$_SESSION['nama_depan'] = $row['nama_depan'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['username'] = $row['username'];
			}
			header('location: home');
		} else {
		echo "username dan password salah!";
		}
	} catch(PDOException $e) {
		die($e->getMessage());
	}
}

function uploadPhotoUser(){
$imageName = $_FILES['image']['name'];
	$imageTmp = $_FILES['image']['tmp_name'];
	$UniqueID = md5(uniqid(rand(), true));
	$fileType = strchr($imageName, '.');
	$newUpload = 'images/profile/'. $UniqueID . $fileType;

	move_uploaded_file($imageTmp, $newUpload);
	@chmod($newUpload, 0777);

	$sql = "UPDATE user SET gambar_profile = :gambar_profile WHERE id_user = :id";
	$user = connect()->prepare($sql);
	$data = array(
		'gambar_profile' => $newUpload,
		'id' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null
		);
	try{
		$user->execute($data);
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}

	header("location: u/$_SESSION[username]");
}


function updateUser() {
	

	$sql = "UPDATE user SET nama_depan = :nama_depan, nama_belakang = :nama_belakang,
	alamat = :alamat, url_facebook = :url_facebook, url_twitter = :url_twitter, 
	about = :about WHERE id_user = :id";

	$user = connect()->prepare($sql);

	$data = array(
		'nama_depan' => $_POST['nama_depan'],
		'nama_belakang' => $_POST['nama_belakang'],
		'alamat' => $_POST['alamat'],
		'url_facebook' => $_POST['url_facebook'],
		'url_twitter' => $_POST['url_twitter'],
		'about' => $_POST['about'],
		'id' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null
		);

	try{
		$user->execute($data);
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}

	header("location: u/$_SESSION[username]");
}

function showAbout() {
	$sql = 'SELECT about FROM user WHERE id_user = :id';

	$user = connect()->prepare($sql);
	$data = array('id' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null);
	try{
		$user->execute($data);

		foreach($user as $row) {
			$results = $row['about'];
		}
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}

	return $results;
}


function showProfilepic() {
	$sql = 'SELECT gambar_profile FROM user WHERE id_user = :id';

	$user = connect()->prepare($sql);
	$data = array('id' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null);
	try{
		$user->execute($data);

		foreach($user as $row) {
			$results = $row['gambar_profile'];
		}
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}

	return $results;
}


function logoutUser() {
	unset($_SESSION['id_user']);
	unset($_SESSION['nama_depan']);
	unset($_SESSION['email']);
	unset($_SESSION['username']);
	header('location: .');
}
?>