<?php
session_start();
session_destroy();
header("Location: subscribe_login.php");
?>
