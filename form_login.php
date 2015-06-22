<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>

	<?php
	if (isset($_POST['id']) && isset($_POST['password'])) {
		$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
		$sql = sprintf("SELECT * FROM rakers WHERE id='%d'",
			mysqli_real_escape_string($db, $_POST['id'])
			);
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row) {
			$hash = $row['password'];
			$isAdmin = $row['isAdmin'];

echo $_POST['id'];
echo $_POST['password'];
echo $row['password'];

			if (password_verify($_POST['id'], $hash)) {
				echo 'Login successful';
			} else {
				echo 'Password incorrect';
			}
		} else {
			echo 'Login failed (no such user)';
		}
		mysqli_close($db);
	}
	?>
	<form method="post" action="">
		Id <input type="number" name="id"><br>
		Password <input type="password" name="password"><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
