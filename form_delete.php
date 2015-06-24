
<?php
require 'form_auth.php';

readfile('navigation.tmpl.html');
?>

<?php
// the update expects a rower ID with the post command
// a bit of php code checks ID is digits, and is a valid ID
// redirect in this case
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
	$id = $_GET['id'];
} else {
	header('Location: form_select.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>

	<?php
// database code
	$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
	$sql = "DELETE FROM rakers WHERE id=$id";
	mysqli_query($db, $sql);
	mysqli_close($db);

	echo '<p>User deleted</p>';
	printf("<br>$sql");

	?>
</body>
</html>
