
<?php

// This file is included into a login_xyz
// It assumes the former has set session variables for
// user ID and password.
// 
// It:
// purges previous session
// checks password against hash in database
// and then creates a new/fresh session without the
// password.


// squirrel away id, password
$myId = $_SESSION['id'];
$myPassword = $_SESSION['password'];

// log out of old session
require('../tmpl_logout.php');

// start a new session
session_start();


// connect to database
$message = "";

$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
$sql = "SELECT * FROM rakers WHERE id=$myId";
$result = mysqli_query($db, $sql);
if (!$result) {
	$message .= "error 000001 - unable to select - $sql";
	exit($message);
}
$rower = mysqli_fetch_assoc($result);
if (!$rower) {
	$message .= "error 000002 - no rower - $sql";
	exit($message);
}
mysqli_close($db);

// get password hash and isAdmin from the database
$hash = $rower['password'];
if (!password_verify($myPassword, $hash)) {
	$message .= "error 000003 - login failed (password incorrect)";
}
?>

<?php
if ($message == "") {

// set session variables
	$_SESSION['id'] = $rower['id'];
	$_SESSION['isAdmin'] = $rower['isAdmin'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>



	<?php
	if ($message == "") {
		echo "here1";
		echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
	 header('Location: ../form_home.php');
	} else {
		exit($message);
	}
	?>

</body>
</html>

