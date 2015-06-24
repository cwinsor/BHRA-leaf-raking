<?php

// Force SSL
if($_SERVER["HTTPS"] != "on") {
  die('Must login via HTTPS');
}

// Load the current sessionID
session_start();

// Start the new session ID to prevent session fixation
session_regenerate_id();

// Clear the old session
$_SESSION=array();

?>
