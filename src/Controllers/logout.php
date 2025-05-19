<?php
session_start();
session_destroy();
header("Location: ../Controllers/admin_login.php"); // Corrected path to admin_login.php
exit();
?>