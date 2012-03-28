<?php
function gen_shortcode() {
	$shortcode = mysql_query("SELECT shortcode FROM url WHERE id=(SELECT MAX(id) FROM url)");
	$result = mysql_fetch_assoc($shortcode);
	return $result["shortcode"];
}

$db_host = getenv('DB_HOST');
$db_username = getenv('DB_USERNAME');
$db_password = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');
$db_handle = getenv('DB_HANDLE');
$db_handle=mysql_connect($db_host, $db_username, $db_password);
$db_found=mysql_select_db($db_name, $db_handle);

$command = $_POST["action"];



if($command == "send_url") {
	
	$url = $_POST["url"];
	$latestShort = gen_shortcode();
	++$latestShort;
	mysql_query("INSERT INTO url (url, shortcode) VALUES ('$url', '$latestShort')");
	echo $latestShort;
}
?>