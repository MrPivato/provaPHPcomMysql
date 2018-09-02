<?php
session_start();
session_destroy();

setcookie("isRemembered", "", time() - 3600);

header("Location: login.php");
?>
