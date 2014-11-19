<?php
session_start();

	if($_SESSION['loggedin'] == 1)
	{
		$lines = file("web/reports.txt", FILE_IGNORE_NEW_LINES);
		$remove = $_GET["description"].";".$_GET["path"];
		
		foreach($lines as $key => $line)
		{
			if(stristr($line, $remove))
			{
				$filepath = "web/pdfs/".$_GET["path"];
				if(is_readable($filepath))
				{
					unlink($filepath);
				}
				unset($lines[$key]);
			}
		}
		$data = implode("\n", array_values($lines));
				
		$file = fopen("web/reports.txt" , "w");
		$echo = fwrite($file, $data);
		fclose($file);
	}
	else 
		echo 0;
?>