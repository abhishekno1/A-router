<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

class RouteEngine {

	private $uri;
	private $url;
	private $queryString;
	private $urlRewrite = array();
	private $queryMatch = array();

	public function __construct(){

		$this->uri = $_SERVER['REQUEST_URI'];

		$dec_url = urldecode($this->uri);

		$this->url = explode('?', $dec_url);				

		$this->queryString = $this->url[1];		

		$this->url = preg_replace('/\/router\//i', '', $this->url[0]);		

	}

	//$url_sliced = implode( '/', $_GET['url'] );

	//$noExe = array('.php','.html');

	/**
	* Adding Urls to targetted original urls
	*
	*
	*/

	public function add($tarUri,$target) {				

		$this->urlRewrite[$tarUri] = $target;

		$this->queryMatch[$tarUri] = $target;

	}

	//$find = in_array($url, $sofa);

	/**
	* Mapping function for urls
	*
	*
	*/

	public function map($tarUri, $funck) {
		$res = preg_match("#$tarUri#", $this->url, $match);

		if($res) {
			$funck($match[1]);
		}
		if($this->url == $tarUri) {
			$funck();
		}
		else if($this->queryString == $tarUri) {
			$funck();
		}
		else
			echo "404 NOT FOUND";						
	}

	/**
	* Submit funtion for running the app
	*
	*
	*/

	public function submit() {						
		//var_dump($this->url);
		//var_dump($this->urlRewrite);

		$this->find = array_key_exists($this->url, $this->urlRewrite);

		if($this->find){						
			$this->or_url = $this->urlRewrite[$this->url];
			if(!empty($this->or_url))
				require $this->or_url;
			else
				echo "404 NOT FOUND";
		}
		else{					
			$this->or_url = $this->queryMatch[$this->queryString];
			if(!empty($this->or_url))
				require $this->or_url;
			else
				echo "404 NOT FOUND";
		}
	}

}
?>