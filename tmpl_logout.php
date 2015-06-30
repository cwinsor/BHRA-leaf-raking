<?php

// log out of existing session
// which means - purge session variables and clear session cookie
$_SESSION = array();

//if (ini_get("session.use_cookies")) {
//    $params = session_get_cookie_params();
//    setcookie(session_name(), '', time() - 42000,
//        $params["path"], $params["domain"],
//        $params["secure"], $params["httponly"]
//    );
//}

// Finally, destroy the session.
session_destroy();

?>
