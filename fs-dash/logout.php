<?php

header("Content-Type:text/plain");

$refresh_time = 5;

session_start();

session_unset();
session_destroy();

header( "Refresh:$refresh_time; url=index.php", true, 303);

?>
You have been logged out successfully!
You shall be forwarded in <?php echo $refresh_time; ?> seconds.

