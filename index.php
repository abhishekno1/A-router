<?php

$uri = $_SERVER['REQUEST_URI'];

$url = explode('?', $uri);

$url = preg_replace('/\/router\//i', '', $url[0]);

function get(){

	$queString = preg_replace('/(.*)[\?]/i', ' ', $GLOBALS['uri']);

	$queS1 = explode('&', $queString);

for($i = 0;$i < count($queS1); $i++){
	$off = preg_replace('/\w+(?=\=)/i', ' ', $queS1[$i]);
	$off2 = preg_replace('/=/i', ' ', $off);
	$val = preg_replace('/(?<=\=)\w+/i', ' ', $queS1[$i]);
	$val2 = preg_replace('/=/i', ' ', $val);
	$queS2[$val2] = $off2;	
}
	return $queS2;
}

//$url_sliced = implode( '/', $_GET['url'] );

$sofa = array('test1/tester' => 'test1.php','test2' => 'test2.php','test3' => 'test3.php');

//$find = in_array($url, $sofa);

$find = array_key_exists($url, $sofa);

if(isset($find)){
	$or_url = $sofa[$url];

	require $or_url;

}	
?>