<?php
date_default_timezone_set("GMT");
$uri = substr($_SERVER['REQUEST_URI'],1);
$segments = explode('/', $uri);
$parameters = array_slice($segments,1);
function render_view($view_name,$params = array()){
	global $uri, $segments, $parameters;
	foreach($params as $key => $param){
		$$key = $param;
	}
	include __DIR__ . '/../views/head.view.php';
	require __DIR__ . '/../views/' . $view_name . '.view.php';
	include __DIR__ . '/../views/foot.view.php';
}
function exit_error($error) {
	include __DIR__ . '/../views/head.view.php';
	echo $error;
	include __DIR__ . '/../views/foot.view.php';
	die();
}
$uri = substr($_SERVER['REQUEST_URI'],1);
$segments = explode('/', $uri);
if(count($segments) == 0 || empty($segments[0])) {
	header('Location: /blog/post/');
	die();
}
$parameters = array_slice($segments,1);
if(file_exists(__DIR__ . '/../' . $segments[0] . '.php'))
	include( __DIR__ . '/../' . $segments[0] . '.php');
else exit_error('Controller not found!');
