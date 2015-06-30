<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
$sql = "SELECT * FROM rakers WHERE username=" . "\"" . $_SESSION["username"] . "\"";
$sql = "foo";
echo "<p>" . $sql . "</p>";
$result = mysqli_query($db, $sql);
$rower = mysqli_fetch_assoc($result);
mysqli_close($db);

//echo "<p>here</p>";
?>
