<?php
count($parameters) >= 1 or exit_error('More parameters required!');
$dom = new DOMDocument;
@$dom->load('entries/' . $parameters[0] . '.xml') or exit_error('Invalid blog post!');
$posts = array();
$xml_posts = $dom->documentElement->getElementsByTagName('post');
if(isset($parameters[1]) && is_numeric($parameters[1])){
	$postClass = new stdClass;
	foreach($xml_posts->item(intval($parameters[1]))->childNodes as $child) {
		$postClass->{$child->nodeName} = $child->nodeValue;
	}
	$posts[] = $postClass;
} else {
	foreach ($xml_posts as $post)
	{
		$postClass = new stdClass;
		foreach($post->childNodes as $child) {
			$postClass->{$child->nodeName} = $child->nodeValue;
		}
		$posts[] = $postClass;
	}
}
render_view('blog',array('posts' => $posts));