<?php 
include "app/config.php";
include "app/detect.php";
session_start();

if ($page_name=='') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='index.html') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='contact-post.html') {
	include 'app/contact.php';
	}
elseif ($page_name=='login.html') {
	if($_SESSION['loggedin'] == 1)
		include $browser_t.'/main.html';
	else
		include $browser_t.'/login.html';
	}
elseif ($page_name=='main.html') {
	if($_SESSION['loggedin'] == 1)
		include $browser_t.'/main.html';
	else
		include $browser_t.'/login.html';
}
else
	{
		include $browser_t.'/404.html';
	}

?>
