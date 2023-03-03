<?php

ini_set("max_execution_time", "-1");
ini_set("memory_limit", "-1");


if(isset($_FILES['file']))
{
	$urlDirection = $_POST["post"];
	$tempname = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];

	$folder = $urlDirection . $filename;

	move_uploaded_file($tempname, $folder);
}

?>