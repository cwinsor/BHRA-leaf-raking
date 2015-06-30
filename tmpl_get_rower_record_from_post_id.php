<?php
// the update expects a rower ID with the post command
// checks ID is digits, and is a valid ID
// redirect if not the case
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
	$id = $_GET['id'];
} else {
	header('Location: error_bad_id.php');
}

$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
$sql = "SELECT * FROM rakers WHERE id=" . "\"" . $_GET['id'] . "\"";
$result = mysqli_query($db, $sql);
$rower = mysqli_fetch_assoc($result);
mysqli_close($db);

?>
