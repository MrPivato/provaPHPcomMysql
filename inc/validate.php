<?php
session_start();

if(isset($_SESSION['id']) == false && isset($_COOKIE['isRemembered']) == false){
        header("Location: login.php");
}
?>
