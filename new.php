<?php
count($parameters) >= 1 or exit_error('More parameters required!');
if($_SERVER['REQUEST_METHOD'] == 'GET')
	render_view('new');
else {
	$dom = new DOMDocument;
	@$dom->load('entries/' . $parameters[0] . '.xml');
	if (!$dom->hasChildNodes()){
		$dom->appendChild($dom->createElement('posts'));
	}
	$title = $dom->createElement('title',htmlspecialchars($_POST['title']));
	$author = $dom->createElement('author',htmlspecialchars($_POST['author']));
	$body = $dom->createElement('body',htmlspecialchars($_POST['body']));
	$post = $dom->createElement('post');
	$date = $dom->createElement('date',date("F j, Y, g:i a"));
	$post->appendChild($title);
	$post->appendChild($author);
	$post->appendChild($body);
	$post->appendChild($date);
	$dom->documentElement->appendChild($post);
	$dom->save('entries/' . $parameters[0] . '.xml');
	header('Location: /blog/'.$parameters[0]);
}