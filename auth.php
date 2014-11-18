<?php
session_start();

	if($_SESSION['loggedin'] == 1)
	{
		header("Location:main.html");
	}
	else if($_GET["username"] == "maha" && $_GET["password"] == "hamdan")
	{	
		$_SESSION['loggedin'] = 1;
    	$_SESSION['username'] = $_GET["username"];
		header("Location:main.html");
	}
	else
	{
		header("Location:login.html");
	}
?>