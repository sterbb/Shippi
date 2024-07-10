<?php

class Connect{
	public function connect(){
		$link = new PDO("mysql:host=localhost:3306;dbname=projectfinal", "root", "");
		$link -> exec("set names utf8");
		return $link;
	}
}

?>