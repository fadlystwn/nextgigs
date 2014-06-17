<?php 
function connect()
{
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=nextgigs', 'root', 'fdlstwn92');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		die($e->getMessage());
	}

	return $pdo;
}
?>