<?php

require "Bootstrap.php";

$route = new RouteEngine();

//$route -> add('test1','test1.php');
//$route -> add('test3','test3.php');
//$route -> add('name=abhishek','test3.php');
$route -> map('tester/(\d+)', function($id){
	echo "this will going to print".$id;
});

/*$route -> map('spider', function(){
	echo "this is a seperate function I created to check the functionality of router";
});*/
//$route -> submit();
?>