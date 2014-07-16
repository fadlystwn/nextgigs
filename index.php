<?php 
session_start();
require_once 'include/controller.php';
require_once 'include/event.php';
require_once 'include/user.php';
require_once 'include/follower.php';

$id = null;
$data = explode('/', $_SERVER['REQUEST_URI']);
$id = end($data);

$routes = [
'/' => function(){
	loginUser();
},

'register' =>	function(){
	require_once 'daftar.php';
},

'create-user' => function(){
	createUser();
},

'check-login' => function() {
	checkLoginUser();
},

'home' => function() {
	require_once 'home.php';	
},

'new-event' => function() {
	require_once 'new_event.php';
},

'create-event' => function() {
	createEvent();
},

"u/$id" => function() {
	require_once 'profile.php';
},

'friends' => function() {
	require_once 'friends.php';
},

'pesan' => function() {
	require_once 'pesan.php';
},

'update' => function() {
	updateUser();
},

'logout' => function() {
	logoutUser();
},

'follow' => function() {
	followUser();
	header('location: .');
},

"event-details/$id" => function() {
	require_once 'event_details.php';
},

"delete-event/$id" => function() {
	$data = explode('/', $_SERVER['REQUEST_URI']);
	$id = end($data);
	deleteEvent($id);
	header('javascript:history.go(-1)');
},

'check-email-user' => function() {
	checkEmailUser();
},

'upload-photouser' => function() {
	uploadPhotoUser();
}

];

$path = request_path();
if(isset($routes[$path]) AND is_callable($routes[$path]))
{
	$routes[$path]();
}
else{
	//
}
ob_start();
?>