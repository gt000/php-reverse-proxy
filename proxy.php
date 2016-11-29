<?php
require_once("lib/Cache/Lite.php");

/* Function to show error and exit */
function error($msg) {
	header("HTTP/1.0 404 Not Found");
	echo $msg;
	exit;
}

/* Function to generate the key to store the timestamp of URL */
function timestamp_url_key($url) {
	return $url . "<TIMESTAMP>";
}


/* # 0. Configure the proxy */
/*
stream_context_set_default(
	array("http" => array(
			"proxy" => "tcp://your.proxy.com:8080",
			"request_fulluri" => TRUE,
			),
	)
);
*/


/* 1. Check the URL to retrieve */

$url = getenv("URL");
$url = "http://" . $url;


/* 2. Add http:// to URL */
if(strpos($url, "http://") === 0 || strpos($url, "https://") === 0) {
} else {
	$url = "http://" . $url;
}

/* 6. Retrieve the remote data */
$ret = file_get_contents($url, FALSE);
if( FALSE === $ret ) {
        error("Cannot get $url .");
}


echo $ret;

?>
