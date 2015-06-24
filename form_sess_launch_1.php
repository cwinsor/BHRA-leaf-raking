<?php

// Force SSL
if($_SERVER["HTTPS"] != "on") {
  die('Must login via HTTPS');
}

// Load the current sessionID
session_start();
print_r($_SESSION);

// Validate the login information, being sure to escape the input
//...
//if (! $valid) {
//  die('Invalid login');
//}

// Start the new session ID to prevent session fixation
session_regenerate_id();
print_r($_SESSION);

// Clear the old session
$_SESSION=array();

// Log them in
$_SESSION['user_id'] = 10203040;
print_r($_SESSION);


// Echo session variables that were set on previous page
//echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
//echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
//echo"<br>";

?>
