<?php
	session_start();
	if(isset($_COOKIE["user"]) and isset($_COOKIE["id"]) and !isset($_SESSION["user"]) and !isset($_SESSION["id"])) {
		$_SESSION["user"]=$_COOKIE["user"];
		$_SESSION["id"]=$_COOKIE["id"];
	}	
?>