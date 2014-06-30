<?php
count($parameters) >= 2 or exit_error('More parameters required!');

$dom = new DOMDocument;
@$dom->load('entries/' . $parameters[0] . '.xml') or exit_error('Blog path does not exist');
$item = $dom->documentElement->getElementsByTagName('post')->item(intval($parameters[1]));
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$postClass = new stdClass;
	foreach($item->childNodes as $child) {
		$postClass->{$child->nodeName} = $child->nodeValue;
	}
	render_view('edit',array('post' => $postClass));
} else {
	
	$item->getElementsByTagName('title')->item(0)->nodeValue = $_POST['title'];
	$item->getElementsByTagName('author')->item(0)->nodeValue = $_POST['author'];
	$item->getElementsByTagName('body')->item(0)->nodeValue = $_POST['body'];
	$dom->save('entries/' . $parameters[0] . '.xml');
	header('Location: /blog/'.$parameters[0]);
}