<?php
session_start();

if(isset($_SESSION['id']) == false && $_COOKIE == false){
        header("Location: login.php");
}
?>
