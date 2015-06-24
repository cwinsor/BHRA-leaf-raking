<?php
session_start();

$message = '';
if (isset($_POST['username']) &&
	isset($_POST['password'])) {
	$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
	$sql = sprintf("SELECT * FROM rakers WHERE username='%s'",
		mysqli_real_escape_string($db, $_POST['username'])
		);
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row) {
		$hash = $row['password'];
		$isAdmin = $row['isAdmin'];

		if (password_verify($_POST['password'], $hash)) {
			$message = 'Login successful';

			$_SESSION['username'] = $row['username'];
	 		$_SESSION['isAdmin'] = $isAdmin;
		} else {
			$message = 'Login failed (password incorrect)';
		}
	} else {
		$message = 'Login failed (no such user)';
	}
	mysqli_close($db);
}
?>

<?php
readfile('navigation.tmpl.html');
echo "<p>$message</p>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>
	<form method="post" action="">
		Username <input type="text" name="username"><br>
		Password <input type="password" name="password"><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
