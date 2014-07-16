<?php
require_once 'pdo.php';

function createEvent(){
	$imageName = $_FILES['image']['name'];
	$imageTmp = $_FILES['image']['tmp_name'];
	$UniqueID = md5(uniqid(rand(), true));
	$fileType = strchr($imageName, '.');
	$newUpload = 'image_public/'. $UniqueID . $fileType;

	move_uploaded_file($imageTmp, $newUpload);
	@chmod($newUpload, 0777);
	$sql = 'INSERT INTO event(id_user, nama_event, tanggal_event, lokasi, gambar, keterangan, ip)
			VALUES(:id_user, :nama_event, :tanggal_event, :lokasi, :gambar, :keterangan, :ip)';
	$event = connect()->prepare($sql);
	$data = array(
			'id_user' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null,
			'nama_event' => $_POST['nama_event'],
			'tanggal_event' => $_POST['tanggal_event'],
			'lokasi' => $_POST['lokasi'],
			'keterangan' => $_POST['keterangan'],
			'gambar' => $newUpload,
			'ip' => $_SERVER['REMOTE_ADDR']
		);

	try{
		$event->execute($data);
		header('location: home');
	} catch(PDOException $e) {
	 	die($e->getMessage());
	}
}

function timeline(){
	$sql = 'SELECT id_event, nama_event, gambar, keterangan FROM event p 
	LEFT JOIN followers c ON c.id_user = p.id_user 
	WHERE p.id_user = :id_user OR p.id_user = c.id_user_followers';

	$event = connect()->prepare($sql);
	$data = array('id_user' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null);

	try{
		$event->execute($data);
		$results = $event->fetchAll(PDO::FETCH_ASSOC);
	} catch(PDOException $e) {
		die($e->getMessage());
	}

	return $results;
}

function myEvent(){
	$sql = 'SELECT id_event, gambar, nama_event FROM event WHERE id_user = :id_user';

	$event = connect()->prepare($sql);
	$data = array('id_user' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null);

	try{
			$event->execute($data);
			$results = $event->fetchAll(PDO::FETCH_ASSOC);
	} catch(PDOException $e) {
		die($e->getMessage());
	}
	return $results;
}

function eventDetails($id_event) {
	$sql = 'SELECT * FROM event WHERE id_event = :id_event';
	$event = connect()->prepare($sql);
	$data = array('id_event' => $id_event);

	try{
		$event->execute($data);
		$results = $event->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e) {
		die($e->getMessage());
	}
	return $results;
}

function deleteEvent($id) {
	$sql = 'DELETE FROM event WHERE id_event = :id_event AND id_user = :id_user';
	$event = connect()->prepare($sql);
	$data =  array(
			'id_event' => $id, 
			'id_user' => isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null
		);

	try{
		$event->execute($data);
	}catch(PDOException $e){
		die($e->getMessage());
	}
	header('location .');
}