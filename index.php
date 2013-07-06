<?php

$PASTE_URL = 'http://somewhere.com';
$PASTE_SOURCE = 'https://github.com/ray-schulz/phpastebucket';
$PASTE_TEMPLATES = 'templates';

$PASTE_DB_NAME = 'dbname';
$PASTE_DB_HOST = 'dbhost';
$PASTE_DB_USER = 'dbuser';
$PASTE_DB_PASSWORD = 'dbpassword';

/* toBase and to10 from http://stackoverflow.com/a/4964352 */
function toBase($num, $b=62) {
  $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $r = $num  % $b ;
  $res = $base[$r];
  $q = floor($num/$b);
  while ($q) {
    $r = $q % $b;
    $q =floor($q/$b);
    $res = $base[$r].$res;
  }
  return $res;
}
function to10( $num, $b=62) {
  $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $limit = strlen($num);
  $res=strpos($base,$num[0]);
  for($i=1;$i<$limit;$i++) {
    $res = $b * $res + strpos($base,$num[$i]);
  }
  return $res;
}

$db = pg_connect("host=$PASTE_DB_HOST dbname=$PASTE_DB_NAME user=$PASTE_DB_USER password=$PASTE_DB_PASSWORD")
	or die('Could not connect to database: ' . pg_last_error());


if ($_SERVER['REQUEST_METHOD'] == 'POST' and ($_POST['paste'] or $_POST['text'])) {
	$text = $_POST['paste'] or $text = $_POST['text'];
	$text = pg_escape_string($text);
	$result = pg_query($db, "INSERT INTO pastes (date, text) VALUES ('now', '{$text}') RETURNING id");
	$row = pg_fetch_row($result);
	$row = toBase($row[0]);
	
	if ($_POST['paste'])
		echo "    $PASTE_URL/$row\n";
	elseif ($_POST['text'])
		header("Location: $PASTE_URL/$row");
} else {
	if ($_ENV['REQUEST_URI'] == '/') {
		include "$PASTE_TEMPLATES/index.php";
	} else {
		$uri = explode('/', $_ENV['REQUEST_URI']);
		$PASTE_ID = $uri[1];
		
		$PASTE_ID10 = to10($PASTE_ID);
		$result = pg_query($db, "SELECT * FROM pastes WHERE id = '{$PASTE_ID10}'")
			or die('ID not found: ' . $PASTE_ID10);
		$row = pg_fetch_array($result)
			or die('Row not found: ' . $PASTE_ID10);
		
		$PASTE_DATE = $row['date'];
		$PASTE_TEXT = $row['text'];
		
		if ($uri[2] == "edit")
			include "$PASTE_TEMPLATES/edit.php";
		elseif ($uri[2] == "raw")
			include "$PASTE_TEMPLATES/raw.php";
		else
			include "$PASTE_TEMPLATES/paste.php";
	}
}

?>
