<?php
session_start();
session_destroy();

setcookie('isRemembered');

header("Location: login.php");
?>
