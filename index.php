<?php 
session_start();
require_once 'include/controller.php';
require_once 'include/user.php';

$routes = [
'/' => function(){
	loginUser();
},

'createuser' => function(){
	createUser();
},

'checklogin' => function() {
	checkLoginUser();
},

'user/home' => function() {
	require_once 'home.php';	
},

'user/update_event' => function() {
	require_once 'update_event.php';
},

'user/profile' => function() {
	require_once 'profile.php';
},

'user/teman' => function() {
	require_once 'teman.php';
},
'user/pesan' => function() {
	require_once 'pesan.php';
},

'user/logout_user' => function() {
	logoutUser();
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