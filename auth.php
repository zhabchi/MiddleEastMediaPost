<?php
session_start();

	if($_SESSION['loggedin'] == 1)
	{
		header("Location:main.html");
	}
	else if($_GET["username"] == "Mahaintell" && $_GET["password"] == "h1u2n3d4r5e6d7")
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