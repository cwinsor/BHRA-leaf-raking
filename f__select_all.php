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
				printf('<li> %d %s %s <a href="f_GET_ID_select_POST_update.php?id=%s"> edit </a></li>',
					htmlspecialchars($row['id']),
					htmlspecialchars($row['firstname']),
					htmlspecialchars($row['lastname']),
					htmlspecialchars($row['id'])
					);
			}
			mysqli_close($db);
?>
</ul>
</body>
</html>
