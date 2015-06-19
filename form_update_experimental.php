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
				printf('<li> %d %s %s</li>',
					htmlspecialchars($row['id']),
					htmlspecialchars($row['firstname']),
					htmlspecialchars($row['lastname'])
					);
			}
			mysqli_close($db);
?>
</body>
</html>
