
<?php
// the update expects a rower ID with the post command
// check ID is digits, and is a valid ID
// redirect if not the case
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
	$myId = $_GET['id'];
} else {
	header('Location: error_bad_id.php');
}

$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
$sql = "SELECT * FROM rakers WHERE id=" . "\"" . $_GET['id'] . "\"";
echo $sql;
$result = mysqli_query($db, $sql);
if (!$result) {
	echo "<br>error 336544 - mysqli_query returned 0";
	exit();
}
$rower = mysqli_fetch_assoc($result);
if (!$rower) {
		echo "<br>error 440954 - mysqli_fetch_assoc returned 0";
	exit();
}
mysqli_close($db);

?>

<?php

// create randomly named password file and password itself
$myRandFile = "u/form_login_" . rand() . ".php";
$myPassword = rand();
$myHash = password_hash($myPassword, PASSWORD_DEFAULT);

// check if file exists
if (file_exists($myRandFile)) {
	header('Location: error_file_already_exists.php');
}

// create contents for file
$fileContents   = array();
$fileContents[] = '<?php';
$fileContents[] = 'session_start();';
$fileContents[] = '$_SESSION[\'id\'] = ' . $myId . ';';
$fileContents[] = '$_SESSION[\'password\'] = \'' . $myPassword . '\';';
$fileContents[] = 'require(\'form_login_common.php\');';
$fileContents[] = '?>';

// open file, write, close
$handle = fopen($myRandFile, "w");
fwrite($handle, implode("\r\n", $fileContents));
fclose($handle);

// update password hash in database
$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
$sql = sprintf("UPDATE rakers SET password='%s' WHERE id='%s';",
	mysqli_real_escape_string($db, $myHash),
	$myId);
mysqli_query($db, $sql);
mysqli_close($db);

echo '<p>password updated</p>';
printf("<br>$sql");

?>
