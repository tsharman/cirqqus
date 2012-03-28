<?php
include('server/config.php');
if($_GET["shortcode"] != "") {
	$shortcode = $_GET["shortcode"];
	$db_handle=mysql_connect($db_host, $db_username, $db_password);
	$db_found=mysql_select_db($db_name, $db_handle);
	$url = mysql_query("SELECT url FROM url WHERE shortcode='$shortcode'");
	$result = mysql_fetch_assoc($url);
	header('Location: '.$result["url"]);
}
?>
<html>
<head>
	<title>cirqq.us | url shortening that'll make your friends jelly</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="jscript/main.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href="css/master.css" />
	
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div class="box_module" id="subheading">
			Just type your URL below and click 'shorten!'.
		</div>
		<div class="box_module" id="url_container">
			<input type="text" id="url" />
		</div>
		<div class="box_module" id="url_result">
		</div>
		<div class="box_module error" id="not_url">
			That doesnt look like a url. Try again!
		</div>
		<div id="submit_button" class="button">shorten!</div>
	</div>
</body>
</html>
