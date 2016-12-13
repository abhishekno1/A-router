<?php

function get($var){
	if($_GET[$var]){
		$tvar = $_GET[$var];
		$nvar = filter_var($tvar);
		return $nvar;
	}
	else{
		echo 'variable did\'nt exist';
	}
}

function post($var){
	if($_POST[$var]){
		$tvar = $_POST[$var];
		$nvar = filter_var($tvar);
		return $nvar;
	}
	else{
		echo 'variable did\'nt exist';
	}
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