<?php 
require_once 'pdo.php';

if (isset($_GET['user']) && isset($_GET['create'])){
	createUser(); 
} elseif(isset($_GET['user']) && isset($_GET['daftar'])) {
	newUser();
} elseif (isset($_GET['user']) && isset($_GET['update'])) {
	updateUser($_POST['id']); 
} elseif(isset($_GET['user']) && isset($_GET['profile'])) {
	profile();
} elseif (isset($_GET['user']) && isset($_GET['login'])) {
	LoginUser(); 
} elseif(isset($_GET['user']) && isset($_GET['cek_login'])) {
	checkLoginUser();
}


function newUser() {
	require_once 'daftar.php';
}

function loginUser() {

	require_once 'login.php';
}


function checkLoginUser(){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordmd5 = md5($password);
	// 
	$sql = 'SELECT* FROM user WHERE email = :email AND password = :password';
	$user = connect()->prepare($sql); 
	$user->execute(array(
		':email'=>$email,
		':password'=>$passwordmd5
		));
	$result = $user->fetch(PDO::FETCH_ASSOC);

	try{
		$user->execute($result);
		echo "login berhasil";
	} catch(PDOException $e) {
		echo"login gagal".die($e->getMessage());
	}
}
	// 

function createUser() {
	$sql = 'INSERT INTO user(nama_depan, nama_belakang, email, password, tgl_lahir)
			VALUES(:namadepan, :namabelakang, :email, :password, :lahir)';

	$user = connect()->prepare($sql);

	$data = array(
		'namadepan' => $_POST['namadepan'],
		'namabelakang' => $_POST['namabelakang'],
		'email'	=> $_POST['email'],
		'password' => md5($_POST['password']),
		'lahir'	=> $_POST['lahir']
		);

	try{
		$user->execute($data);
	} catch(PDOException $e) {
	 	 die($e->getMessage());
	}

	header('location: ?user&daftar');
}


function updateUser($id)
{

	$sql = "UPDATE user SET(nama_depan, nama_belakang, email, password, tgl_lahir)
			VALUES(:namadepan, :namabelakang, :email, :password, :lahir)
			WHERE id_user = :id";

	$user = connect()->prepare($sql);

	$data = array(
		'namadepan'		=> $_POST['namadepan'],
		'namabelakang' 	=> $_POST['namabelakang'],
		'email'			=> $_POST['email'],
		'password' 		=> $_POST['password'],
		'lahir'			=> $_POST['lahir'],
		'id' 			=> $id
		);

	try{
		$user->execute($data);
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}
}

function profile()
{
	require_once 'profile.php';
}

?>
