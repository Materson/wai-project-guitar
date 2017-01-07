<?php
	function prev_site()
	{
		$path = $_SERVER["HTTP_REFERER"];
    	$filename = substr(strrchr($path, "/"), 1);
    	return $filename;
	}