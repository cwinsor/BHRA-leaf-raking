<?php
readfile('navigation.tmpl.html');
session_start();
require('tmpl_debug.php');
?>

<?php
$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
$sql = "SELECT * FROM rakers WHERE id=" . $_SESSION["id"];
$result = mysqli_query($db, $sql);
$rower = mysqli_fetch_assoc($result);
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>

	<?php
echo "--session--" . "<br>";
echo "id " . $_SESSION['id'] . "<br>";
echo "isAdmin " . $_SESSION['isAdmin'] . "<br>";
echo "--local--" . "<br>";
echo "Welcome " . $rower["id"] . " " . $rower["firstname"] . " " . $rower["lastname"];

?>

</body>
</html>

