<?php
session_start();
session_destroy();
header('location: ../pgs/login.php');
exit();
?>