
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
			printf('<li> %s %s
				<a href="form_update.php?id=%s">edit</a>
				<a href="form_delete.php?id=%s">delete</a>
				</li>',
				htmlspecialchars($row['firstname']),
				htmlspecialchars($row['lastname']),
				htmlspecialchars($row['id']),
				htmlspecialchars($row['id'])
				);
		}
		mysqli_close($db);
		?>
	</ul>
</body>
</html>
