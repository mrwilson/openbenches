<?php
	require_once ('config.php');
	require_once ('mysql.php');
	// Requests come in like example.com/bench/1234
	//	Strip out any gets
	$params = explode("/", $_SERVER["HTTP_HOST"].explode('?', $_SERVER["REQUEST_URI"], 2)[0]);
	$GLOBALS["params"] = $params;

	//
	$benchID = $params[2];
	$image_url = "https://openbenches.org" . get_image_url($benchID);

	//	Available pages
	$pages = array("bench", "add", "image", "benchimage", "flickr", "edit",
	               "search", "sitemap.xml", "data.json", "login");

	if(in_array($params[1], $pages)) {
		include($params[1].".php");
		die();
	} else {
		include("front.php");
	}
