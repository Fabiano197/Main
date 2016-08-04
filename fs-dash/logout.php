<?php

header("Content-Type:text/plain");

session_start();

session_unset();
session_destroy();

?>
You have been logged out successfully!