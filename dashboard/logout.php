<?php
session_start();
unset($_SESSION['reg_email']);
session_destroy();
header("Location: index.php");
exit;
?>