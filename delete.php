<?php
count($parameters) >= 2 or exit_error('More parameters required!');

$dom = new DOMDocument;
@$dom->load('entries/' . $parameters[0] . '.xml') or exit_error('Blog path does not exist');
$item = $dom->documentElement->getElementsByTagName('post')->item(intval($parameters[1]));
$item->parentNode->removeChild($item);
$dom->save('entries/' . $parameters[0] . '.xml');
header('Location: /blog/'.$parameters[0]);