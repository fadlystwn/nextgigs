<?php 
require_once 'pdo.php';

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

	header('location: ../');
}

function newUser() {
	require_once 'daftar.php';
}

function loginUser() {

	require_once 'login.php';
}

function checkLoginUser(){
	$sql = 'SELECT id_user, nama_depan, email FROM user WHERE email = :email AND password = :password';
	
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
			}
			header('location: user/:id');
		} else {
			echo "login gagal!";
		}
	} catch(PDOException $e) {
		die($e->getMessage());
	}
}

function updateUser($id) {

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

function logoutUser() {
	unset($_SESSION['id_user']);
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	header('location: ../');
}
?>
