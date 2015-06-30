
<?php
readfile('navigation.tmpl.html');
?>

<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>
	<ul>
		<?php
// database code
		$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
		$sql = "SELECT * FROM rakers";
		$result = mysqli_query($db, $sql);

		foreach ($result as $row) {
			printf("\n");
			printf('<li> %d %s %s
				<a href="form_update.php?id=%s">edit</a>
				<a href="form_delete.php?id=%s">delete</a>
				<a href="form_admin_create_login.php?id=%s">create_login</a>
				<a href="form_admin_email_login.php?id=%s">email_login</a>
				</li>',
				htmlspecialchars($row['id']),
				htmlspecialchars($row['firstname']),
				htmlspecialchars($row['lastname']),
				htmlspecialchars($row['id']),
				htmlspecialchars($row['id']),
				htmlspecialchars($row['id']),
				htmlspecialchars($row['id'])
				);
		}
		mysqli_close($db);
		?>
	</ul>
</body>
</html>
