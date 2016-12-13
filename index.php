<?php

$uri = $_SERVER['REQUEST_URI'];

$url = explode('?', $uri);

$url = preg_replace('/\/router\//i', '', $url[0]);

require "Bootstrap.php";
?>